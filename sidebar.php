<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
   
    <div class="widget widget-search">
        
        <form>
            <div class="input-group">
                <!--<input type="text" class="form-control" placeholder="Search Here" aria-describedby="basic-addon2">-->
                <!--<span class="input-group-addon" id="basic-addon2">-->
                <!--<i class="fa fa-search"></i></span>-->
                <?php 
                    get_search_form(); 
                ?>
                                
            </div>
            <!-- /input-group -->
        </form>
    </div>
    <!-- /.widget search -->

    <!--Post destacado-->
    <div class="widget widget-recent-post">
        <!-- widget recent post -->
        <h3 class="widget-title"> Post destacado </h3>
        <ul class="listnone widget-recent-post">
            <li>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="recent-post-img">
                            
                            <a href="#"><img src="images/recent-post-img.jpg" alt=""></a>
                        </div>
                        
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="recent-post-content">
                            <h4 class="recent-title"><a href="#" class="title">bootstrap responsive design templates free download</a></h4>
                            <div class="meta"><span class="meta-date">22 Jan, 2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>

    <!--Fin Post destacado-->
    
    <!--Widgets-->
      <div class="widget widget-recent-post">
        <!-- widget recent post -->
        <h3 class="widget-title"> Widgets </h3>
        <ul class="listnone widget-recent-post">
            <li>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="recent-post-img">
                            <?php
                             if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Widget')) : ?>
                                <div class="warning">No hay Widgets instalados</div>
                            <?php endif; ?>
                            
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!--Fin Widgets-->

    <!-- /.widget categories -->
    
    <!-- Ultimos post -->
    <div class="widget widget-recent-post">
        <!-- widget recent post -->
        <h3 class="widget-title"> Últimas entradas </h3>
        <ul class="listnone widget-recent-post">
            <li>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                        <div class="recent-post-content">
                            <h4 class="recent-title"><a href="#" class="title">bootstrap responsive design templates free download</a></h4>
                            <div class="meta"><span class="meta-date">22 Jan, 2020</span>
                            
                            </div>
                        <div class="lastentries">
                        <?php 
                            //  $args = array (
                            //         'type' => 'postbypost', //hay otro argumento que es 'alpha' que saca ordenado alfabeticamente por el titulo
                            //       'limit' => 4
                            //         );
                            // wp_get_archives($args); 
                        ?>
                        </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <!--Fin ultimos post-->
    
    <!--Categorías de los post-->
        <div class="widget widget-categories">
        <!-- widget categories -->
        <!-- widget start -->
        <h3 class="widget-title"> Categorías </h3>
        <ul class="listnone">
            <?php
                //wp_list_categories(); // Mostrar el listado de categorías, Para quitar el titulo de 'Categorías' por defecto le pasamos los siguientes argumentos:
                $args = array(
                        //Eliminar el título
                        'title_li' => '',
                        //Mostrar el número de post por categoría
                        'show_count' => true,
                        //Que no se muestren sin un echo
                        'echo' => false
                        );
                $catgs = wp_list_categories($args);
                $catgs = preg_replace('/<\/a> \(([0-9]+)\)/', '<span class="catnum"> Entradas publicadas: \\1</span></a>', $catgs);
                echo $catgs;
            ?>
        </ul>
    </div>
    <!--Fin Categorías de los post-->
    <!--Autores-->
      <div class="widget widget-archives">
        <!-- widget archives -->
        <h3 class="widget-title"> Autores </h3>
        <ul class="listnone">
            <?php
                //wp_list_authors(); //Función que muestra la lista de autores, se le puede pasar el siguiente array de argumentos:
                $args = array(
                        'optioncount' => true,  //Número de post publicados
                        'orderby' => 'postcount',
                        'order' => 'ASC',
                        'hide_empty' => false, //Oculta los que no tienen post
                        );
                $autores = wp_list_authors($args);
            ?>
        </ul>
    </div>
    <!--Fin Autores-->
        
    <!-- Archives -->
    <div class="widget widget-archives">
        <!-- widget archives -->
        <h3 class="widget-title"> Archives </h3>
        <ul class="listnone">
            <?php 
               wp_get_archives();   //Función para mostrar los archivos
            ?>
        </ul>
    </div>
    <!--Fin Archives-->
    
    <!--Menú del Sidebar-->
    
     <div class="widget widget-archives">
        <!-- widget archives -->
        <h3 class="widget-title"> Ir a </h3>
        <ul class="listnone">
            <?php 
            // Mostrar la barra de navegación en el Sidebar
                $args = array(
                        'title_li' => '',       //Para que no mustre título en el <ul>
                        'sort_column' => 'menu_order'   //Ordena lso enlaces como en el nav
                );
                wp_list_pages($args);
            ?>
        </ul>
    </div>
    
    <!--Fin menú del sidebar-->
    
    
    <!-- /.widget archives -->
    
    <!--<div class="widget widget-tags">-->
        <!-- widget tags -->
    <!--    <h2 class="widget-title"> Tags </h2>-->
    <!--    <a href="#">HTML5</a>-->
    <!--    <a href="#">Bootstrap</a>-->
    <!--    <a href="#">Website Design</a>-->
    <!--    <a href="#">Free Website Design</a>-->
    <!--    <a href="#">HTML5 Templates</a>-->
    <!--    <a href="#">Free Website Templates</a>-->
    <!--</div>-->
    
    <!-- /.widget tags -->
</div>
