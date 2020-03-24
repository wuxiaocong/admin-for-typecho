<?php
/**
 * 这是 Typecho 0.9 系统的一套默认皮肤
 * 
 * @package admin
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
global $can;//定义全局变量，方便下面获取
$cat=intval($this->request->cat);//获取cat
if($cat>0){$can='?cat='.$cat;}else{$can="";}
class Typecho_Widget_Helper_PageNavigator_Classic extends Typecho_Widget_Helper_PageNavigator
{
    public function prev($prevWord = 'PREV')
    {
        //输出上一页
        if ($this->_total > 0 && $this->_currentPage > 1) {
            echo '<a class="prev" href="' . str_replace($this->_pageHolder, $this->_currentPage - 1, $this->_pageTemplate) . $this->_anchor . $GLOBALS['can'] . '">'
            . $prevWord . '</a>';
        }
    }
    public function next($nextWord = 'NEXT')
    {
        //输出下一页
        if ($this->_total > 0 && $this->_currentPage < $this->_totalPage) {
            echo '<a class="next" title="" href="' . str_replace($this->_pageHolder, $this->_currentPage + 1, $this->_pageTemplate) . $this->_anchor . $GLOBALS['can'] . '">'
            . $nextWord . '</a>';
        }
    }
}
?>
 <style>
 .typecho-list-operate input, .typecho-list-operate button, .typecho-list-operate select {
    margin-right: 2px;
}
</style>
<div class="main">
    <div class="body container">
        <div class="typecho-page-title">
    <h2><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></h2>
</div>
        <div class="row typecho-page-main" role="main">
            <div class="col-mb-12 typecho-list">
                <div class="typecho-list-operate clearfix">
                        <div class="operate">
                            <div class="btn-group btn-drop">
<img src="<?php $this->options->themeUrl('images/logo.png'); ?>" height="30px"/>
                            </div>  
                        </div>
                        <form method="post" action="<?php $this->options->siteUrl(); ?>" role="search">
                        <div class="search" role="search">
                                                        <input type="text" class="text-s" placeholder="请输入关键字" value="" name="ss" />
                            <select name="cat">
                            	<option value="">所有分类</option>
                            	                            	<option value="33">说说</option>
                            	                            	<option value="2">记录</option>
                            	                            	<option value="3">作品</option>
                            	                            	<option value="10">线报</option>
                            	                            	<option value="111">日常</option>
                            	                            </select>
                            <button type="submit" class="btn btn-s">筛选</button>
                        </div>
                        </form>
                </div><!-- end .typecho-list-operate -->
                <form method="post" name="manage_posts" class="operate-form">
                <div class="typecho-table-wrap">
<?php if ($this->have()): ?>
                    <table class="typecho-list-table">
                        <colgroup>
                            <col width="20"/>
                            <col width="6%"/>
                            <col width="45%"/>
                            <col width=""/>
                            <col width="18%"/>
                            <col width="16%"/>
                        </colgroup>
                        <thead>
                            <tr>
                                <th> </th>
                                <th>评论</th>
                                <th>标题</th>
                                <th>作者</th>
                                <th>分类</th>
                                <th>日期</th>
                            </tr>
                        </thead>
                        <tbody>
<?php while($this->next()): ?>
<tr id="post-307">
	<td>

	</td>
	<td>
		<a href="<?php $this->permalink() ?>" class="balloon-button size-1" title="<?php $this->commentsNum('0', '1', '%d'); ?> 评论"><?php $this->commentsNum('0', '1', '%d'); ?></a>
	</td>
	<td>
		<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
		<a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><i class="i-exlink"></i></a>
	</td>
	<td>
		<a href="<?php $this->author->permalink(); ?>"><?php $this->author(); ?></a>
	</td>
	<td>
		<?php $this->category(','); ?>
	</td>
	<td><?$this->date()?></td>
</tr>
<?php endwhile; ?>
                                                        
                            </tr>
                                                                                </tbody>
                    </table>
<?php else: ?>
            <article class="post">
                <h2 class="post-title"><?php _e('没有找到内容'); ?></h2>
            </article>
        <?php endif; ?>
                </div>
                </form><!-- end .operate-form -->
                <div class="typecho-list-operate clearfix">
<?php $this->pageNav('«', '»', 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'typecho-pager', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
                </div><!-- end .typecho-list-operate -->
            </div><!-- end .typecho-list -->
        </div><!-- end .typecho-page-main -->
    </div>
</div>
<?php $this->need('footer.php'); ?>