<?php get_header();?>

<div >
<?php
if (have_posts()) {
  if ( has_blocks( $post->post_content ) ) :
    $blocks = parse_blocks( $post->post_content );
    foreach( $blocks as $block ) {
      $phrase = render_block( $block );
      $phrase = apply_filters('the_content', $phrase);
      $container = 'container';
      /*
       remove container if and only if 'no-container' css class is applied
       when added on the editor's "adavance css"
      */
      if(strpos($phrase,'no-container')){
         $container = '';
      }
      ?>
      <div class="blog-post <?= $container ?>">
        <?php echo $phrase; ?>
     </div>
      <?php

    }
    ?>

	 <?php
endif;
}
?>
<?php get_footer();?>
