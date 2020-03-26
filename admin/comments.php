<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
 
    $commentLevelClass = $comments->levels > 0 ? ' comment-child' : ' comment-parent';
?>
<div class="ds-post-main" id="<?php $comments->theId(); ?>">
	<div class="ds-avatar">
		<a href="<?php $comments->permalink(); ?>"><?php $comments->gravatar('40', ''); ?></a>
	</div>
	<div class="ds-comment-body"><cite class="fn"><?php $comments->author(); ?></cite> <?php $comments->date('Y-m-d H:i'); ?><span class="comment-reply"><?php $comments->reply(); ?></span>
	<p><?php echo preg_replace("/::([a-z]*)::/i", "<img src=\"/usr/themes/admin/images/face/\\1.gif\"/>", $comments->content);?></p>
	</div>
</div>
<?php if ($comments->children) { ?>
    <div class="comment-children">
        <?php $comments->threadedComments($options); ?>
    </div>
<?php } ?>
<?php } ?>
<div id="comments">
    <?php $this->comments()->to($comments); ?>
    <?php if ($comments->have()): ?>

    <?php $comments->listComments(); ?>

<?php $comments->pageNav('«', '»', 1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'typecho-pager floatnone', 'itemTag' => 'li', 'textTag' => 'span', 'currentClass' => 'current', 'prevClass' => 'prev', 'nextClass' => 'next',)); ?>
    
    <?php endif; ?>

    <?php if($this->allow('comment')): ?>
    <div id="<?php $this->respondId(); ?>" class="respond">
        <div class="cancel-comment-reply">
        <?php $comments->cancelReply(); ?>
        </div>
    	<form method="post" action="<?php $this->commentUrl() ?>" class="karigor-form" id="custom-field" role="form">
    		<div class="karigor-form-inner">
            <div class="karigor-form-input">
            <p class="comment-smilies">
                    <a class="add-smily" href="javascript:grin('::huaji::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/huaji.gif"></a>
                    <a class="add-smily" href="javascript:grin('::good::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/good.gif"></a>
                    <a class="add-smily" href="javascript:grin('::outwater::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/outwater.gif"></a>
                    <a class="add-smily" href="javascript:grin('::hotface::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/hotface.gif"></a>
                    <a class="add-smily" href="javascript:grin('::angry::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/angry.gif"></a>
                    <a class="add-smily" href="javascript:grin('::poor::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/poor.gif"></a>
                    <a class="add-smily" href="javascript:grin('::unhappy::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/unhappy.gif"></a>
                    <a class="add-smily" href="javascript:grin('::doubt::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/doubt.gif"></a>
                    <a class="add-smily" href="javascript:grin('::rose::')"><img class="wp-smiley" src="/usr/themes/admin/images/face/rose.gif"></a>
            </p>
                <textarea name="text" id="new-review-textbox" cols="30" rows="5" placeholder="Comment" required><?php $this->remember('text'); ?></textarea>
            </div>
            <?php if($this->user->hasLogin()): ?>
            <?php else: ?>
            <div class="karigor-form-input karigor-form-input-three">
                <input name="author" type="text" id="new-review-name" value="<?php $this->remember('author'); ?>" placeholder="Name*" required>
            </div>
            <div class="karigor-form-input karigor-form-input-three">
                <input name="mail" type="email" id="new-review-email" value="<?php $this->remember('mail'); ?>" placeholder="Email*" required>
            </div>
            <div class="karigor-form-input karigor-form-input-three">
                <input name="url" type="text" id="new-review-url" value="<?php $this->remember('url'); ?>" placeholder="Url">
            </div>
            <?php endif; ?>
            <div class="karigor-form-input">
                <button type="submit" class="button">
                    <span>SEND COMMENT</span>
                </button>
            </div>
            </div>
    	</form>
    </div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>
