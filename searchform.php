<?php
/**
 * The template for displaying search forms
 *
 * @package Safe_Cologne
 */
?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label>
        <span class="screen-reader-text"><?php echo esc_html_x('Suche nach:', 'label', 'safe-cologne'); ?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Suchen &hellip;', 'placeholder', 'safe-cologne'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit">
        <i class="fas fa-search"></i>
        <span class="screen-reader-text"><?php echo esc_html_x('Suchen', 'submit button', 'safe-cologne'); ?></span>
    </button>
</form>

<style>
.search-form {
    display: flex;
    position: relative;
}

.search-form label {
    flex: 1;
    margin: 0;
}

.search-field {
    width: 100%;
    padding: 0.75rem 1rem;
    padding-right: 3rem;
    border: 1px solid #ddd;
    border-radius: var(--radius-sm);
    font-size: 1rem;
    transition: var(--transition);
}

.search-field:focus {
    outline: none;
    border-color: var(--primary-red);
    box-shadow: 0 0 0 3px rgba(227, 6, 19, 0.1);
}

.search-submit {
    position: absolute;
    right: 0;
    top: 0;
    bottom: 0;
    padding: 0 1rem;
    background: var(--primary-red);
    color: var(--white);
    border: none;
    border-radius: 0 var(--radius-sm) var(--radius-sm) 0;
    cursor: pointer;
    transition: var(--transition);
}

.search-submit:hover {
    background: var(--dark-red);
}
</style>
