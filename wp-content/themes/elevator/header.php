<!DOCTYPE html>
<head>

<!-- 
o o     o     +              o                     o      o         +            o
+   +     +             o     +       +           +                   +             +
            +                               o           +          o       
o  +    +        o  +           +        +               o   +               o   
     ______   _       ______  __       __   _    _________    _____    ______
+   |  ____| | |     |  ____| \ \     / /  / \  |___   ___|  /  _  \  |   _  \       +
    | |____  | |     | |____   \ \   / /  / _ \     | |     |  / \  | |  (_)  |      
  + |  ____| | |     |  ____|   \ \ / /  / /_\ \    | |     |  | |  | |  __  /       
o   | |____  | |___  | |____     \ \ /  / _____ \   | |     |  \_/  | | |  \ \     o    
 +  |______| |_____| |______|     \_/  /_/     \_\  |_|      \_____/  |_|   \_\     +   
   
o o     o     +              o                     +       o         +   +       o
+   +     +             o     +       +     o     +            o                
            +                                              +                    +    o
o  +    +        o  +           +        +       o               +         o
-->


<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="verify-v1" content="7XvBEj6Tw9dyXjHST/9sgRGxGymxFdHIZsM6Ob/xo5E=" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta property="twitter:account_id" content="449140978" />

<meta property="og:image" content="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url();} ?>"/>

<title><?php if (is_home()){ bloginfo('name');} else {wp_title(''); ?> | <?php bloginfo('name'); }?></title>

<link rel="Shortcut Icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="http://www.elevatormag.com/wp-content/uploads/2015/05/elevator-touch-icon.png">

<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/css/normalize.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('stylesheet_url'); ?>"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/css/font-awesome.min.css"/>
<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/css/jw-skin-elevator.min.css"/>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> <?php _e("RSS Feed", 'organicthemes'); ?>" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> <?php _e("Atom Feed", 'organicthemes'); ?>" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>




<script type="text/javascript">
jwplayer('elevator').setup({
    width: 640,
    height: 360,
    file: "/uploads/example.mp4",
    image: "/uploads/example.jpg",
    skin : {
        url:"//elevatormag.com/css/flat.min.css",
        name:"flat"
    }
});
</script>








</head>

<body <?php if(function_exists('body_class')) body_class(); ?>>
  
<header>
  <div class="site-header">
    <h1>ELEVATOR</h1>
    <div id="logo" >
      <a href="<?php echo site_url(); ?>" title="ELEVATOR" class="glitch">
      <img width="90px" src="<?php bloginfo('template_url'); ?>/images/elevator-header-logo@2xbw.png"/>
      <img width="90px" src="<?php bloginfo('template_url'); ?>/images/elevator-header-logo@2x.png"/>
      <img width="90px" src="<?php bloginfo('template_url'); ?>/images/elevator-header-logo@2xbw.png"/>
      </a>
    </div>

    <a href="javascript:void(0)" class="icon">
      <div class="hamburger">
        <div class="menui top-menu"></div>
        <div class="menui mid-menu"></div>
        <div class="menui bottom-menu"></div>
      </div>
    </a>

    <a href="javascript:void(0)" class="icon">
      <div class="hamburger-left">
        <div class="menui top-menu"></div>
        <div class="menui mid-menu"></div>
        <div class="menui bottom-menu"></div>
      </div>
    </a>

  </div>
      
  <nav class="navbar mobile-nav" role="navigation">
       
    <!--Collect the nav links, forms, and other content for toggling-->
    <div class="search">
      <span id="search-icon"><i class="fa fa-search"></i></span>
      <form id="searchform" role="search" method="get" action="<?php bloginfo('home'); ?>">
        <input type="text" class="form-control" value="" name="s" id="search-input">
      </form>
    </div>
    <?php if ( function_exists('wp_nav_menu') ) { 
      wp_nav_menu( array( 'title_li' => '', 'depth' => 0, 'container_class' => 'menu-container' ) ); 
    }?>
        
  </nav>


</header>

<div id="wrap">