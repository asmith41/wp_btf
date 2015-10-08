<?php
get_header();
if(have_posts()):
	while(have_posts())  :  the_post();
?>
<div class="page_container">
	<div class="textWrap">
	<a href="<?php the_permalink();?>"><h3><?php the_title();?></h3></a>
	<?php the_content();?>
	</div>
</div>
<?php
endwhile;
endif;

?>
