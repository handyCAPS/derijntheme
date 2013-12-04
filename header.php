

<!DOCTYPE html>

<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->

<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php bloginfo('language') ?>" > <!--<![endif]-->



<head>

	<meta charset="utf-8">

  <meta name="viewport" content="width=device-width">

  <title><?php
	  if(is_home()) {
	  	bloginfo('name');
	  } else {
	  	wp_title('|', true, 'right' );
	  	bloginfo('name');
	  }
   ?></title>

  <link rel="shortcut icon" href="<?php echo THEMEPATH; ?>/images/favicon.ico"/>

  <link href='http://fonts.googleapis.com/css?family=Original+Surfer|Cherry+Swash|PT+Sans|Roboto+Slab' rel='stylesheet' type='text/css'>



<?php wp_head(); ?>

</head>

<body>

<div id="outerWrap" class="">

	<header class="row clearfix">

		<?php    /**
			*
			* Displays a navigation menu
			*
			* @param array $args Arguments
			*
			*/

			$args = array(

				'theme_location' => 'header_menu',

				'menu' => '',

				'container' => 'nav',

				'container_class' => 'menu-container',

				'container_id' => '',

				'menu_class' => 'menu',

				'menu_id' => '',

				'echo' => true,

				'fallback_cb' => 'wp_page_menu',

				'before' => '',

				'after' => '',

				'link_before' => '',

				'link_after' => '',

				'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',

				'depth' => 0,

				'walker' => ''

			);



			wp_nav_menu( $args ); ?>

		<a href="<?php bloginfo('home'); ?>">
		<div id="logo" class="small-4 columns"><img src="<?php echo THEMEPATH; ?>/images/de-rijn-kapper-alphen.png" alt="Herenkapper de Rijn Alphen a/d Rijn"></div>
		</a>

		<section id="attSliderWrapper" class="small-8 columns">

			<section id="attSlider" class="row clearfix">

				<?php 	$args = array('post_type' => 'slidepost');

						$top_loop = new WP_Query( $args );

						if($top_loop->have_posts()): while($top_loop->have_posts()): $top_loop->the_post() ?>

					<article class="clearfix">

					<div class="image_wrap">
					<?php
					if(has_post_thumbnail()):
						the_post_thumbnail();
						else : ?>
					<img src="<?php echo THEMEPATH; ?>/images/kapper-alphen-thumbnail.png" alt="Kapper Alphen thumbnail">
					<?php endif;?>

					</div><!--  end .image_wrap  -->

					<h2><?php the_title(); ?></h2>

					<?php the_content(); edit_post_link('Bewerken'); ?>

					</article>

				<?php endwhile; endif; ?>



			</section><!--  end attSlider  -->

		</section><!--  end attSliderWrapper  -->

	</header>

	<div id="contentWrap" class="row">