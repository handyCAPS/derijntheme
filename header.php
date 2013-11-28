
<!DOCTYPE html>
<!--[if IE 8]> 				 <html class="no-js lt-ie9" lang="en" > <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="<?php bloginfo('language') ?>" > <!--<![endif]-->

<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title><?php bloginfo('name'); ?></title>

  <link href='http://fonts.googleapis.com/css?family=Original+Surfer|Cherry+Swash|PT+Sans|Roboto+Slab' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>
<body>
<div id="outerWrap" class="">
	<header class="row clearfix">
		<nav class="">
			<ul>
				<li><a href="#">Home</a></li>
				<li><a href="#">Prijzen</a></li>
				<li><a href="#">Diensten</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
		<h1 class="small-4 columns"><img src="<?php echo THEMEPATH; ?>/images/herenkapper-derijn-alphen.png" alt="Herenkapper de Rijn Alphen a/d Rijn"></h1>
		<section id="attSliderWrapper">
			<section id="attSlider" class="clearfix">
				
				<?php 	$args = array('post_type' => 'slidepost');
						$top_loop = new WP_Query( $args );
						if($top_loop->have_posts()): while($top_loop->have_posts()): $top_loop->the_post() ?>
					<article class="clearfix">
					<div class="image_wrap"><?php if(has_post_thumbnail()): the_post_thumbnail(); endif;?>
					</div><!--  end .image_wrap  -->
					<h2><?php the_title(); ?></h2>
					<?php the_content(); edit_post_link('Bewerken'); ?>
					</article>
				<?php endwhile; endif; ?>
				
			</section>
		</section>
	</header>
	<div id="contentWrap" class="row">