<div class="ro-blog-item">
	<div class="ro-thumb">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>
		<?php 
			$link = get_post_meta(get_the_ID(), 'tb_post_link', true); 
			if($link) echo '<div class="ro-link"><a href="'.esc_url($link).'"><i class="fa fa-link"></i></a></div>';
		?>
	</div>
	<div class="ro-content">
		<?php if($show_title) { ?>
			<h4 class="ro-title ro-text-ellipsis"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		<?php } ?>
		<?php if($show_excerpt) { ?>
			<div class="ro-excerpt"><?php echo ro_custom_excerpt((int)$excerpt_lenght, $excerpt_more); ?></div>
		<?php } ?>
		<?php if($show_meta) { ?>
		<div class="ro-meta">
			<div class="ro-author"><div class="ro-meta-btn"><i class="fa fa-pencil"></i><span><?php echo get_the_author(); ?></span></div></div>
			<div class="ro-comment"><div class="ro-meta-btn"><i class="fa fa-comments-o"></i><span><?php comments_number( '0 Comment', '1 Comment', '% Comments' ); ?></span></div></div>
			<div class="ro-publish"><div class="ro-meta-btn"><i class="fa fa-calendar"></i><span><?php echo get_the_date('M d, Y'); ?></span></div></div>
			<?php if($columns == 1) { ?>
				<a href="<?php the_permalink(); ?>" class="ro-readmore pull-right"><span><?php _e('Read more', 'slova'); ?></span></a>
			<?php } ?>
		</div>
		<?php } ?>
	</div>
	
</div>