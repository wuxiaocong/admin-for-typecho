<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeInit($archive)
{
if($archive->request->isPost() && isset($archive->request->ss)){
so($archive);//判断为post请求，并且有参数ss,启用so函数
}}
function so($obj){
$url=$obj->options->index;
if (Helper::options()->rewrite==0){$url=Helper::options()->rootUrl.'/index.php/';}
        /** 处理搜索结果跳转 */
        if (isset($obj->request->ss)) {
            $filterKeywords = $obj->request->filter('search')->ss;//获取搜索词
 $cat = $obj->request->filter('search')->cat;//获取分类id
            /** 跳转到搜索页 */
            if (NULL != $filterKeywords) {
                $obj->response->redirect(Typecho_Router::url('search',
                array('keywords' => urlencode($filterKeywords)),$url)."?cat=".$cat);//设置跳转地址
            }
        }
}
function themeConfig($form){
$Links = new Typecho_Widget_Helper_Form_Element_Textarea('Links', NULL, NULL, _t('链接列表（注意：切换主题会被清空，注意备份！）'), _t('按照格式输入链接信息，格式：<br><strong>链接名称（必须）,链接地址（必须）<br>多个链接换行即可，一行一个'));
$form->addInput($Links);
}
function Links($sorts = NULL) {
    $options = Typecho_Widget::widget('Widget_Options');
    $link = NULL;
    if ($options->Links) {
        $list = explode("\r\n", $options->Links);
        foreach ($list as $val) {
            list($name, $url) = explode(",", $val);
                $arr = explode(",", $sorts);
                    $link .=  '<li><span>LINK</span><a href="'.$url.'" title="'.$name.'" target="_blank">'.$name.'</a></li>';
        }
    }
    echo $link ? $link : '<li>暂无链接</li>';
}