<?php
/*
Description: Archive staff member page.
*/
?>
<?php
	$args=array(
	'post_type' => 'staff',
	'orderby' => 'title',
	'order' => 'ASC');
	$my_query = null;
	$my_query = new WP_Query($args);
 ?>

<?php get_header(); ?>
<div id="main">
	<div id="content" class="container">
	<!-- archive-staff.php -->
		<div class="row">
			<div class="col-sm-8">
				<h1>Staff Directory</h1>
			</div>
			<div class="col-sm-4">
				<div style="margin-top: 3em;"><?php get_search_form(); ?></div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-3">
				<?php get_sidebar('staff'); ?>
			</div>
			<div class="col-sm-9">
				<h2 class="subpage-title">All Staff</h2>
				<div class="row">
					<?php $i = 0; ?>
					<?php if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post(); ?>
						<?php $i++; ?>
						<div class="col-xs-6 col-md-4 col-lg-3">
			    			<div class="thumbnail">
			    				<figure><a href="<?php echo get_permalink(); ?>"><?php the_post_thumbnail('staff-thumbnail', array('class' => 'staff-thumbnail')); ?></a></figure>
								<div class="caption">
									<h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
									<?php if(get_post_meta($post->ID, 'title', true) ||
										 get_post_meta($post->ID, 'room', true) ||
										 get_post_meta($post->ID, 'phone', true) || 
										 get_post_meta($post->ID, 'email', true)
									): ?>

									<ul>
										<?php if(get_post_meta($post->ID, 'title', true)): ?>
										<li><span class="glyphicon glyphicon-user"></span> <?php echo get_post_meta($post->ID, 'title', true); ?></li>
										<?php endif; ?>

										<?php if(get_post_meta($post->ID, 'room', true)): ?>
										<li><span class="glyphicon glyphicon-map-marker"></span> <?php echo get_post_meta($post->ID, 'room', true); ?></li>
										<?php endif; ?>

										<?php if(get_post_meta($post->ID, 'phone', true)): ?>
										<li><span class="glyphicon glyphicon-phone"></span> <?php echo get_post_meta($post->ID, 'phone', true); ?></li>
										<?php endif; ?>

										<?php if(get_post_meta($post->ID, 'email', true)): ?>
										<li><a href="mailto:<?php echo get_post_meta($post->ID, 'email', true); ?>"><span class="glyphicon glyphicon-envelope"></span> <?php echo get_post_meta($post->ID, 'email', true); ?></a></li>
										<?php endif; ?>
									</ul>
									<?php endif; ?>
								</div>
							</div>
						</div>
						<?php if ($i % 4 == 0) : //adds a clearfix every 3 items. ?>
								<div class="clearfix visible-lg-block"></div>
						<?php endif; ?>
						<?php if ($i % 3 == 0) : //adds a clearfix every 3 items. ?>
								<div class="clearfix visible-md-block"></div>
						<?php endif; ?>
						<?php if ($i % 2 == 0) : //adds a clearfix every 3 items. ?>
								<div class="clearfix visible-xs-block"></div>
						<?php endif; ?>
				<?php endwhile; else: ?>
				</div>
				<?php wp_reset_query(); // Restore global post data stomped by the_post(). ?> 
				<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			</div>
		</div>
	</div>
</div>
<div id="delimiter"></div>
<?php get_footer(); ?>