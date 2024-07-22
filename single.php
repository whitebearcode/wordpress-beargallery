<?php

get_header(); ?>

<div id="dialog-content" style="display:none;max-width:500px;">
        <h2 style="color:#000;text-align:center">微信分享二维码</h2>
        <p>
            <canvas id="wechatQrcode"></canvas>
        </p>
      </div>
            <div class="bgallery_fl_main_content_wrap">
            
				<div class="bgallery_fl_gallery_single">
					<div class="container">
					<div>
						<div class="bgallery_fl_gallery_single_in">
							<div class="title_holder sticky_sidebar">
							    <?php while ( have_posts() ) :
			the_post();?>
								<h2><span style="font-weight:bold;letter-spacing:3px;"><?php echo get_the_title();?></span></h2>
								<span class="category"><?php the_date(); ?> - <?php
$categories = get_the_category();
if ($categories) {
    foreach($categories as $category) {
        echo $category->name  . '  ';
    }
}
?></span>
								<div class="ppp">
								    <?php
            $content = get_the_content();
            ?>
								    <?php echo General::getArticleText(apply_filters('the_content', $content));?>
								</div>
							</div>
							<div class="img_list sticky_sidebar">
                           <?php echo General::getArticleImage(apply_filters('the_content', $content),get_the_ID(),'single');?>
<?php endwhile;?>
								<div class="space100"></div>
								<span class="prev_next"><?php
global $post;
$current_post_id = $post->ID;
 $st = '';

$prev_post = get_previous_post();
$next_post = get_next_post();
if (!empty($prev_post) && !empty($next_post)){
    $st = ' / ';
}
if (!empty($prev_post)) {
    $prev_post_id = $prev_post->ID;
    $prev_post_title = get_the_title($prev_post_id);
    $prev_post_permalink = get_permalink($prev_post_id);
    echo '<a href="' . $prev_post_permalink . '">上一篇：' . $prev_post_title . '</a>'.$st;
}
 


if (!empty($next_post)) {
    $next_post_id = $next_post->ID;
    $next_post_title = get_the_title($next_post_id);
    $next_post_permalink = get_permalink($next_post_id);
    echo '<a href="' . $next_post_permalink . '">下一篇：' . $next_post_title . '</a>';
}
?></span>
							</div>
						</div>
					</div>
					

					
					</div>
					
					
					
					
					
					
				</div>
          	
          	
          		 
           	</div>
           	
           	
           
           	 
        </div>
<script>
$(function(){
    var qr = new QRious({
    element:document.getElementById('wechatQrcode'),
    size:300, 	   level:'H',	   value:'<?php echo the_permalink();?>'
            });
            
    var title=$(document.head).find("[name=title], [name=Title]").attr("content")||document.title;var url=window.location.href;var domain=window.location.origin;var description=$(document.head).find("[name=description], [name=Description]").attr("content")||"";var source=$(document.head).find("[name=site], [name=Site]").attr("content")||document.title;
    $('.share_qzone').on('click',function(){window.open('https://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url='+url+'&title='+title+'&site='+source+'&desc='+description+'&summary='+description+'&pics='+$(this).attr('data-img'));});
    $('.share_weibo').on('click',function(){window.open('https://service.weibo.com/share/share.php?url='+url+'&title='+title+'&pic='+$(this).attr('data-img')+'&appkey=');});
})
    
</script>
<?php get_footer(); ?>
