<?php
/**
* 首页
*
* @package custom
*/

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
 $this->need('header.php');
 ?>
<div class="main">
    <div class="container typecho-dashboard">
        <div class="typecho-page-title">
    <h2>网站概要</h2>
</div>
        <div class="row typecho-page-main">
            <div class="col-mb-12 welcome-board" role="main">
            	<?php Typecho_Widget::widget('Widget_Stat')->to($stat); ?>
                <p>目前有 <em><?php $stat->publishedPostsNum() ?></em> 篇文章, 并有 <em><?php $stat->publishedCommentsNum() ?></em> 条评论在 <em><?php $stat->categoriesNum() ?></em> 个分类中. </p>
			</div>

            <div class="col-mb-12 col-tb-4" role="complementary">
                <section class="latest-link">
                    <h3>最近发布的文章</h3>
                                        <ul>
<?$this->widget('Widget_Contents_Post_Recent')->to($recent);?>
<?php while($recent->next()): ?>
<li>
<span><?php $recent->date("m.d"); ?></span>
<a href="<?php $recent->permalink() ?>" class="title"><?php $recent->title() ?></a>
</li>
<?php endwhile; ?>
                                        </ul>
                </section>
            </div>

            <div class="col-mb-12 col-tb-4" role="complementary">
                <section class="latest-link">
                    <h3>最近得到的回复</h3>
                    <ul>
<?php $this->widget('Widget_Comments_Recent')->to($comments); ?>
<?php while($comments->next()): ?>
<li>
<span><?php $comments->date("m.d"); ?></span>
<a href="<?php $comments->permalink(); ?>" class="title"><?php $comments->author(false); ?></a>:
<?php $comments->excerpt(35, '...'); ?>
</li>
<?php endwhile; ?>
                   </ul>
                </section>
            </div>

            <div class="col-mb-12 col-tb-4" role="complementary">
                <section class="latest-link">
                    <h3>友情链接</h3>
                    <div id="typecho-message">
                        <ul>
<?php Links(); ?>
                        </ul>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>
