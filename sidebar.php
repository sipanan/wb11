<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Safe_Cologne
 */

if (!is_active_sidebar('sidebar-main')) {
    return;
}
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">
    <?php dynamic_sidebar('sidebar-main'); ?>
</aside>

<style>
.sidebar {
    background: var(--bg-light);
    padding: 2rem;
    border-radius: var(--radius-md);
}

.sidebar .widget {
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 1px solid #e0e0e0;
}

.sidebar .widget:last-child {
    margin-bottom: 0;
    padding-bottom: 0;
    border-bottom: none;
}

.sidebar .widget-title {
    color: var(--dark-gray);
    margin-bottom: 1rem;
    padding-bottom: 0.5rem;
    border-bottom: 2px solid var(--primary-red);
    font-size: 1.25rem;
}

.sidebar ul {
    list-style: none;
    padding: 0;
}

.sidebar ul li {
    padding: 0.5rem 0;
    border-bottom: 1px solid #f0f0f0;
}

.sidebar ul li:last-child {
    border-bottom: none;
}

.sidebar a {
    color: var(--medium-gray);
    transition: var(--transition);
}

.sidebar a:hover {
    color: var(--primary-red);
    padding-left: 5px;
}

/* Search Widget */
.sidebar .search-form {
    margin-bottom: 0;
}

/* Recent Posts Widget */
.sidebar .widget_recent_entries ul li {
    display: flex;
    align-items: start;
    gap: 0.5rem;
}

.sidebar .widget_recent_entries ul li::before {
    content: "→";
    color: var(--primary-red);
    font-weight: bold;
    margin-top: 0.1rem;
}

/* Categories Widget */
.sidebar .widget_categories ul li {
    display: flex;
    justify-content: space-between;
}

.sidebar .widget_categories .count {
    color: var(--light-gray);
    font-size: 0.875rem;
}

/* Tag Cloud Widget */
.sidebar .tagcloud {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.sidebar .tagcloud a {
    display: inline-block;
    padding: 0.25rem 0.75rem;
    background: var(--white);
    border: 1px solid #e0e0e0;
    border-radius: 50px;
    font-size: 0.875rem !important;
    transition: var(--transition);
}

.sidebar .tagcloud a:hover {
    background: var(--primary-red);
    color: var(--white);
    border-color: var(--primary-red);
}

/* Calendar Widget */
.sidebar .wp-calendar-table {
    width: 100%;
    margin-top: 1rem;
}

.sidebar .wp-calendar-table th,
.sidebar .wp-calendar-table td {
    text-align: center;
    padding: 0.5rem;
}

.sidebar .wp-calendar-table th {
    font-weight: 600;
    color: var(--dark-gray);
}

.sidebar #today {
    background: var(--primary-red);
    color: var(--white);
    font-weight: 600;
    border-radius: var(--radius-sm);
}
</style>
