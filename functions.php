<?php

function load_external_jQuery(){
        wp_deregister_script('jquery');
        wp_register_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',array(),false,false);
        wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','load_external_jQuery');

/*Registro de TODOS los js que tenemos y los ponemos "en cola" */
function theme_scripts(){
                //1º registrar el script:
        //wp_register_script('nombre', 'ruta', dependencias, versión, si va en el footer);
        wp_register_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array(),false,false);
                //2º poner el scripts en la cola
        //wp_enqueue_script('nombre');
        wp_enqueue_script('bootstrap');
        
        wp_register_script('menumaker', get_template_directory_uri().'/js/menumaker.js',array(),false,false);
        wp_enqueue_script('menumaker');
        
        wp_register_script('sticky', get_template_directory_uri().'/js/jquery.sticky.js',array(),false,true);
        wp_enqueue_script('sticky');
        
        wp_register_script('back-to-top', get_template_directory_uri().'/js/back-to-top.js',array(),false,true);
        wp_enqueue_script('back-to-top');
        
        wp_register_script('slider-carousel', get_template_directory_uri().'/js/slider-carousel.js',array(),false,true);
        wp_enqueue_script('slider-carousel');
        
    }
    
    add_action('wp_enqueue_script','theme_scripts');
