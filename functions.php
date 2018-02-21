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

function my_comments_form ($fiellds){       //fields contiene los campos del formulario
    //Información necesaria del usuario que va a comentar
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
add_filter('comments_form_default_fields', 'my_comments_form');


//Eliminar una de las dos text areas que aparecen desactivando el text area por defecto
//(Si nos logeamos desaparecerá)

function my_formm_defaults($defaults){
    //Necesitamos saber si un susario está logueado o no, con la funcion is_usser_logged_in(true o falase), pero esta función no funcionará si hemos usado query post
    if (!is_user_logged_in()){
        if(isset ($defaults['comment_field'])){
            $defaults['comment_field']="";
    }
    else{
         $defaults['comment_field']='<textarea id="comment" name="comment" value="" cols=" rows=""></textarea>';
    }
    }
    return $defaults;
}
add_filter('comments_form_defaults','my_form_defaults');

/*Crear widgets en el sidebar*/

function crea_area_widgets() {
    $sidebarArgs = array(
        'name' => 'Sidebar Widget',
        'id' => 'sidebar',
        'description' => 'Sidebar Widgets Area',
        'before_widget' => '<div class="widget %2$s">',  //%2$s -> Hace que se mantenga la clase de widgets
        'after_widget' => '</div>'
    );
    register_sidebar($sidebarArgs);
    
    $footerArgs = array(
        'name' => 'Footer Widget',
        'id' => 'footer',
        'description' => 'Footer Widgets Area',
        'before_widget' => '<div class="widget %2$s">',
        'after_widget' => '</div>'
    );
    register_sidebar($footerArgs);
}
add_action('widgets_init', 'crea_area_widgets');


function add_social_media($user_methods) {
    $user_methods['facebook'] = 'Facebook account';
    $user_methods['twitter'] = 'Twitter account';
    //unset($user_contact['field']); /*Para eliminar campos*/
    return $user_methods;
}
add_filter('user_contactmethods', 'add_social_media');

//Método 2 SKILLS

function skills_fields($user){ ?>
    <!--Etiqueta del panel para los nuevos campos-->
    <h3>
        <?php _e("User skills information","blank");?>
    </h3>
    <table class="form-table">

        <tr>
            <th><label for="skill1"><?php _e("Skill 1");?></label></th>
            <td>
                <input type="text" name="skill1" id="skill1" value="<?php echo esc_attr(get_the_author_meta('skill1', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-1 description.");?></span>
            </td>
            <th><label for="skill1v"><?php _e("Skill 1 Value");?></label></th>
            <td>
                <input type="text" name="skill1v" id="skill1v" value="<?php echo esc_attr(get_the_author_meta('skill1v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-1 value.");?></span>
            </td>
        </tr>

        <tr>
            <th><label for="skill2"><?php _e("Skill 2");?></label></th>
            <td>
                <input type="text" name="skill2" id="skill2" value="<?php echo esc_attr(get_the_author_meta('skill2', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-2 description.");?></span>
            </td>
            <th><label for="skill2v"><?php _e("Skill 2 Value");?></label></th>
            <td>
                <input type="text" name="skill2v" id="skill2v" value="<?php echo esc_attr(get_the_author_meta('skill2v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-2 value.");?></span>
            </td>
        </tr>

        <tr>
            <th><label for="skill3"><?php _e("Skill 3");?></label></th>
            <td>
                <input type="text" name="skill3" id="skill3" value="<?php echo esc_attr(get_the_author_meta('skill3', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-3 description.");?></span>
            </td>
            <th><label for="skill3v"><?php _e("Skill 3 Value");?></label></th>
            <td>
                <input type="text" name="skill3v" id="skill3v" value="<?php echo esc_attr(get_the_author_meta('skill3v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-3 value.");?></span>
            </td>
        </tr>

        <tr>
            <th><label for="skill4"><?php _e("Skill 4");?></label></th>
            <td>
                <input type="text" name="skill4" id="skill4" value="<?php echo esc_attr(get_the_author_meta('skill4', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-4 description.");?></span>
            </td>
            <th><label for="skill4v"><?php _e("Skill 4 Value");?></label></th>
            <td>
                <input type="text" name="skill4v" id="skill4v" value="<?php echo esc_attr(get_the_author_meta('skill4v', $user->ID));?>" class="regular-text">
                <span class="description"><?php _e("Please enter your skill-4 value.");?></span>
            </td>
        </tr>
    </table>
    <?php
}
add_action('edit_user_profile','skills_fields');
add_action('show_user_profile','skills_fields');

function save_skills_fields($user_id){
    //Nos aseguramos de que el usuario puede editar
    if(!current_user_can('edit_user',user_id)){ /*Utilizamos current  para preguntar si un usuario concreto puede realizar una acción concreta*/
        return;
    } //Llegado a este punto es que el usuario puede editar sus datos
    
    update_user_meta($user_id, 'skill1',$_POST['skill1']);
    update_user_meta($user_id, 'skill1v',$_POST['skill1v']);
    
    update_user_meta($user_id, 'skill2',$_POST['skill2']);
    update_user_meta($user_id, 'skill2v',$_POST['skill2v']);
    
    update_user_meta($user_id, 'skill3',$_POST['skill3']);
    update_user_meta($user_id, 'skill3v',$_POST['skill3v']);
    
    update_user_meta($user_id, 'skill4',$_POST['skill4']);
    update_user_meta($user_id, 'skill4v',$_POST['skill4v']);
}
add_action('personal_options_update','save_skills_fields');
add_action('edit_user_profile_update', 'save_skills_fields');

/*
*Función que devuelve el rol de un autor
*@param int autor ID
*
*/

function get_author_rol ($user_id){
    /*Extraemos toda la info del autor*/
    $user_info=get_userdata($user_id);
    return implode (',', $user_info->roles);
}

//CUSTOM POST TYPE 
function makeup_shop(){ 
    $support = array( //Array de soporte 
    'title', 
    'editor', 
    'author', 
    'thumbnail', 
    //'custom-fields', 
    'comments', 
    'revisions', 
    );
    
    $labels = array( //Array de labels 
        'name'=> _x('Maquillaje','plural'), 
        'singular_name'=> _x('Maquillaje','singular'), 
        'menu_name'=> _x('Maquillaje','admin menu'), 
        'name_admin_bar'=> _x('Maquillaje','admin bar'), 
        'add_new'=> _x('Añadir nuevo','agregar nuevo'),
        'add_new_item'=> __('Añadir Maquillaje nuevo'), 
        'new_item'=> __('Maquillaje nuevo'), 
        'edit_item'=> __('Editar Maquillaje'), 
        'view_item'=> __('ver Maquillaje'), 
        'all_items'=> __('Todo el Maquillaje'), 
        'search_items'=> __('Buscar Maquillaje'), 
        'not_found'=> __('Maquillaje no encontrado. ') 
    ); 
    
    $args = array(  //Array de argumentos 
        'supports' => $support, //Array de paneles soportados en el admin area 
        'labels' => $labels, //Traducción para los labels en el admina area 
        'public' => true, //Ambito del post public 
        'query_var' => true, //La query var soportara los post personalizados 
        'rewrite' => array ('slug' => 'application'), //Slug para el post 
        'has_archive' => true, //permitimos los archivos adjuntos 
        'hiperarchical' => false, //no va a tener posts hijos (no hay jerarquia) 
        'exclude_from_search' => false, //Nos aseguramos de que los custom post aparecerán en la busqueda 
        'menu_position' => 5 //posuicion de la opción de menu en el admin area 
    ); 
    
    register_post_type('makeup_shop', $args); 
} 

add_action('init','makeup_shop'); //Habilitar categorías y tags en los custom post type. 

function add_cattags_to_custom_post_type(){ 
    //Necesitamos registrar su taxonomía 
    register_taxonomy_for_object_type('category','makeup_shop');
    register_taxonomy_for_object_type('post_tag','makeup_shop'); 
} 
add_action('init','add_cattags_to_custom_post_type'); 

/* 1ºPaso -> Creación del metabox */ 
function add_makeup_shop_metabox(){ 
    $screens = array ('makeup_shop');
    foreach($screens as $screen){ //Para cada pantalla de edición de makeup_shop 
        add_meta_box( 
            'makeup_shop_metabox', 
            __('makeup shop Details','mine'), 
            'add_fields_to_metabox', 
            $screen, 
            'normal', 
            'default' 
            );
    } 
} 
add_action('add_meta_boxes', 'add_makeup_shop_metabox'); 

/* 2ºPaso -> Creación de la función callback */ 

function add_fields_to_metabox($post){ //Le pasamos $post para poder acceder al id 
        /* 
        Creamos un campo nonce para asegurarnos de que las peticiones se realizan desde nuestro sitio web y no desde uno externo 
        (Un pequeño nivel más de seguridad), tiene dos argumentos opcionales: action -> Tentra el nombre de la función encargada de la BD name -> Nombre del campo nonce, 
        una vez enviado el formulario es accesible vía $POST Son obligatorios si queremos ese nuvel de seguridad. 
        */ 

        wp_nonce_field(basename(__FILE__),'makeup_shop_metabox_nonce'); //Recogemos los datos de la BBDD con la funcion get_post_meta(id del post,'nombre del campo') 
        $nombre=get_post_meta($post->ID,'makeup_shop_nombre', true);
        ?>
        
        <!--Dibujamos los campos con las respectivas etiquetas HTML [El name es OBLIGATORIO]-->
        <br>
        <br>
        <label for="makeup_shop_nombre"> Nombre: </label>
        <input type="text" id="makeup_shop_nombre" name="makeup_shop_nombre" size="5" value="<?php echo $nombre;?>">

        <?php
        $precio=get_post_meta($post->ID,'makeup_shop_precio', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_precio"> Precio: </label>
        <input type="text" id="makeup_shop_precio" name="makeup_shop_precio" size="5" value="<?php echo $precio;?>">
        
        <?php
        $descripcion=get_post_meta($post->ID,'makeup_shop_descripcion', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_descripcion"> Descripción: </label>
        <input type="text" id="makeup_shop_descripcion" name="makeup_shop_descripcion" size="5" value="<?php echo $descripcion;?>">
        
        <?php
        $beneficios=get_post_meta($post->ID,'makeup_shop_beneficios', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_beneficios"> Beneficios: </label>
        <input type="text" id="makeup_shop_beneficios" name="makeup_shop_beneficios" size="5" value="<?php echo $beneficios;?>">
        
        <?php
        $modoUso=get_post_meta($post->ID,'makeup_shop_modoUso', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_modoUso"> Modo de empleo: </label>
        <input type="textarea" id="makeup_shop_modoUso" name="makeup_shop_modoUso" size="140" value="<?php echo $modoUso;?>">

        <?php
        $composicion=get_post_meta($post->ID,'composicion', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_composicion"> Composición: </label>
        <input type="text" id="makeup_shop_composicion" name="makeup_shop_composicion" size="5" value="<?php echo $composicion;?>">

        <?php
        $valoracion=get_post_meta($post->ID,'makeup_shop_valoracion', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_valoracion"> Valoración: </label>
        <input type="text" id="makeup_shop_valoracion" name="makeup_shop_valoracion" size="5" value="<?php echo $valoracion;?>">

        <?php
        $cantidad=get_post_meta($post->ID,'makeup_shop_cantidad', true);
        ?>
        <br>
        <br>
        <label for="makeup_shop_cantidad"> Cantidad: </label>
        <input type="text" id="makeup_shop_cantidad" name="makeup_shop_cantidad" size="5" value="<?php echo $cantidad;?>">

        <?php
        $tester=get_post_meta($post->ID,'makeup_shop_tester', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_tester"> Tester: </label>
        <input type="text" id="makeup_shop_tester" name="makeup_shop_tester" size="5" value="<?php echo $tester;?>">

        <?php
        $relacionados=get_post_meta($post->ID,'relacionados', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_relacionados"> Productos relacionados: </label>
        <input type="text" id="makeup_shop_relacionados" name="makeup_shop_relacionados" size="5" value="<?php echo $relacionados;?>">

        <?php
        $hechoEn=get_post_meta($post->ID,'makeup_shop_hechoEn', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_hechoEn"> Fabricado en: </label>
        <input type="text" id="makeup_shop_hechoEn" name="makeup_shop_hechoEn" size="5" value="<?php echo $hechoEn;?>">

        <?php
        $coleccion=get_post_meta($post->ID,'coleccion', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_coleccion"> Colección: </label>
        <input type="text" id="makeup_shop_coleccion" name="makeup_shop_coleccion" size="5" value="<?php echo $coleccion;?>">

        <?php
        $fabricante=get_post_meta($post->ID,'makeup_shop_fabricante', true);
        ?>
        
        <br>
        <br>
        <label for="makeup_shop_fabricante"> Fabricante: </label>
        <input type="text" id="makeup_shop_fabricante" name="makeup_shop_fabricante" size="5" value="<?php echo $fabricante;?>">
        <?php
}

function save_makeup_shop_fields($post_id){
    /* Comprobar si es una revisión o un DOING_AUTOSAVE (Constante de la función WP_autosave(), esta guarda un post que ha sido
      enviado mediante XHR) */
    $is_revision = wp_is_post_revision($post_id);
    $is_autosave = wp_is_post_autosave($post_id);
    //comprobar si nonce es valido
    $is_nonce_valid = (isset($_POST['makeup_shop_metabox_nonce']) && wp_verify_nonce($_POST['makeup_shop_metabox_nonce'], basename (__FILE__)));
    
    if ($is_revision || $is_autosave || !$is_nonce_valid){
        return;
    }
    
    //Saneo de campos para evitar inyecciones de código
    $nombre = sanitize_text_field ($_POST['makeup_shop_nombre']);
    $precio = sanitize_text_field ($_POST['makeup_shop_precio']);
    $descripcion = sanitize_text_field ($_POST['makeup_shop_descripcon']);
    $beneficios = sanitize_text_field ($_POST['makeup_shop_beneficios']);
    $modoUso = sanitize_text_field ($_POST['makeup_shop_modoUso']);
    $composicion = sanitize_text_field ($_POST['makeup_shop_composicion']);
    $valoracion = sanitize_text_field ($_POST['makeup_shop_valoracion']);
    $cantidad = sanitize_text_field ($_POST['makeup_shop_cantidad']);
    $tester = sanitize_text_field ($_POST['makeup_shop_tester']);
    $relacionados = sanitize_text_field ($_POST['makeup_shop_relacionados']);
    $hechoEn = sanitize_text_field ($_POST['makeup_shop_hechoEn']);
    $coleccion = sanitize_text_field ($_POST['makeup_shop_coleccion']);
    $fabricante = sanitize_text_field ($_POST['makeup_shop_fabricante']);
    
    //Actualización de la BD
    update_post_meta($post_id, 'makeup_shop_precio', $precio);
    update_post_meta($post_id, 'makeup_shop_nombre', $nombre);
    update_post_meta($post_id, 'makeup_shop_descripcion', $descripcion);
    update_post_meta($post_id, 'makeup_shop_beneficios', $beneficios);
    update_post_meta($post_id, 'makeup_shop_modoUso', $modoUso);
    update_post_meta($post_id, 'makeup_shop_composicion', $composicion);
    update_post_meta($post_id, 'makeup_shop_valoracion', $valoracion);
    update_post_meta($post_id, 'makeup_shop_cantidad', $cantidad);
    update_post_meta($post_id, 'makeup_shop_tester', $tester);
    update_post_meta($post_id, 'makeup_shop_relacionados', $relacionados);
    update_post_meta($post_id, 'makeup_shop_hechoEn', $hechoEn);
    update_post_meta($post_id, 'makeup_shop_coleccion', $coleccion);
    update_post_meta($post_id, 'makeup_shop_fabricante', $fabricante);
}
add_action('save_post', 'save_makeup_shop_fields');

// Función valoracion estrellas
    
function estrellas($valor,$max=5){
    $salida='<div class="rating">';
    for($i = 1;$i <= $max;$i++){
        $salida.=($valor <= $i?
                 $salida .= '<img class="amarillo">':
                 $salida .= '<img class="gris">');
    }
    $salida .= '</div>';
    return $salida;
}

/*
*   Resgister shortcodes
*
*/  

function register_shortcodes(){
    add_shortcode('saluda', 'saluda_callback');  /*saluda_callback está en la caarpeta plugin (my-shortcodes.php)*/
}
add_action('init','register_shortcodes');

// BREADCRUMBS

// --> http://www.suburban-glory.com/blog?page=170

function get_term_parents($id, $taxonomy, $link = false, $separator = '/', $nicename = false, $visited = array()) {
    $chain = '';
    $parent = &get_term($id, $taxonomy);
    try {
        if (is_wp_error($parent)) {
            throw new Exception('is_wp_error($parent) has throw error ' . $parent->get_error_message());
        }
    }
    catch (exception $e) {
        echo 'Caught exception: ', $e->getMessage(), "\n";
        // use something less drastic than die() in production code
        //die();
    }
    if ($nicename) {
        $name = $parent->slug;
    } else {
        $name = htmlspecialchars($parent->name, ENT_QUOTES, 'UTF-8');
    }
    if ($parent->parent && ($parent->parent != $parent->term_id) && !in_array($parent->parent, $visited)) {
        $visited[] = $parent->parent;
        $chain .= get_term_parents($parent->parent, $taxonomy, $link, $separator, $nicename, $visited);
    }
    if ($link) {
        $chain .= '<a href="' . get_term_link($parent->slug, $taxonomy) . '">' . $name . '</a>' . $separator;
    } else {
        $chain .= $parent->name . $separator;
    }
    return $chain;
}

function get_tag_id($tag) {
    global $wpdb;
    $link_id = $wpdb->get_var($wpdb->prepare("SELECT term_id FROM $wpdb->terms WHERE name =  %s", $tag));
    return $link_id;
}

function my_breadcrumb($id = null) {
    echo '<a href="';
    // echo 'http://www.roedean.co.uk/';
    echo '">';
    echo 'Home';
    echo "</a> &gt; ";
    if (is_category() || is_single() || is_tax()) {
        if (is_single()) {
            $cat = get_the_category_list(' &gt; ', 'multiple');
            // make sure uncategorised is not used
            if (!stristr($cat, 'Uncategorized')) {
                echo $cat;
                echo '  &gt; ';
            }
            echo '<a href="' . get_permalink(get_the_ID()) . '">';
            the_title();
            echo '</a>';
        }
        if (is_category()) {
            $cat = get_category_parents(get_query_var('cat'), true, ' &gt; ');
            // remove last &gt;
            echo preg_replace('/&gt;\s$|&gt;$/', '', $cat);
        }
        if (is_tax()) {
            $tag = single_tag_title('', false);
            $tag = get_tag_id($tag);
            $term = get_term_parents($tag, get_query_var('taxonomy'), true, ' &gt; ');
            // remove last &gt;
            echo preg_replace('/&gt;\s$|&gt;$/', '', $term);
        }
    } elseif (is_page()) {
        if ($id != null) {
            $an = get_post_ancestors($id);
            if(isset($an['0'])) {
                $parent = '<a href="' . get_permalink($an['0']) . '">' . ucwords(get_the_title($an['0'])) . '</a>';
                echo !is_null($parent) ? $parent . " &gt; " : null;
            }
            $parent = get_the_title($id);
            $parent = '<a href="' . get_permalink($id) . '">' . ucwords($parent) . '</a>';
            echo !is_null($parent) ? $parent . " &gt; " : null;
        }
        echo '<a href="' . get_permalink(get_the_ID()) . '">';
        ucwords(the_title());
        echo '</a>';
    }
}

//Para que se nos mustre el titulo segun la pagina en la que estamos     
function my_title(){
    if (function_exists('is_tag') && is_tag()) {
        single_tag_title('Tag Archive for &quot;'); 
        echo '&quot; · ';
    } elseif (is_archive()) {
        wp_title(''); 
        echo ' Archive · ';
    } elseif (is_search()) {
        echo 'Search for &quot;'.wp_specialchars($s).'&quot; · ';
    } elseif (!(is_404()) && (is_single()) || (is_page())) {
             bloginfo('name'); 
             wp_title();
    } elseif (is_404()) {
        echo 'Not Found · ';
    }
    if (is_front_page()) {
        echo bloginfo('name'); 
        echo ' · '; bloginfo('description');
    } elseif (is_home()) {
      bloginfo('name'); 
      wp_title();
    }
    if (isset($paged) && $paged > 1) {
        echo ' · page '. $paged;
    }  
}
