<?php

function load_external_jQuery(){
        wp_deregister_script('jquery');
        wp_register_script('jquery','https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js',array(),false,false);
        wp_enqueue_script('jquery');
}
add_action('wp_enqueue_scripts','load_external_jQuery');

/*Registro de TODOS los js que tenemos y los ponemos "en cola" */
function theme_scripts(){
        // back-to-top
        wp_register_script('back-to-top.js',get_template_directory_uri() . '/js/back-to-top.js',array('jquery'),false,false); //Registro
        wp_enqueue_script('back-to-top.js');                                                                                  //Cola
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
        // wp_register_script('menumaker.js',get_template_directory_uri() . '/js/menumaker.js',array('jquery'),false,false); 
        // wp_enqueue_script('menumaker.js'); 
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
add_action('wp_enqueue_script','theme_scripts'); /*Añadimos la función al hook, sin esto no funciona nada */

//Añadimos la imagen destacada al tema
add_theme_support('post-thumbnails');

//Imagenes responsive

function insert_img_responsive($content){ //$content -> Objeto con el contenido del post
        // Modificamos $content a UTF-8
        $conten= mb_convert_encoding($document, 'HTML-ENTITIES', "UTF-8");
        // Creamos un DOM
        $document = new DOMDocument(); //Posteriormente volcaremos en este documento el nuevo modificado en UTF-8
        libxml_use_internal_errors(true);  //Como esta a true no muestra los errores por pantalla
        // Cargamos el content en el DOM
        $document->loadHTML(UTF8_decode($content));
        //Acceso a las etiquetas <img>
        $imgs = $document->getElementsByTagName('img'); //Devuelve un array de etiquetas <img>
        foreach($imgs as $img){
                $img->setAttribute('class', 'img-responsive'); //borra las clases y crea la nueva -> class ="img-responsive"
                $img->setAttribute('width', '100%');
                $img->setAttribute('height', '100%');
        }
        //Grabamos los "cálculos"
        $html=$document->saveHTML();
        return $html;
}
add_filter('the_content', insert_img_responsive);

// Función para el commennt form

function my_comments_form ($fiellds){
    //Información necesaria
    $user = wp_get_current_user(); //Quien ha escrito el post
    $commenter = wp_get_current_commenter(); //Datos del usuario que va a dejar el comentario (Nomre, email y url)
    $nick = $user->exist()?$user -> display_name:''; //Si existe un usuario queremos el nombre
    $req = get_option('require_name_email');   //Saber si el email del usuario es un campo obligatorio
    //El objeto fields contiene los campos del formulario, le asignamos las nuevas html
    $fields['author']='<input type="text" class="comment-form-author" id="author" placeholder="name" name="author" value=""'.esc_attr($commenter['coment_author']).' size="20" required>';
    $fields['email']='<input type="email" class="comment-form-email" id="email" placeholder="name" name="email" value=""'.esc_attr($commenter['coment_author_email']).' size="20" required>';
    $fields['ur']='<input type="text" class="comment-form-url" id="url" placeholder="name" name="url" value=""'.esc_attr($commenter['coment_author_url']).' size="20" required>';
    $fields['comment_field']='<textarea class="comment-form-comment" id="comment" name="comment" value="" cols=" rows="" required></textarea>';
    
    return fields;
}

add_filter('comments_form_default_fields', 'my_comments_form'); /*¿?*/