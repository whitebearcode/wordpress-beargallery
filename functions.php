<?php

function themeVersion()
        {
            return '1.0.1.20240703';
        }


function themeVersionOnly()
        {
            return '1.0.1';
        }


if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

require_once get_theme_file_path() .'/inc/codestar-framework/codestar-framework.php';
require_once get_theme_file_path() .'/core/General.php';
require_once get_theme_file_path() .'/core/Parse.php';
require_once get_theme_file_path() .'/inc/plugin-update-checker/plugin-update-checker.php';
use YahnisElsts\PluginUpdateChecker\v5\PucFactory;

$myUpdateChecker = PucFactory::buildUpdateChecker(
	'https://upgrade.typecho.co.uk/Beargallery/Wordpress/check.json',
	get_template_directory()."/functions.php",
	'beargallery'
);

if( class_exists( 'CSF' ) ) {
    ?>
    

        <?php 
global $wpdb;
  $prefix = 'beargallery';
  CSF::createOptions( $prefix, array(
    'menu_title' => '主题设置',
    'menu_slug'  => 'beargallery',
  ) );

CSF::createSection( $prefix, array(
    'title'       => '使用说明',
    'icon'        => 'fas fa-bolt',
    'description' => '欢迎使用BearGallery主题，本主题为<strong>摄影类相册主题</strong>，以下是本主题的使用说明。',
    'fields'      => array(
array(
            'type'    => 'submessage',
            'style'   => 'info',
            'content' => '

<font style="font-size:15px">
        我们制作了一个使用本主题的<a href="https://www.bearnotion.ru/userWebsites.html?type=beargallery">[站点展示列表页]</a>，若想将您的站点展示出来，请点击下方按钮申请加入，若已经加入将显示 [已加入] 标识和站点密钥SiteKey，该密钥后面将作为凭证用于修改展示的站点信息，我们也会定期检查站点，未达到条件者将被终止展示资格。</font><br>
  <span class="button button-primary csf--button" id="applyJoin" style="display:none">
            <i class="fas fa-hand-point-up"></i>
             申请加入
        </span>
<span class="button button-success csf--button" id="alreadyJoin" style="pointer-events: none;display:none">
            <i class="fas fa-check"></i>
             已加入
        </span>
    <span class="button button-success csf--button" id="alreadyJoin2" style="pointer-events: none;display:none">
            <i class="fas fa-exclamation-triangle"></i>
             已终止
        </span>    
        <span id="siteKey" style="display:none"></span>
 ',
        ),
        array(
            'type'    => 'heading',
            'content' => '使用说明',
        ),

        array(
            'type'    => 'content',
            'content' => '1、主题用户交流QQ群:561848356<br><font color=red>2、若主题配置保存失败请检查是否开启了防火墙，且防火墙是否拦截了请求</font><br>3、不懂的问题或本主题存在的问题可加群或在BearTalk社区中进行反馈<br><div>
    4、
        BearTalk社区专属邀请码<br>[BearTalk社区是为使用者提供的一个讨论交流社区，您可以通过您的专属邀请码进行注册，传送门：<a href="https://www.beartalk.ru" target="_blank">戳这里</a>]
  
<style>
.invitecode{
    border: 1px solid gray;
    padding:10px;
    border-radius:5px
}
</style>
<br><br>
                <text class="invitecode">Loading...</text>

        <span class="button button-primary csf--button" id="getInviteCode" onClick="getInviteCode();">
            <i class="fas fa-sync"></i>
             获取邀请码
        </span>
        <div style="margin-top:5px;display:none" id="bindUser">您当前已绑定BearTalk社区账号：<span id="username_talk" style="border:1px dashed gray;border-radius:3px;padding:4px;line-height: 30px;"></span></div>
        <div style="margin-top:5px;display:none" id="bindUserNot">您当前还没有通过邀请码注册绑定BearTalk社区账号</div>
       
</div>     <center>  <br>
 <div class="csf-submessage csf-submessage-info">当前版本: v'.themeVersion().'</font></div>
<div id="versiontips" style="margin-top:10px"></div></center>


<script src="//lf3-cdn-tos.bytecdntp.com/cdn/expire-1-M/jquery/3.6.0/jquery.min.js" type="application/javascript"></script>
  <script src="//lf26-cdn-tos.bytecdntp.com/cdn/expire-1-M/layer/3.5.1/layer.min.js" type="application/javascript"></script>
',
        ),

        array(
            'type'    => 'submessage',
            'style'   => 'info',
            'content' => '在反馈本主题相关的问题时，请务必将以下内容放入您要反馈的内容中',
        ),
array(
                'type'    => 'notice',
            'style'   => 'info',
                'content' => '<ul style="margin:0 auto;"><li>BearGallery主题版本：v'.themeVersion().'[<a href="https://docs.whitebear.dev/index.php/archives/10/" target="_blank">更新日志</a>]</li><li>PHP版本：'.PHP_VERSION.'</li><li>网站服务器：'.$_SERVER['SERVER_SOFTWARE'].'</li><li>数据库：MySQL [Version：'.$wpdb->db_version().']</li><li>Wordpress版本：'.get_bloginfo('version').'</li><li>User Agent信息：'.$_SERVER['HTTP_USER_AGENT'].'</li></ul>',
        ),

    )
) );
  CSF::createSection( $prefix, array(
    'title'  => '基础设置',
    'icon'   => 'fas fa-rocket',
    'fields' => array(
      
     array(
            'id'      => 'header_choose',
            'type'    => 'radio',
            'title'   => '站点LOGO类型',
            'inline'  => true,
            'options' => array(
                'text'    => '文字LOGO',
                'image'   => '图片LOGO',
            ),
            'default' => 'text'
        ),
      array(
        'id'    => 'textlogo_text',
        'type'  => 'text',
        'title' => '站点文字LOGO',
        'after' => '请填入站点文字LOGO',
        'dependency' => array( 'header_choose', '==', 'text' ),
      ),

      array(
            'id'      => 'imagelogo',
            'title'   => '站点图片LOGO',
            'after' => '请上传站点图片LOGO',
            'type'    => 'upload',
            'dependency' => array( 'header_choose', '==', 'image' ),
        ),
     
     
      array(
            'id'      => 'favicon',
            'type'    => 'upload',
            'title'   => '站点Favicon图标',
        ),
     
        
        
        
      
    )
  ) );
CSF::createSection( $prefix, array(
    'title'  => '顶部设置',
    'icon'   => 'fas fa-headphones',
    'fields' => array(
     
        array(
            'id'       => 'CustomizationCode',
            'type'     => 'code_editor',
            'title'    => '顶部自定义代码',
            'subtitle' => '如百度Meta验证代码，均可以放在这里',
        ),
        
        
    )
  ) );
  
 $ht = "<script>
           window.siteUrl = '".home_url()."';
           window.siteName = '".get_bloginfo('name')."';
           window.siteDesc =  '".get_bloginfo('description')."';
           window.useTheme = 'beargallery';
           window.siteToken = '".General::md5Encode(home_url()).'7bae2123bear'."';
        </script>";

  CSF::createSection( $prefix, array(
    'title'  => '底部设置',
    'icon'   => 'fas fa-cube',
    'fields' => array(
    array(
        'id'    => 'IcpBa',
        'type'  => 'text',
        'title' => 'ICP备案号',
        'after' => '请填写您网站的ICP备案号,若无ICP备案请为空'.$ht,
      ),
      array(
        'id'    => 'PoliceBa',
        'type'  => 'text',
        'title' => '公安备案号',
        'after' => '请填写您网站的公安备案号,若无公安备案请为空',
      ),
    array(
            'id'       => 'CustomizationFooterCode',
            'type'     => 'code_editor',
            'title'    => '底部自定义代码',
            'after' => '可放置网站统计代码等<br><font color=red>谨慎填写，仅需填写代码即可！</font>需注意语法，若语法错误可能会造成前台报错甚至组件动作失效！',
        ),
    )
  ) );

  
  
CSF::createSection( $prefix, array(
    'title'       => '数据备份',
    'icon'        => 'fas fa-shield-alt',
    'description' => '本主题支持您通过以下功能对您所填写的配置信息进行备份导出，也可以对备份的数据进行导入。',
    'fields'      => array(

        array(
            'type' => 'backup',
        ),

    )
) );

?>



<?php
}
