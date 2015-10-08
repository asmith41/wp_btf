<?php
/**
 * Template Name: Home Page Template
 * This is the Home page template
 * @author Asmit Rajbhandari
 */
?>
<?php get_header();?>
<?php

?>

<script>
  $(document).ready()
  $(window).load(function() {
    $('.flexslider').flexslider({
      animation: "slide"
    });
  });
</script>


<section class="slider">
  <div id="mainSlider" class="flexslider">
    <div class="sliderCaption">
      <h2><?php
        $text=new WP_Query('post_type=slider');
        $text->the_post();
        $meta_text=get_post_meta($post->ID,'slider_text',true);
        echo $meta_text;

        ?>
      </h2>
      <a class="btn btn-primary" href="<?php echo site_url();?>/about-us">LEARN MORE</a>
    </div>
    <!-- make a theme options for slider images -->
    <ul class="slides">
      <?php $slider=get_post_meta($post->ID,'imageslider',true)?>
      <?php $slider1=get_post_meta($post->ID,'imageslider1',true)?>
      <?php $slider2=get_post_meta($post->ID,'imageslider2',true)?>
      <li>
        <img src="<?php echo $slider['url'];?>">
      </li>
      <li>
        <img src="<?php echo $slider1['url'];?>">
      </li>
      <li>
        <img src="<?php echo $slider2['url'];?>">
      </li>

    </ul>
  </div>
  <div class="midcaption">
    <div class="caption">
      <?php
      ?>
      <h4 id="text"><?php 
        echo $meta_text;?>
        <span><a class="btn btn-primary" href="<?php echo site_url();?>/about-us/">LEARN MORE</a></span></h4>
        <!-- <h4 id="text">LET US GUIDE YOU TO FINANCIAL FREEDOM <span><a class="btn btn-primary" href="#">LEARN MORE</a></span></h4> -->
      </div>
    </div>

    <div class="smallcaption">
      <a class="btn btn-primary" href="<?php echo site_url();?>/about-us">LEARN MORE</a>
    </div> 

  </section>
  <?php wp_reset_query(); ?>
  <section class="introduction">
    <div class="container">
     <?php

// check if the repeater field has rows of data
     if( have_rows('page_content') ):
      $var=2;
  // loop through the rows of data
    while ( have_rows('page_content') ) : the_row();?>
    <div class="row">
      <?php 
      if(($var % 2)==0):
        ?>
      <div class="introWrap">
        <div class="col-lg-4">
          <div class="introOne">
            <figure class="introImg">
              <img src="<?php the_sub_field('image');?>">
            </figure> 
          </div>
        </div>
        <div class="col-lg-7 col-lg-offset-1">
          <div class="textWrap">
            <h3><?php the_sub_field('heading');?></h3>
            <p><?php   the_sub_field('text_content');?></p>
          </div>
        </div>
      </div>
    </div>
    <?php

    else:
      ?>
    <div class="introWrap second">
      <div class="col-lg-7">
        <div class="textWrap">
          <h3><?php the_sub_field('heading');?></h3>
          <p><?php the_sub_field('text_content');?></p>
        </div>
      </div>
      <div class="col-lg-4 col-lg-offset-1">
        <div class="introTwo">
          <figure class="introImg">
            <img src="<?php the_sub_field('image');?>">
          </figure> 
        </div>
      </div>
    </div>
    <?php 
    endif;
    $var+=1;
    endwhile;   
    endif;


    ?>
  </div>
</section>

<section class="welcome">
  <div class="container">
    <div class="row">
      <div class="welcomeMsg">
        <h3><?php echo get_field('welcome_note');?></h3>
        <p><?php echo get_field('content');?></p>
      </div>
    </div>
<br><br>  
    <div class="row">
      <div class="">
        <h3><?php echo get_field('service_heading');?></h3>
        <?php
          if( have_rows('services') ):
            while ( have_rows('services') ) : the_row();?>
           <div class="col-lg-3">
              <div class="workBlock">
            <a href=""><div class="service_image"><img src="<?php echo the_sub_field('service_image');?>"></a></div>
            <h4><?php the_sub_field('service_title');?></h4>
            <p><?php the_sub_field('service_content')?></p>
          </div>
        </div>
        <?php endwhile;
        endif;
        ?>
      </div>
    </div>
     </section>






<section class="enquiry">
  <div class="container">
    <div class="row">
      <p><?php echo get_field('banner_content')?>
        <a class="btn btn-primary" href="<?php echo site_url();?>/contact/"><?php echo get_field('button_text');?></a></p>
    </div>
  </div>
</section>

<?php 

?>

<section class="blogTestimony">
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <a href="<?php echo site_url();?>/blog/"><h3>Blogs</h3></a>
        <div id="flexContentSlider" class="ourBlog">
          <ul class="slides">
            <li>
              <figure>
                <?php 
                $blog_content=new WP_Query( 'post_type=post' );
                if($blog_content->have_posts()):
                  while( $blog_content->have_posts() ): $blog_content->the_post();
                if(has_post_thumbnail()){
                  the_post_thumbnail('medium');
                }
                ?>
              </figure>
              <div class="blogContent">
                <h4><a href="<?php echo get_permalink();?>"><?php the_title();?></h4></a>
                <p><?php the_content();?></p><br>
              </div>
              <?php
              endwhile;
              endif;
              ?>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-6">

      </div>
    </div>
  </div>
</section>




