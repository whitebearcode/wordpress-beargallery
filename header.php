<?php
/**
 * @package BearNotion
 * @subpackage BearGallery
 * @since BearGallery v1.0.0
 */
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
 <title>
     <?php
    if (is_single() || is_page()) {
        echo wp_title('', true);
    } else {
        echo bloginfo('name');
        if(get_bloginfo('description')){
        echo ' - '.get_bloginfo('description');
        }
    }
    ?>
 </title>
  <?php wp_head(); ?>

    <link rel="preload" href="https://fonts.googleapis.com/css2?family=Noto+Serif+SC:wght@200;300;400;500;600;700;900&display=swap" as="style" onload="this.rel='stylesheet'" crossorigin>
<script src="<?php echo get_template_directory_uri();?>/assets/js/jquery.min.js"></script>
<link href="//lib.baomitu.com/remixicon/3.7.0/remixicon.min.css" rel="stylesheet">
<link rel="stylesheet" href="//lib.baomitu.com/element-ui/2.15.14/theme-chalk/index.min.css">
<link rel="stylesheet"  href="<?php echo get_template_directory_uri();?>/assets/css/skeleton.css" />
<link rel="stylesheet"  href="<?php echo get_template_directory_uri();?>/assets/css/base.css" />
<link rel="stylesheet"  href="<?php echo get_template_directory_uri();?>/assets/css/flexslider.css" />
<link rel="stylesheet"  href="<?php echo get_template_directory_uri();?>/style.css?v=2" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/plugins/fancybox/fancybox.min.css">   
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/plugins/nprogress/nprogress.min.css">
<link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/plugins/lazyload/transition.min.css">
 <script src="<?php echo get_template_directory_uri();?>/assets/plugins/qrious/qrious.min.js"></script>
 <style>
        *{
            font-family: 'Noto Serif SC',serif!important;
        }
        </style>
    <?php echo General::Options('CustomizationCode'); ?>
</head>
<body>
    <div id="pjax">
        
<div class="bgallery_fl_wrapper_all">
    <header class="bgallery_fl_header">
    </header>
    
      <div class="bgallery_fl_content">
        <div class="bgallery_fl_vertical_menu">
        	<div class="bgallery_fl_vertical_menu_in scrollable">
            	<span class="vertical_menu_closer">
                	<a href="javascript:void(0);"></a>
                    <span></span>
                    <span></span>
                </span>
                <div class="bgallery_fl_logo">
                     <?php if(General::Options('header_choose') == 'image'):?>
                        <img  src="<?php echo General::Options('imagelogo');?>"  height="75" loading="lazy">
                        <?php else:?>
<h3><?php echo General::Options('textlogo_text');?></h3>
<?php endif;?>
            
                </div>
                <div class="bgallery_fl_vertical_menu_nav_list">
                	<ul>
                    	<li>
                        	<a <?php if (is_home() || is_front_page()) :?>class="current"<?php endif;?> href="<?php echo home_url();?>"><span class="line">首页</span></a>
                        </li>
                         <?php $pages = get_pages(array(
    'sort_column' => 'post_date',
    'sort_order'  => 'desc',
    'hierarchical' => 0,
    'number' => -1,
));

foreach ($pages as $page) {
    if (is_page($page->ID)) {
    echo '<li><a class="current" href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a></li>';    
    }
    else{
    echo '<li><a href="' . get_permalink($page->ID) . '">' . $page->post_title . '</a></li>';
    }
}
?>
                    </ul>
                </div>
              
                <div class="bgallery_fl_copyright">
                	<span class="cright">&copy; <?php echo date("Y");?> <span class="autor"><a class="autor" href="<?php echo home_url();?>"><?php echo bloginfo('name');?></a></span> All right Reserved.  <br><?php _e('Powered by <span class="autor"><a href="http://www.wordpress.org">Wordpress</a> & <a href="https://github.com/whitebearcode/wordpress-beargallery"> BearGallery</a></span>  '); ?><br>
     <?php if (General::Options('PoliceBa')): ?><img src="<?php echo get_template_directory_uri();?>/assets/images/icp.png"> <span class="autor"><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo General::parseNumber(General::Options('PoliceBa')); ?>"><?php echo General::Options('PoliceBa'); ?></a></span><?php endif; ?><?php if (General::Options('IcpBa') && General::Options('PoliceBa')): ?> <br> <?php endif; ?><?php if (General::Options('IcpBa')): ?><img src="<?php echo get_template_directory_uri();?>/assets/images/beian.png"> <span class="autor"><a href="https://beian.miit.gov.cn/"><?php echo General::Options('IcpBa'); ?></a></span><?php endif; ?></span>
     <?php if(!empty(General::Options('CustomizationFooterCode'))): ?>
     <br><?php echo General::Options('CustomizationFooterCode');?>
     <?php endif;?>
                </div>
                
            </div>
        </div>
      
      
        <div class="bgallery_fl_content_in">
        	<div class="bgallery_fl_menu_trigger light">
            	<a href="javascript:void(0);">
                	<span class="menu_on">
                    	<span class="menu_a"></span>
                        <span class="menu_b"></span>
                        <span class="menu_c"></span>
                    </span>
                </a>
            </div>