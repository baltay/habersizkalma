<?php
/*
Template Name: Home Page - Style 1
*/
?>
<?php get_header(); ?>

<div class="row">
	<section class="fullwidth twelve columns">
		<div id="featured" class="carousel owl row" data-columns="4" data-navigation="true" data-autoplay="false">
			<?php $args = array(
			  	   'order'     => 'DESC',
			  	   'posts_per_page' => '12',
			  	   'tag__in' => ot_get_option('featured_news')
				  	);
			?>
			<?php $query = new WP_Query($args); ?>
			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<?php $category = thb_GetSingleCategory();
							$color = GetCategoryColor($category); ?>
			<article>
				<?php the_post_thumbnail('featured', array('class' => 'hidden')); ?>
				<div class="post front">
					<div class="post-gallery" style="height:351px;">
						<?php the_post_thumbnail('featured',array('style' => 'height:351px')); ?>
						<div class="overlay"></div>
							<div class="post-title">
							<aside><?php echo thb_DisplaySingleCategory(); ?></aside>
							<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo ShortenText(get_the_title(), 50); ?></a></h2>
							<?php echo thb_DisplayPostMeta(false,false,false, false); ?>
						</div>
					</div>
					
				</div>
				<div class="post back" style="border-color: <?php echo $color ?>;">
					<div class="post-title">
						<aside><?php echo thb_DisplaySingleCategory(); ?></aside>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php echo ShortenText(get_the_title(), 50); ?></a></h2>
						<div class="post-content">
							<p><?php echo ShortenText(get_the_excerpt(), 50); ?></p>
							<a class="readmore" href="<?php the_permalink() ?>"><?php _e( 'Devamı', THB_THEME_NAME ); ?></a>
							<?php echo thb_DisplayPostMeta(false,false,false,false); ?>
						</div>
					</div>
					
				</div>
			</article>
			<?php endwhile; else: endif; ?>
		</div>
	</section>
	<section class="seven columns">
		<div id="slider" class="flex slider flex-start homePageFlex" data-bullets="true" data-controls="true">
			<ul class="slides">
				<?php $args = array(
				  	   'posts_per_page' => '18',
				  	   'ignore_sticky_posts' => '1',
				  	   'no_found_rows' => true,
				  	   'tag' => 'anamanset'
					  	);
				?>
				<?php $query = new WP_Query($args); ?>
				<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
				<li class="post">
					<div class="post-gallery">
						<?php the_post_thumbnail('slider'); ?>
						<a href="<?php the_permalink() ?>" rel="bookmark">
							<div class="overlay"></div>
						</a>
					</div>
					<div class="post-title">
						<aside><?php echo thb_DisplaySingleCategory(); ?></aside>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php echo thb_DisplayPostMeta(false,false,false,false); ?>
					</div>
				</li>
				<?php endwhile; else: ?>
				<li>
					<?php _e( 'Please select tags from your Theme Options Page', THB_THEME_NAME ); ?>
				</li>
				<?php endif; ?>
			</ul>
		</div>
		<section id="recentnews">
			<div class="headline"><h2><?php _e( 'Son Haberler', THB_THEME_NAME ); ?></h2></div>
			<?php $args = array(
			  	   'posts_per_page' => '5',
			  	   'offset' => '0',
			  	   'ignore_sticky_posts' => '1',
			  	   'tag' => 'sonhaber'
				  	);
			?>
			<?php $query = new WP_Query($args); ?>
			<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
			<article class="post">
				<div class="row">
					<div class="five columns">
						<div class="post-gallery">
							<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('recent'); ?></a>
							<?php echo thb_DisplayImageTag(get_the_ID()); ?>
						</div>
					</div>
					<div class="seven columns">
						<div class="post-title">
							<aside><?php echo thb_DisplaySingleCategory(false); ?></aside>
							<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						</div>
						<div class="post-content">
							<p><?php echo ShortenText(get_the_excerpt(), 150); ?></p>
							<?php echo thb_DisplayPostMeta(false,false,false,false); ?>
						</div>
					</div>
				</div>
			</article>
			<?php endwhile; else: ?>
			<article>
				<?php _e( 'Please select tags from your Theme Options Page', THB_THEME_NAME ); ?>
			</article>
			<?php endif; ?>
			<a id="loadmore" href="#" data-loading="<?php _e( 'Yükleniyor ...', THB_THEME_NAME ); ?>" data-nomore="<?php _e( 'Gösterilecek başka haber yok.', THB_THEME_NAME ); ?>" data-count="5" data-action="thb_ajax_home"><?php _e( 'Daha fazla', THB_THEME_NAME ); ?></a>
		</section>
		<section class="categorynews">
			<?php $categories = thb_HomePageCategories();?>
			
			<?php foreach($categories as $category) { ?>
				<?php $color = GetCategoryColor($category); ?>
				<div class="categoryholder cf">
					<div class="categoryheadline" style="border-color:<?php echo $color; ?>">
						<h2><a href="<?php echo get_category_link($category); ?>"><?php $cat = get_category($category); echo $cat->name; ?></a></h2>
						<!--
							<span><a href="<?php echo get_category_link($category); ?>" style="color:<?php echo $color; ?>"><?php _e( '<i class="icon-long-arrow-right"></i> View All Articles', THB_THEME_NAME ); ?></a></span>
						-->
					</div>
					<?php $args = array(
					  	   'posts_per_page' => '5',
					  	   'category__in' => $category,
					  	   'no_found_rows' => true
						  	);
					?>
					<?php $query = new WP_Query($args); $i = 0;?>
					<div class="row">
						<?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
							
								<?php if ($i == 0) { ?>
									<article class="post five columns">
										<div class="post-gallery">
											<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail('recent'); ?></a>
											<?php echo thb_DisplayImageTag(get_the_ID()); ?>
										</div>
										<div class="post-title">
											<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
										</div>
										<div class="post-content">
											<p><?php echo ShortenText(get_the_excerpt(), 150); ?></p>
											<?php echo thb_DisplayPostMeta(false,false,false,false); ?>
										</div>
									</article>
								<?php } else { ?>
									<div class="seven columns">
										<article class="post cf side">
											<div class="post-gallery mobile-one left">
												<a href="<?php the_permalink() ?>" rel="bookmark"><?php the_post_thumbnail(); ?></a>
											</div>
											<div class="post-title mobile-three left">
												<h2><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h2>
												<?php echo thb_DisplayPostMeta(false,false,false,false); ?>
											</div>
										</article>
									</div>
								<?php } ?>
							
							<?php $i++; ?>	
						<?php endwhile; else: endif; ?>
					</div>
				</div> <!-- End Category -->
			<?php } ?>
		</section>
	</section>
	<?php get_sidebar('left'); ?>
	<?php get_sidebar('right'); ?>
</div>
<?php get_footer(); ?>