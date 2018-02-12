<?php
    get_header();
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
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="page-caption">
                        <h2 class="page-title"><?php the_title(); ?></h2>
                        <!--<div class="page-breadcrumb">-->
                        <!--<ol class="breadcrumb">-->
                        <!--    <li><a href="index.html">Home</a></li>-->
                        <!--    <li class="active">Blog Single</li>-->
                        <!--</ol>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="post-holder">
                                <!-- post holder -->
                                <div class="post-img">
                                    <img class="img-responsive"src="<?php 
                                if(has_post_thumbnail() ) {
                                  $postImg = get_the_post_thumbnail_url();
                                } else{
                                  $postImg = get_template_directory_uri()."/images/default_post.jpg";
                                }
                                  echo $postImg;
                                ?>"> 
                                </div>
                                <div class="post-content">
                                    <!-- post content -->
                                    <div class="post-header">
                                        <h1 class="titulos-post"><?php the_title(); ?></h1>
                                        <div class="meta">
                                            <!-- post meta -->
                                            <span class="meta-date">Dec 24, 2020 </span>
                                            <span class="meta-comment"> <a href="#" class="meta-link">05 Comment </a></span>
                                            <span class="meta-user">by <a href="#"> Admin </a></span>
                                            <span class="meta-cat"> Category name </span>
                                        </div>
                                    </div>
                                    <p>Responsive <a href="https://easetemplate.com/downloads/category/free-website-template/">website templates free download</a> for business intervention rabitur ante lorem ipsumporta ces convallis is physical medicine of the pain diagnosisognosis.</p>
                                    <p> Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                    <img src="images/left-image.jpg" class="alignleft img-responsive" alt="">
                                    <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    <p>Lortiam leo lectundit etest euonsequat congue dianas sapien orciplacerat vitae nibh necpretium elem entum ligcongue neque a augue ultricieugiat lacus tincidunt. </p>
                                    <p>Praesent vel aliquet urnaauris molestie sollicitudin nisl non volutpatm mollis eros lacusac lorem tristique arcu facilisis sedamus ullamcorper accumsan augue quis egestas.</p>
                                    <div class="related-post-block">
                                        <!-- related post block -->
                                        <div class="row">
                                            <div class="col-lg-12 col-sm-12 col-md-12 col-sm-12">
                                                <h2 class="related-post-title">Related Post</h2>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="related-post">
                                                    <!-- related post -->
                                                    <div class="related-post-img">
                                                        <a href="#"><img src="images/related-post.jpg" alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="related-post-content">
                                                        <h3 class="related-title"><a href="#" class="title">Free Hair Salon Website Templates Download</a></h3>
                                                        <div class="post-meta"><span class="meta-cat">in <a href="#" class="">"Free Website Template"</a> </span></div>
                                                    </div>
                                                </div>
                                                <!-- /.related post -->
                                            </div>
                                            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                                <div class="related-post">
                                                    <!-- related post -->
                                                    <div class="related-post-img">
                                                        <a href="#"><img src="images/related-post-1.jpg" alt="" class="img-responsive"></a>
                                                    </div>
                                                    <div class="related-post-content">
                                                        <h3 class="related-title"><a href="#" class="title">HTML5 Website Design Template</a></h3>
                                                        <div class="post-meta"><span class="meta-cat">in <a href="#" class="">"Free Bootstrap Website Template"</a> </span></div>
                                                    </div>
                                                </div>
                                                <!-- /.related post -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.related post block -->
                                    <div class="post-navigation">
                                        <!-- post navigation -->
                                        <div class="row">
                                            <div class="nav-links">
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="nav-previous">
                                                        <!-- nav previous -->
                                                        <a href="#" class="prev-link">previous post</a>
                                                        <div class="prev-post">
                                                            <h3><a href="#" class="title">Praesent Nonaugue Lacuisque Nemetu</a></h3>
                                                        </div>
                                                    </div>
                                                    <!-- /. nav previous -->
                                                </div>
                                                <div class="col-md-6 col-sm-6">
                                                    <div class="nav-next text-right">
                                                        <!-- nav next -->
                                                        <a href="#" class="next-link">next post</a>
                                                        <div class="next-post">
                                                            <h3><a href="#" class="title">Maecenas Finibus Ultrices Sleger</a></h3>
                                                        </div>
                                                    </div>
                                                    <!-- /.nav previous -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /. post navigation -->
                                    <div class="author-post">
                                        <!-- Post author -->
                                        <div class="row">
                                            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                                <div class="author-img">
                                                    <a href="#"><img src="images/author.jpg" class="img-responsive" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                                                <div class="author-bio">
                                                    <div class="author-header">
                                                        <h3><a href="#" class="title">Thomas Warren</a></h3>
                                                    </div>
                                                    <div class="author-content">
                                                        <p>Etiam laoreet sitamet purus sed vestibulu ullam cursus lacus eget pharetra accumsan ante metus tinante in ones leousce in consectetur lacus non efficiturex.</p>
                                                        <a href="#" class="btn btn-default">View All Post</a> </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.post author -->
                                    <!--Coments area-->
                                    <?php 
                                        comment_form(); /*Plantilla de comentarios*/
                                    ?>
                                    <!---->
                                </div>
                                <div class="leave-comments">
                                    <h2 class="reply-title">Leave a Reply</h2>
                                    <form class="reply-form">
                                        <div class="row">
                                            <!-- Textarea -->
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <label class="control-label" for="textarea">Comments</label>
                                                    <textarea class="form-control" id="textarea" name="textarea" rows="6"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Text input-->
                                                <div class="form-group">
                                                    <label class="control-label" for="name">Name</label>
                                                    <span class="required">*</span>
                                                    <input id="name" name="name" type="text" class="form-control" required="">
                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="email">E-mail</label>
                                                    <span class="required">*</span>
                                                    <input id="email" name="email" type="email" class="form-control" required="">
                                                </div>
                                            </div>
                                            <!-- Text input-->
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" for="Website">Website</label>
                                                    <span class="required">*</span>
                                                    <input id="Website" name="Website" type="text" class="form-control" required="">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <!-- Button -->
                                                <div class="form-group">
                                                    <button id="singlebutton" name="singlebutton" class="btn btn-default">Leave A Comment</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!--Llamada a sidebar-->
            <?php 
                 get_sidebar();
            ?>
            </div>
        </div>
    </div>
    <div class="footer">
        <!-- footer-->
        <div class="container">
            <div class="footer-block">
                <!-- footer block -->
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <div class="footer-widget">
                            <h2 class="widget-title">Salon Address</h2>
                            <ul class="listnone contact">
                                <li><i class="fa fa-map-marker"></i> 4958 Norman Street Los Angeles, CA 90042 </li>
                                <li><i class="fa fa-phone"></i> +00 (800) 123-4567</li>
                                <li><i class="fa fa-fax"></i> +00 (123) 456 7890</li>
                                <li><i class="fa fa-envelope-o"></i> info@salon.com</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                        <div class="footer-widget footer-social">
                            <!-- social block -->
                            <h2 class="widget-title">Social Feed</h2>
                            <ul class="listnone">
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> Facebook </a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i> Twitter</a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i> Google Plus</a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i> Linked In</a></li>
                                <li>
                                    <a href="#"> <i class="fa fa-youtube"></i>Youtube</a>
                                </li>
                            </ul>
                        </div>
                        <!-- /.social block -->
                    </div>
                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                        <div class="footer-widget widget-newsletter">
                            <!-- newsletter block -->
                            <h2 class="widget-title">Newsletters</h2>
                            <p>Enter your email address to receive new patient information and other useful information right to your inbox.</p>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Email Address">
                                <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Subscribe</button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </div>
                        <!-- newsletter block -->
                    </div>
                </div>
                <div class="tiny-footer">
                    <!-- tiny footer block -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="copyright-content">
                                <p>© Men Salon 2020 | all rights reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.tiny footer block -->
            </div>
            <!-- /.footer block -->
        </div>
    </div>
    <!-- /.footer-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/menumaker.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/sticky-header.js"></script>
    </body>

    </html>
