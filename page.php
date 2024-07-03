<?php
/**
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

<div class="bgallery_fl_main_content_wrap">
				
				<div class="bgallery_fl_gallery_single">
					<div class="container">
					<div>
						<div class="bgallery_fl_about">
							
							<div class="about_us sticky_sidebar">
								<div class="about_us_in">
									<h2><span style="font-weight:bold;letter-spacing:3px;"><?php the_title() ?></span></h2>
									<?php while ( have_posts() ) :
			the_post();?>
									<?php
            $content = get_the_content();
            ?>
								    <?php echo Parse::ParseContent(apply_filters('the_content', $content),get_the_ID());?>
								    <?php endwhile;?>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
				
			</div>
        </div>
<?php get_footer(); ?>
