<div class="d-none justify-content-center align-items-center search-box">
    <div class="search-group">
        <p class="text-right mb-5"><i class="fa fa-times search-close cursor-pointer" style="font-size:40px;"></i></p>

				<form role="search" method="get" class="woocommerce-product-search" action="<?php echo esc_url( home_url( '/'  ) ); ?>">


        		<div class="input-group">
								<label class="screen-reader-text" for="s"><?php _e( 'Search for:', 'woocommerce' ); ?></label>


								<input type="hidden" name="post_type" value="product" /><input type="search" class="search-field form-control" style='font-size:26px' placeholder="<?php echo esc_attr_x( 'Search Products&hellip;', 'placeholder', 'woocommerce' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'woocommerce' ); ?>" />
            		<div class="input-group-append"><button type="submit" value="<?php echo esc_attr_x( 'Search', 'submit button', 'woocommerce' ); ?>"><span class='fa fa-search' style="font-size:26px"></span></button></div>
        		</div>
				</form>
    </div>
</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-1',
                            'menu_class' => 'list-unstyled',
                            'anchor_class' => 'text-dark',
                            'title' =>'<h6 class="footer-heading">%title</h6>'
                        ));
                    ?>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer-menu-2',
                            'menu_class' => 'list-unstyled',
                            'anchor_class' => 'text-dark',
                            'title' =>'<h6 class="footer-heading">%title</h6>'
                        ));
                    ?>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                  <?php
                      wp_nav_menu(array(
                          'theme_location' => 'footer-menu-3',
                          'menu_class' => 'list-unstyled',
                          'anchor_class' => 'text-dark',
                          'title' =>'<h6 class="footer-heading">%title</h6>'
                      ));
                  ?>

                </div>

            </div>
        </div>
        <div class="text-center py-4">
            <p><?= get_option('footer_copyright') ?></p>
        </div>
    </footer>
    <?php wp_footer(); ?>
</body>

</html>
