/**
 * Safe Cologne Service Worker
 * Provides offline functionality and performance optimization
 */

const CACHE_NAME = 'safe-cologne-v1';
const CACHE_URLS = [
    '/',
    '/assets/css/style.css',
    '/assets/css/responsive.css',
    '/assets/js/main.js',
    '/assets/js/navigation.js',
    '/assets/images/logo.png',
    'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css'
];

// Install event - cache resources
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(CACHE_URLS);
            })
    );
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames.map(cacheName => {
                    if (cacheName !== CACHE_NAME) {
                        return caches.delete(cacheName);
                    }
                })
            );
        })
    );
});

// Fetch event - serve from cache with fallback
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Return cached version or fetch from network
                return response || fetch(event.request);
            })
            .catch(() => {
                // If both cache and network fail, serve offline page
                if (event.request.destination === 'document') {
                    return caches.match('/offline.html');
                }
            })
    );
});

// Background sync for contact forms
self.addEventListener('sync', event => {
    if (event.tag === 'contact-form-sync') {
        event.waitUntil(syncContactForm());
    }
});

// Push notification handling
self.addEventListener('push', event => {
    if (event.data) {
        const data = event.data.json();
        
        const options = {
            body: data.body,
            icon: '/assets/images/logo.png',
            badge: '/assets/images/badge.png',
            vibrate: [100, 50, 100],
            data: {
                dateOfArrival: Date.now(),
                primaryKey: data.primaryKey
            }
        };
        
        event.waitUntil(
            self.registration.showNotification(data.title, options)
        );
    }
});

// Background sync function
async function syncContactForm() {
    try {
        const requests = await getStoredRequests();
        
        for (const request of requests) {
            try {
                await fetch(request.url, {
                    method: request.method,
                    body: request.body,
                    headers: request.headers
                });
                
                // Remove from storage on success
                await removeStoredRequest(request.id);
            } catch (error) {
                console.error('Failed to sync request:', error);
            }
        }
    } catch (error) {
        console.error('Background sync failed:', error);
    }
}

// Helper functions for IndexedDB operations
function getStoredRequests() {
    return new Promise((resolve, reject) => {
        const request = indexedDB.open('safe-cologne-offline', 1);
        
        request.onerror = () => reject(request.error);
        request.onsuccess = () => {
            const db = request.result;
            const transaction = db.transaction(['requests'], 'readonly');
            const store = transaction.objectStore('requests');
            const getRequest = store.getAll();
            
            getRequest.onsuccess = () => resolve(getRequest.result);
            getRequest.onerror = () => reject(getRequest.error);
        };
    });
}

function removeStoredRequest(id) {
    return new Promise((resolve, reject) => {
        const request = indexedDB.open('safe-cologne-offline', 1);
        
        request.onerror = () => reject(request.error);
        request.onsuccess = () => {
            const db = request.result;
            const transaction = db.transaction(['requests'], 'readwrite');
            const store = transaction.objectStore('requests');
            const deleteRequest = store.delete(id);
            
            deleteRequest.onsuccess = () => resolve();
            deleteRequest.onerror = () => reject(deleteRequest.error);
        };
    });
}