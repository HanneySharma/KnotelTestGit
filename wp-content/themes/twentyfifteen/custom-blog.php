<?php
	/**
	 * Template Name: Blog Page
	*/
?>
<!DOCTYPE html>
<!-- saved from url=(0036)https://knotel.com/locations/bedford -->
<html>
<head>
<?php wp_head();  ?>
<script>
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
    ga('create', 'UA-46641860-13', 'auto');
    ga('send', 'pageview');
</script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<script src="<?php echo  get_stylesheet_directory_uri();  ?>/js/jquery-3.2.1.min.js"></script>

<link href="<?php echo  get_stylesheet_directory_uri();  ?>/css/map/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo  get_stylesheet_directory_uri();  ?>/css/map/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo  get_stylesheet_directory_uri();  ?>/css/map/style.css" rel="stylesheet" type="text/css">
<link href="<?php echo  get_stylesheet_directory_uri();  ?>/css/map/responsive.css" rel="stylesheet" type="text/css">
<link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" rel="stylesheet" media="all">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Knotel - Headquarters as a Service</title>
<meta name="google-site-verification" content="xQNTNIX4ym2k1Rxk_P65bk1J6YriGf27nt-x19XpKIs">
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/fonts.css">
<link rel="stylesheet" type="text/css" class="__meteor-css__" href="<?php echo get_stylesheet_directory_uri(); ?>/7d3a13dd59a6822481b90a5caf6f065423a815c5.css">
<link rel="apple-touch-icon" sizes="57x57" href="https://knotel.com/locations/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="https://knotel.com/locations/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="https://knotel.com/locations/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="https://knotel.com/locations/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="https://knotel.com/locations/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="https://knotel.com/locations/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="https://knotel.com/locations/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="https://knotel.com/locations/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="https://knotel.com/locations/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192" href="https://knotel.com/locations/favicon/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="https://knotel.com/locations/favicon/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="https://knotel.com/locations/favicon/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="https://knotel.com/locations/favicon/favicon-16x16.png">
<link rel="manifest" href="https://knotel.com/locations/favicon/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="favicon/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">
<meta name="description" content="The next level in company-sized workspace for companies up to 200 people.">
<meta property="og:title" content="Knotel">
<meta property="og:type" content="website">
<meta property="og:image" content="http://d1g17mzu1m6f7h.cloudfront.net/static-assets/b3d1ef348353_background-6.jpg">
<meta property="og:description" content="The next level in company-sized workspace for companies up to 200 people.">

<body>
    
<section class="press-area blog-detail-main">
    <?php
        //Start the loop.
        while ( have_posts() ) : the_post(); 
            if (has_post_thumbnail()) {  
                $src = get_the_post_thumbnail_url(null,'full');    
            }  
            $postdate =  get_the_date('d M Y');
            $authorname = get_the_author();
    ?>   
  <section class="section bg-light blog-detail-bg" style = "background-image: url('<?php echo $src; ?>');">
    <div class="blog-logo"> 
        <!--<a href="<?php echo get_home_url(); ?>"><img src="<?php //echo  get_stylesheet_directory_uri(); ?>/images/logo.png" alt=""> </div></a>-->
         <div style="position: absolute; z-index: 1000;">
                    <a href="<?php echo get_home_url(); ?>"><div class="logoTop"  data-radium="true" style="display: inline-block; width: 120px; height: 120px; border-radius: 50%; position: relative; text-align: center; overflow: hidden; margin: 12px 0px; background-color: rgb(187, 159, 125);"><div data-radium="true" style="width: 50%; display: inline-block; margin-top: 50%; transform: translateY(-50%);"><svg width="100%" height="100%" viewBox="-13 0 285 285" preserveAspectRatio="xMidYMid meet" version="1.1" data-radium="true"><g id="Land-+-Overview" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" data-radium="true"><g id="Land-+-Overview---Desktop-HD" transform="translate(-591.000000, -246.000000)" fill="#FEFEFE" data-radium="true"><g id="Section-1---Land" data-radium="true"><g id="Logo-Lockup" transform="translate(460.000000, 120.000000)" data-radium="true"><g id="Wordmark" transform="translate(131.000000, 365.000000)" data-radium="true"><path d="M242,42.0555556 L259,26 L259,43 L241,43 L229,42.9995428 L229,2 L242,2 L242,42.0555556 Z" id="L"></path><polygon id="E" points="220 12 220 2 188 2 188 43 220.089271 43 220 33 199 33 199 27 214 27 214 18 199 18 199 12"></polygon><polygon id="T" points="180 2 144 2 144 12.5 156 12.5 156 43 168 43 168 12.5 180 12.5"></polygon><path d="M118.5,12 C112.710454,12 108,16.7104539 108,22.5 C108,28.2895461 112.710454,33 118.5,33 C124.289546,33 129,28.2895461 129,22.5 C129,16.7104539 124.289546,12 118.5,12 M96,22.5 C96,10.0932203 106.09322,0 118.5,0 C130.90678,0 141,10.0932203 141,22.5 C141,34.9067797 130.90678,45 118.5,45 C106.09322,45 96,34.9067797 96,22.5 Z" id="O"></path><polygon id="N" points="48 2 58.8706076 2 76.8471964 25 76.8471964 2 88 2 88 43 77.8419273 43 59.0684381 19.2446156 59.0684381 43 48 43"></polygon><polygon id="K" points="42 2 27 2 11.5 18.5 11.5 2 0 2 0 45.5 16 28.5 27 43 42 43 24.5 20.5"></polygon></g><polyline id="Flag" points="334 126 260 322 186 126"></polyline></g></g></g></g></svg></div></div></a></div>
  </section>
  <div class="blog-detail-top-bg">
    <div class="container">
      <main id="main" class="site-main" role="main">
        <div class="grid-layout blog-page blog-detail">
          <div class="row">
            <article class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                 
              <div class="blog-detail-heading">
                <h1><?php the_title(); ?></h1>

                <div class="blog-date-left"> <a href="http://try.knotel.com/knotel-benefits/" target = "_blank">Book a Tour</a></div>
              </div>
                 
              <div class="blog-details">
                <div class="blog-short-description-main">
                    <?php the_content(); ?>
                </div>
              </div>
            <?php
                endwhile;
                wp_reset_query(); 
            ?>  
            </article>
          </div>
        </div>
      </main>
    </div>
  </div>
  <hr>
  <div class="blog-detail-bottom-bg">
    <div class="grid-layout blog-page">
      <div class="container">
        <h3 class="sm-heading">Recent Articles.</h3>
        <div class="row">   
        <?php
            // Start the loop.
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
            $args = array('posts_per_page' => 9,'cat' => 14,'order' =>'DESC','paged' => $paged);
            query_posts($args);
            while ( have_posts() ) : the_post(); 
                $authorname = get_the_author();
                $postdate =  get_the_date('d M Y');
                $shortcontent = strip_tags(get_the_content());
                
                //$shortcontent = str_replace("<p>","",get_the_content());
                //$shortcontent = str_replace('</p>','<br>',$shortcontent);
                $shortcontentxt = $shortcontent;
                if(strlen($shortcontent) > 350 ){
                    $shortcontentxt = substr($shortcontent, 0,350);
                }                
                $id = get_the_ID();
                $link = get_permalink($id);
                if (has_post_thumbnail()) {  
                    $img = get_the_post_thumbnail_url(null,'full');    
                }                  
            ?>  
            
          <article class="col-lg-4 col-md-4 col-sm-6 col-xs-12 view-first">
            <div class="view"> <a href="<?php echo $link; ?>"><img src="<?php echo $img; ?>"></a> </div>
            <div class="blog-details blog-details-list">

              <div class="blog-title"><a href="<?php echo $link; ?>"><?php the_title(); ?></a></div>
              <div class="blog-short-descriptionhh"><?php echo $shortcontentxt; ?></div>
              <?php 
              if(strlen($shortcontent) > 350 ){
                    ?>
              <div class="continueBtn"><a href="<?php echo $link; ?>">Continue Reading</a></div>
              <?php
                }
              ?>
              <div class="separator-line bg-black no-margin-lr"></div>
            </div>
          </article>
            
        <?php            
            endwhile;  
            wp_reset_query();
        ?>
        </div>
      </div>
    </div>
  </div>
  </div>
</section>   
       
    
 <?php get_footer('footer'); ?>   
 <?php get_template_part('googleadward'); ?>
  <script src="<?php echo  get_stylesheet_directory_uri();  ?>/js/map/bootstrap.min.js"></script>   
</body>
<?php wp_footer(); ?>
</html>