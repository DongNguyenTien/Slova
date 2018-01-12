<?php
function ro_portfolio_func($atts, $content = null) {
     extract(shortcode_atts(array(
        'category' => '',
		'posts_per_page' => -1,
		'show_pagination' => 0,
		'columns' =>  3,
		'orderby' => 'none',
        'order' => 'none',
        'el_class' => '',
        'show_title' => 0,
        'show_category' => 0,
        'show_favorite' => 0,
        'show_readmore' => 0
    ), $atts));
	
    $class = array();
    $class[] = 'ro-portfolio-wrapper clearfix';
    $class[] = $el_class;
	
	$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    
    $args = array(
        'posts_per_page' => $posts_per_page,
        'paged' => $paged,
        'orderby' => $orderby,
        'order' => $order,
        'post_type' => 'portfolio',
        'post_status' => 'publish');
    if (isset($category) && $category != '') {
        $cats = explode(',', $category);
        $category = array();
        foreach ((array) $cats as $cat) :
        $category[] = trim($cat);
        endforeach;
        $args['tax_query'] = array(
                                array(
                                    'taxonomy' => 'portfolio_category',
                                    'field' => 'id',
                                    'terms' => $category
                                )
                        );
    }
    $wp_query = new WP_Query($args);
	
    ob_start();
	
	if ( $wp_query->have_posts() ) {
		$class_columns = array();
		switch ($columns) {
			case 1:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-12 col-lg-12';
				break;
			case 2:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-6 col-lg-6';
				break;
			case 3:
				$class_columns[] = 'col-xs-12 col-sm-12 col-md-4 col-lg-4';
				break;
			case 4:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
				break;
			default:
				$class_columns[] = 'col-xs-12 col-sm-6 col-md-3 col-lg-3';
				break;
		}
    ?>
	<div class="<?php echo esc_attr(implode(' ', $class)); ?>">
		<div class="ro-portfolio">
			<div class="row">
				<?php while ( $wp_query->have_posts() ) { $wp_query->the_post(); ?>
				<div class="<?php echo esc_attr(implode(' ', $class_columns)); ?>">
					<div class="ro-portfolio-item">
						<div class="ro-thumb">
							<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
							<?php if($show_readmore) { ?>
								<div class="ro-readmore">
									<a href="<?php the_permalink(); ?>"><i class="fa fa-chevron-right"></i></a>
								</div>
							<?php } ?>
						</div>
						<div class="ro-content">
							<?php if($show_title) { ?>
								<h5 class="ro-title"><?php the_title(); ?></h5>
							<?php } ?>
							<?php if($show_category) { ?>
								<span class="ro-categories"><?php the_terms(get_the_ID(), 'portfolio_category', '' , ', ' ); ?></span>
							<?php } ?>
							<?php if($show_favorite) post_favorite(); ?>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
			<div style="clear: both;"></div>
			<?php if($show_pagination){ ?>
				<nav class="pagination ro-pagination ?>" role="navigation">
					<?php
						$big = 999999999; // need an unlikely integer

						echo paginate_links( array(
							'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
							'format' => '?paged=%#%',
							'current' => max( 1, get_query_var('paged') ),
							'total' => $wp_query->max_num_pages,
							'prev_text' => __( '<i class="fa fa-angle-left"></i>', 'slova' ),
							'next_text' => __( '<i class="fa fa-angle-right"></i>', 'slova' ),
						) );
					?>
				</nav>
			<?php } ?>
		</div>
	</div>
    <?php
	}
    return ob_get_clean();
}

if(function_exists('insert_shortcode')) { insert_shortcode('portfolio', 'ro_portfolio_func'); }
