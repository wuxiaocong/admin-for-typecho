<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="main">
    <div class="body container">
        <div class="typecho-page-title">
    <h2>查看 <?php $this->title() ?></h2>
</div>
        <div class="row typecho-page-main typecho-post-area" role="form">

                <div class="col-mb-12" role="main">
                    
                    <p class="title">
                        <label for="title" class="sr-only">标题</label>
                        <input type="text" id="title" name="title" autocomplete="off" value="<?php $this->title() ?>" placeholder="标题" class="w-100 text title" />
                    </p>
                                        <p class="mono url-slug">
                        <label for="slug" class="sr-only">网址缩略名</label>
                        feed.cc/p/<input type="text" id="slug" name="slug" autocomplete="off" value="<?php $this->slug() ?>" class="mono" />.html                    </p>

<div id="wmd-preview">
	<p><?php $this->content(); ?></p>
</div>
<section id="custom-field" class="typecho-post-option fold nolink">
<label id="custom-field-expand" class="typecho-label"><?php $this->category(','); ?>/<?php $this->tags(', ', true, 'none'); ?></label>
<time class="gooutright" datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
</section>
<?php $this->need('comments.php'); ?>
                                    </div>
        </div>
    </div>
</div>
<?php $this->need('footer.php'); ?>