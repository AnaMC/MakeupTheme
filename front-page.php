<?php
    get_header(); /*Invocamos a header*/
?>

    <div class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <a href="index.html"><img src="<?php echo get_template_directory_uri();?>/images/makeupzone_logo.png" alt="Hair Salon Website Templates Free Download"></a>
                </div>
                <?php
                    get_template_part('nav');
                ?>
            </div>
        </div>
    </div>
    <div class="hero-section hero-completa">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left text-intro">
                    <h1 class="hero-title">Makeup Zone.</h1>
                    <!--<a href="#" class="btn btn-default">Your slider buttons</a> -->
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 text-left text-intro-descrip text-center">
                    <p class="hero-text ">
                        “Apasionadas del maquillaje y la belleza. 
                        Nos encanta compartir trucos y consejos que nos han servido y que pueden ser útiles para todas vosotras. ”
                    </p>
                    <!--<a href="#" class="btn btn-default">Your slider buttons</a> -->
                </div>
            </div>
        </div>
    </div>
    <!--Presentación Makeup Artist-->
        <div class="space-medium bg-pres">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12"><img src="<?php echo get_template_directory_uri();?>/images/makeupArtist.jpg" alt="" class="img-responsive"></div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="well-block text-justify">
                        <h1>The best Makeup Artist</h1>
                        <h5 class="small-title ">Maquilladora profesional</h5>
                        <p>Su nombre es Briana, maquilladora profesional residente en Málaga, su estudio está situado en Marbella, una de las zonas con más proyección de esta provincia,
                           donde ha realizado múltiples sesiones de fotos para editoriales y catálogos de moda, actualmente su ilusión es acercar el maquillaje a todas las mujeres 
                           con su blog "Makeup Zone." donde colaboran maquilladores de todo el mundo.</p>
                        <p>La reina de la moda estadounidense, Anna Wintour de Vogue, la proclamó "la artista de maquillaje más influyente del mundo"</p>
                        <a href="# " class="btn btn-default">Ir a la página personal</a> 
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--Fin -->
    <div class="space-medium">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="mb40 text-center section-title">
                        <!-- section title start-->
                        <h2 class="ultimos-post">¡No te pierdas nuestras últimas publicaciones! <br></h2>
                        <!--<h5 class="small-title ">we help you look great</h5>-->
                        <div class="verMas"> </div>
                        <br><br>
                    </div>
                    
                    <!-- /.section title start-->
                </div>
            </div>
            <div class="row">
                    
                  <!--ZONA EXPERIMENTAL-->
                  
                  <?php 
                  //Sacar los post
                  $args = array('posts_per_page' => 6); //Mostrará 3 post por página
                  $custom_query = new WP_Query($args);
                  if ( $custom_query->have_posts() ): while ($custom_query->have_posts()): $custom_query->the_post(); //Devuelve true si hay post, aquí podemos acceder a sus propiedades
                  ?>
                  <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 "> <!-- col-md-offset-1 desplaza las columnas el numero de columnas indicado, si lo pones bajar el numero de post a 4-->
                    <div class="service-block">
                        <!-- service block -->
                        <div class="service-content">
                            <!-- post content -->
                            <h3><a href="<?php the_permalink(); ?>" class="title titulos-post"><?php the_title(); ?></a></h3>
                            <span class="testimonial-meta fecha"><?php the_date(); ?></span>
                            <div class="service-icon mb20  ">
                                <!-- Imagen del post -->
                                <img class="img-responsive"src="<?php 
                                if(has_post_thumbnail() ) {
                                  $postImg = get_the_post_thumbnail_url();
                                } else{
                                  $postImg = get_template_directory_uri()."/images/default_post.jpg";
                                }
                                  echo $postImg;
                                ?>"> 
                            </div>
                            <!--Fin Imagen del post -->
                            <p class="cuerpo-post text-justify"><?php the_excerpt();?></p>
                            <!--<div class="price">$45</div>-->
                            <div class="testimonial-info">
                                <h5 class="testimonial-name"><a href="<?php the_permalink();?>" class="title"><?php the_author();?></a></h5>
                                <!--<span class="testimonial-meta">Customer</span>-->
                            </div>
                        </div>
                        <!-- service content -->
                        <!---->
                    </div>
                    </div>
                    
                  <?php // El loop finaliza y la query se resetea aquí para que toda la zona dinámica entre en el loop
                    endwhile; endif;
                    wp_reset_query();
                  ?>
                    <!-- /.service block -->
               </div>
                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center"> <a href="#" class="btn btn-default">Ver todas las entradas </a> </div>
            </div>
            
        </div>
    </div>
    <!--<div class="space-medium">-->
    <!--    <div class="container">-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-offset-2 col-lg-8 col-md-offset-2 col-md-8 col-sm-12 col-xs-12">-->
    <!--                <div class="section-title mb60 text-center">-->
                        <!-- section title start-->
    <!--                    <h1>testimonials</h1>-->
    <!--                    <h5 class="small-title">What Happy Client Say</h5>-->
    <!--                </div>-->
                    <!-- /.section title start-->
    <!--            </div>-->
    <!--        </div>-->
    <!--        <div class="row">-->
    <!--            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
    <!--                <div class="testimonial-block">-->
                        <!-- testimonial block -->
    <!--                    <div class="testimonial-content">-->
    <!--                        <p class="testimonial-text">“Free Beauty Website Templates that help me a lot to build easy and fast my hair shop website in 2 days”</p>-->
    <!--                    </div>-->
    <!--                    <div class="testimonial-info">-->
    <!--                        <h4 class="testimonial-name">Reba Truong</h4>-->
    <!--                        <span class="testimonial-meta">34 Year</span> <span class="testimonial-meta">Customer</span> </div>-->
    <!--                </div>-->
                    <!--/. testimonial block -->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
    <!--                <div class="testimonial-block">-->
                        <!-- testimonial block -->
    <!--                    <div class="testimonial-content">-->
    <!--                        <p class="testimonial-text">“Free bootstrap responsive website templates 2017 its best ever i found for my hair salon”</p>-->
    <!--                    </div>-->
    <!--                    <div class="testimonial-info">-->
    <!--                        <h4 class="testimonial-name">Thomas Warren</h4>-->
    <!--                        <span class="testimonial-meta">34 Year</span> <span class="testimonial-meta ">Customer</span> </div>-->
    <!--                </div>-->
                    <!--/. testimonial block -->
    <!--            </div>-->
    <!--            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">-->
    <!--                <div class="testimonial-block">-->
                        <!-- testimonial block -->
    <!--                    <div class="testimonial-content">-->
    <!--                        <p class="testimonial-text">“Best Free HTML CSS Website Templates for salon and hair cutting business. All features are clean designed”</p>-->
    <!--                    </div>-->
    <!--                    <div class="testimonial-info">-->
    <!--                        <h4 class="testimonial-name">Carie Willis</h4>-->
    <!--                        <span class="testimonial-meta">34 Year</span> <span class="testimonial-meta">Customer</span> </div>-->
    <!--                </div>-->
                    <!--/. testimonial block -->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->
    
<?php
    get_footer(); /*Invocamos a footer*/
?>