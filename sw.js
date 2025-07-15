/**
 * Service Worker for Safe Cologne Theme
 * Provides offline functionality and caching
 */

const CACHE_NAME = 'safe-cologne-v1';
const OFFLINE_URL = '/offline.html';

const urlsToCache = [
    '/',
    '/assets/css/style.css',
    '/assets/css/responsive.css',
    '/assets/js/main.js',
    '/assets/js/navigation.js',
    OFFLINE_URL
];

// Install event
self.addEventListener('install', event => {
    event.waitUntil(
        caches.open(CACHE_NAME)
            .then(cache => {
                return cache.addAll(urlsToCache);
            })
    );
});

// Fetch event
self.addEventListener('fetch', event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                // Return cached version or fetch from network
                return response || fetch(event.request);
            })
            .catch(() => {
                // Return offline page if both cache and network fail
                return caches.match(OFFLINE_URL);
            })
    );
});

// Activate event
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