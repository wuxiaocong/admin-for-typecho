<!DOCTYPE HTML>
<html class="no-js">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="renderer" content="webkit">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
        <link rel="stylesheet" href="<?php $this->options->siteUrl(); ?>admin/css/normalize.css?v=17.10.30">
<link rel="stylesheet" href="<?php $this->options->siteUrl(); ?>admin/css/grid.css?v=17.10.30">
<link rel="stylesheet" href="<?php $this->options->siteUrl(); ?>admin/css/style.css?v=17.10.30">
<link rel="stylesheet" href="<?php $this->options->themeUrl(); ?>main.css?v=16">
<?php $this->header('generator=&template=&pingback=&xmlrpc=&wlw=');?>
   </head>
    <body>
<div class="typecho-head-nav clearfix" role="navigation">
    <nav id="typecho-nav-list">
    <ul class="root">
	<li class="parent"><a href="<?php $this->options->siteUrl(); ?>">概要</a></li>
	</ul>
<ul class="root">
	<li class="parent"><a href="/p">文章</a></li>
</ul>
<?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
<?php while($pages->next()): ?>
<ul class="root">
<li class="parent"><a href="<?php $pages->permalink(); ?>" title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
</ul>
<?php endwhile; ?>
   </nav>
    <div class="operate">
                <a href="#">游客</a>
    </div>
</div>
