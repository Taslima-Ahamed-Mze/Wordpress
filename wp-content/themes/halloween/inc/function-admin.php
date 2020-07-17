<?php

/*
==================
ADMIN PAGE
==================
*/
// test
function theme_add_admin_page()
{
    add_menu_page(
        'halloween Options',
        'Halloween',
        'manage_options',
        'my_halloween',
        'halloween_theme_create_page',
        'dashicons-admin-customizer',
        110
    );
}

add_action('admin_menu', 'theme_add_admin_page');

function halloween_theme_create_page()
{
    require_once('formulaire_photo.php');
}
