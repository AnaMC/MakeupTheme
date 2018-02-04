<div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
    <div class="navigation">
        <div id="navigation">
           <ul>
             <li class="active"><a href="<?php echo get_option('HOME'); ?>">Inicio</a></li>
             <li><a href="<?php echo get_page_link(get_page_by_title('BLOG')->ID); ?>">Blog</a>
             <li><a href="<?php echo get_page_link(get_page_by_title('PRODUCTS')->ID); ?>">Productos</a></li>
             <li><a href="<?php echo get_page_link(get_page_by_title('LOOKS')->ID); ?>">Looks</a> </li>
             <li><a href="<?php echo get_page_link(get_page_by_title('ARCHIVES')->ID); ?>">Archives</a> </li>
           </ul>
        </div>
    </div>
</div>