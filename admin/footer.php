<div class="typecho-foot" role="contentinfo">
    <div class="copyright">
        <a href="http://typecho.org" class="i-logo-s">Typecho</a>
        <p>由 <a target="_blank" href="http://typecho.org">Typecho</a> 强力驱动, 主题来自 <a target="_blank" href="https://saikou.net">SaiKou</a>.</p>
    </div>
</div>
<script src="<?php $this->options->siteUrl(); ?>admin/js/jquery.js?v=17.10.30"></script>
<script>
$(document).ready(function() {

    // 聚焦
    $('#title').select();

    // 缩略名自适应宽度
    var slug = $('#slug');

    if (slug.length > 0) {
        var wrap = $('<div />').css({
            'position'  :   'relative',
            'display'   :   'inline-block'
        }),
        justifySlug = $('<pre />').css({
            'display'   :   'block',
            'visibility':   'hidden',
            'height'    :   slug.height(),
            'padding'   :   '0 2px',
            'margin'    :   0
        }).insertAfter(slug.wrap(wrap).css({
            'left'      :   0,
            'top'       :   0,
            'minWidth'  :   '5px',
            'position'  :   'absolute',
            'width'     :   '100%'
        })), originalWidth = slug.width();

        function justifySlugWidth() {
            var val = slug.val();
            justifySlug.text(val.length > 0 ? val : '     ');
        }

        slug.bind('input propertychange', justifySlugWidth);
        justifySlugWidth();
    }

});
function grin(tag) {
	var myField;
	tag = ' ' + tag + ' ';
	if (document.getElementById('new-review-textbox') && document.getElementById('new-review-textbox').type == 'textarea') {
		myField = document.getElementById('new-review-textbox');
	} else {
		return false;
	}
	if (document.selection) {
		myField.focus();
		sel = document.selection.createRange();
		sel.text = tag;
		myField.focus();
	}  else {
		myField.value += tag;
		myField.focus();
	}
}
</script>
    </body>
</html>