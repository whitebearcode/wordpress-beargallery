<footer class="bgallery_fl_footer">
    
                <div class="bgallery_fl_copyright">
                	<span class="cright">&copy; <?php echo date("Y");?> <span class="autor"><a class="autor" href="<?php echo home_url();?>"><?php echo bloginfo('name');?></a></span> All right Reserved.  <br><?php _e('Powered by <span class="autor"><a href="http://www.wordpress.org">Wordpress</a> & <a href="https://github.com/whitebearcode/wordpress-beargallery"> BearGallery</a></span>  '); ?><br>
     <?php if (General::Options('PoliceBa')): ?><img src="<?php echo get_template_directory_uri();?>/assets/images/icp.png"> <span class="autor"><a href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=<?php echo General::parseNumber(General::Options('PoliceBa')); ?>"><?php echo General::Options('PoliceBa'); ?></a></span><?php endif; ?> <?php if (General::Options('IcpBa')): ?><img src="<?php echo get_template_directory_uri();?>/assets/images/beian.png"> <span class="autor"><a href="https://beian.miit.gov.cn/"><?php echo General::Options('IcpBa'); ?></a></span><?php endif; ?></span>
     <?php if(!empty(General::Options('CustomizationFooterCode'))): ?>
     <br><?php echo General::Options('CustomizationFooterCode');?>
     <?php endif;?>
                </div>
    </footer>
</div>

<a class="totop" href="#"><i class="ri-arrow-up-double-fill"></i></a>
</div>

<script>
    $(function(){
          Fancybox.bind('[data-fancybox]');
         $('img.lazyload')
  .visibility({
    type       : 'image',
    transition : 'fade in',
    duration   : 1000,
  });

})
</script>
<script src="<?php echo get_template_directory_uri();?>/assets/plugins/lazyload/transition.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/plugins/lazyload/visibility.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/plugins/pjax/jquery.pjax.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/plugins/nprogress/nprogress.min.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/flexslider.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/resizesensor.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/sticky-sidebar.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/scroll.js"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/js/init.js?v=2"></script>
<script src="<?php echo get_template_directory_uri();?>/assets/plugins/fancybox/fancybox.umd.min.js"></script>


</body>
</html>