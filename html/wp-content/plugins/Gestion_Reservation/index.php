<?php
/*
Plugin Name: Plugin BacOffice finito
Description: Plugin de gestion du camping finito
Version: 1.0
*/

add_action('admin_menu', 'hook');

function hook() {
    add_menu_page(
        'Gestion du Bac Office', // Titre de la page
        'Bac Office', // Titre du menu
        'manage_options', // Capability
        'bac-office', // Slug de la page
        'bac_office_page_content', // Fonction pour rendre la page
        '',
        2 // Position dans le menu
    );
    add_submenu_page(
        'bac-office', // Slug de la page parent
        'Produits du moment', // Titre de la page
        'Produits', // Titre du menu
        'manage_options', // Capability
        'produits', // Slug de la page
        'bac_office_page_content_produit' // Fonction pour rendre la page
    );
    add_submenu_page(
        'bac-office', // Slug de la page parent
        'reservation', // Titre de la page
        'reservation', // Titre du menu
        'manage_options', // Capability
        'reservation', // Slug de la page
        'bac_office_page_content_reservation' // Fonction pour rendre la page
    );
    add_submenu_page(
        'bac-office', // Slug de la page parent
        'Check_out', // Titre de la page
        'Check_out', // Titre du menu
        'manage_options', // Capability
        'check_out', // Slug de la page
        'bac_office_page_content_check_out' // Fonction pour rendre la page
    );
    add_submenu_page(
        'bac-office', // Slug de la page parent
        'prestataire', // Titre de la page
        'prestataire', // Titre du menu
        'manage_options', // Capability
        'prestataire', // Slug de la page
        'bac_office_page_content_prestation' // Fonction pour rendre la page
    );
    add_submenu_page(
        'bac-office', // Slug de la page parent
        'Infrastructure', // Titre de la page
        'Infrastructure', // Titre du menu
        'manage_options', // Capability
        'Infrastructure', // Slug de la page
        'bac_office_page_content_Infrastructure' // Fonction pour rendre la page
    );
}

function bac_office_page_content() {
    // Function content goes here
}

function bac_office_page_content_prestation() {
    include(dirname(__FILE__) . '/GestionPrestataire.php');
}

function bac_office_page_content_produit() {
    include(dirname(__FILE__) . '/GestionProduit.php');
}

function bac_office_page_content_reservation() {
    include(dirname(__FILE__) . '/GestionReservation.php');
}

function bac_office_page_content_Infrastructure() {
    include(dirname(__FILE__) . '/Gestioninfrastructure.php');
}

function bac_office_page_content_check_out() {
    include(dirname(__FILE__) . '/GestionCheck_out.php');
}