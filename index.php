<?php get_header(); ?>

		<section class="large-8 columns">
			<div id="mainContentWrap" class="row">

				<section id="sliderWrap" class="">
					<div class="image_wrap">
						<img src="<?php echo THEMEPATH; ?>/images/image.jpeg">
					</div><!--  end .image_wrap  -->
					<div class="image_wrap">
						<img src="<?php echo THEMEPATH; ?>/images/image_2.jpeg">
					</div><!--  end .image_wrap  -->
					<div class="image_wrap">
						<img src="<?php echo THEMEPATH; ?>/images/image_1.jpeg">
					</div><!--  end .image_wrap  -->
				</section><!--  end sliderWrap  -->
				<?php if(have_posts()): while(have_posts()): the_post(); ?>
				<article <?php post_class(); ?> id="welcome">
					<h2><?php the_title(); ?></h2>
					<?php the_content(); edit_post_link('Bewerken'); ?>
				</article>
			<?php endwhile; else: ?>
				<article>
					<p>Helaas zijn er geen berichten gevonden die aan uw zoekopdracht voldoen.</p>
				</article>
			<?php endif; ?>

			</div><!--  end mainContentWrap  -->
		</section>
		<section id="sideBarWrap" class="large-4 columns">
			<?php get_sidebar(); ?>
		</section><!--  end sideBarWrap  -->
	</div><!--  end contentWrap  -->
	<footer id="pageFooter" class="row">

	<?php get_footer(); ?>