<?php 

/**
 * 
 *   BearGallery 基础工具类
 *   Update at 2024/01/01
 * 
*/
class General
{
    
    
    //获取除了文章图片外的文字内容
    public static function getArticleText($content){
        $pattern = '/<\s*img[\s\S]+?(?:src=[\'"]([\S\s]*?)[\'"]\s*|alt=[\'"]([\S\s]*?)[\'"]\s*|[a-z]+=[\'"][\S\s]*?[\'"]\s*)+[\s\S]*?>/i';
        $content = preg_replace($pattern, '', $content);
        return $content;
    }
    
    //提取图片相关数据
    public static function extract_img($img) {
    preg_match_all('/(id|alt|title|src)=("[^"]*")/i', $img, $matches);
    $ret = array();
    foreach($matches[1] as $i => $v) {
        $ret[$v] = $matches[2][$i];
    } 
    echo $ret;
}


    //获取文章图片
    public static function getArticleImage($content,$cid,$place){
        $pattern = '/<\s*img[\s\S]+?(?:src=[\'"]([\S\s]*?)[\'"]\s*|alt=[\'"]([\S\s]*?)[\'"]\s*|[a-z]+=[\'"][\S\s]*?[\'"]\s*)+[\s\S]*?>/i';

 $replacement = '
  <img class="lazyload lazyload-style-2" data-fancybox="post-'.$cid.'" data-caption="$2" src="data:image/svg+xml;base64,PCEtLUFyZ29uTG9hZGluZy0tPgo8c3ZnIHdpZHRoPSIxIiBoZWlnaHQ9IjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgc3Ryb2tlPSIjZmZmZmZmMDAiPjxnPjwvZz4KPC9zdmc+" data-src="$1" alt="$2" style="border-radius:3px;cursor: zoom-in;">'; 
    $content = preg_replace($pattern, $replacement, $content);
        preg_match_all('/<img[^>]+>/i', $content, $matches);
$images = $matches[0];
 
// 遍历所有图片并输出
if (!empty($images)) {
    if($place == 'nosingle'){
    $i = 1;
    foreach ($images as $image) {
        if($i <= 3){
        echo '<li>'.$image.'</li>';
        }
        $i++;
    }
    }
     elseif($place == 'single'){
       foreach ($images as $image) {
       preg_match_all('/<img[^>]+src="([^"]+)"[^>]*>/i', $image, $matches);
        $srcs = $matches[1];
    
    
        echo '<div class="img_list_nth">
									'.$image.'
									<div class="title"><a href="#"><span>分享</span></a></div>
									<div class="share_social">
										<ul>
											<li><a class="share_qzone" title="分享至QQ" style="cursor:pointer" data-img="'.$srcs[0].'"><i class="ri-qq-line"></i></a></li>
											<li><a class="share_weibo" title="分享至微博" style="cursor:pointer" data-img="'.$srcs[0].'"><i class="ri-weibo-line"></i></a></li>
											<li><a data-fancybox data-src="#dialog-content" title="分享至微信" style="cursor:pointer"><i class="ri-wechat-line"></i></a></li>
										</ul>
									</div>
								</div>';
       
    }  
     }
     
}
    }
    
   
    //获取主题控制项值
    public static function Options($key, $default = false){
    $options = get_option('beargallery');
    return $options[$key];
    }
    
  

   //获取字段中的所有数字
   public static function parseNumber($str){
    return preg_replace("/[^0-9]/", "", $str);
}


   public static function md5Encode($data){
    return md5("bearsimplev2!@#$%^&*()-=+@#$%$".$data."bearsimplev2!@#$%^&*()-=+@#$%$");
}
    
    

}