<?php
/**
 * 粗糙的皮肤
 * 
 * @package admin
 * @author 吴尼玛
 * @version 1.0
 * @link https://saikou.net/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
?>
 <style>
 .typecho-list-operate input, .typecho-list-operate button, .typecho-list-operate select {
    margin-right: 2px;
}
</style>
<div class="main">
    <div class="body container">
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
                                                        <input type="text" class="text-s" placeholder="请输入关键字" value="" name="ss"  required/>
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
                    <table class="typecho-list-table">
<colgroup><col width="6%"><col width="45%"><col width="20%"><col width="18%"><col width="16%"></colgroup>
                        <thead>
                            <tr>
                                <th> </th>
                                <th>标题</th>
                                <th>作者</th>
                                <th>分类</th>
                                <th>日期</th>
                            </tr>
                        </thead>
                        <tbody>
<?php while($this->next()): ?>
<tr id="post-<?php $this->cid(); ?>">
	<td>
		<a href="<?php $this->permalink() ?>" class="balloon-button size-1" title="<?php $this->commentsNum('0', '1', '%d'); ?> 评论"><?php $this->commentsNum('0', '1', '%d'); ?></a>
	</td>
	<td>
		<a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
		<a target="_blank" href="<?php $this->permalink() ?>" title="<?php $this->title() ?>"><i class="i-exlink"></i></a>
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