<?php
/*Registro de TODOS los js que tenemos y los ponemos "en cola" */
function theme_scripts(){
        // back-to-top
        wp_register_script('back-to-top.js',get_template_directory_uri() . '/js/back-to-top.js',array('jquery'),false,false); //Registro
        wp_enqueue_script('contactform.js');                                                                                  //Cola
        // bootstrap
        wp_register_script('bootstrap.min.js',get_template_directory_uri() . '/js/bootstrap.min.js',array('jquery'),false,false); 
        wp_enqueue_script('bootstrap.min.js'); 
        // jquery.min
        wp_register_script('jquery.min.js',get_template_directory_uri() . '/js/jquery.min.js',array('jquery'),false,false); 
        wp_enqueue_script('jquery.min.js'); 
        // jquery.sticky
        wp_register_script('jquery.sticky.js',get_template_directory_uri() . '/js/jquery.sticky.js',array('jquery'),false,false); 
        wp_enqueue_script('jquery.sticky.js'); 
        //menumaker.js
        wp_register_script('menumaker.js',get_template_directory_uri() . '/js/menumaker.js',array('jquery'),false,false); 
        wp_enqueue_script('menumaker.js'); 
        //menumaker.min
        wp_register_script('menumaker.min.js',get_template_directory_uri() . '/js/menumaker.min.js',array('jquery'),false,false); 
        wp_enqueue_script('menumaker.min.js'); 
        //slider-carousel
        wp_register_script('slider-carousel.js',get_template_directory_uri() . '/js/slider-carousel.js',array('jquery'),false,false); 
        wp_enqueue_script('slider-carousel.js'); 
        //sticky-header
        wp_register_script('sticky-header.js',get_template_directory_uri() . '/js/sticky-header.js',array('jquery'),false,false); 
        wp_enqueue_script('sticky-header.js'); 
}
add_action('wp_enqueue_script','theme_scripts'); /*Añadimos la función al hook, sin esto no dçfunciona nada */

