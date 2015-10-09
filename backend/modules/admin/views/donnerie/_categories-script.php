<?php

use yii\helpers\Url;
?>
<script type="text/javascript">
<?php $this->beginBlock('JS_END') ?>
yii.process = (function ($) {
    var _onSearch = false;
    var pub = {
        categorySearch: function () {
            if (!_onSearch) {
                _onSearch = true;
                var $th = $(this);
                setTimeout(function () {
                    _onSearch = false;
                    var data = {
                        id:<?= json_encode($id) ?>,
                        target:$th.data('target'),
                        term: $th.val(),
                    };
                    var target = '#' + $th.data('target');
                    $.get('<?= Url::toRoute(['category-search']) ?>', data,
                        function (html) {
                            $(target).html(html);
                        });
                }, 500);
            }
        },
        action: function () {
            var action = $(this).data('action');
            var params = $((action == 'register' ? '#availables' : '#registereds') + ', .category-search').serialize();
            var urlRegister   = '<?= Url::toRoute(['cat-add', 'donnerie_id' => $id]) ?>';
            var urlDeregister = '<?= Url::toRoute(['cat-del', 'donnerie_id' => $id]) ?>';
            $.post(action == 'register' ? urlRegister : urlDeregister,
                   params,
	   function (r) {
                     $('#availables').html(r[0]);
                     $('#registereds').html(r[1]);
                   });
            return false;
        }
    }

    return pub;
})(window.jQuery);
<?php $this->endBlock(); ?>

<?php $this->beginBlock('JS_READY') ?>
$('.category-search').keydown(yii.process.categorySearch);
$('a[data-action]').click(yii.process.action);
<?php $this->endBlock(); ?>
</script>
<?php
yii\web\YiiAsset::register($this);
$this->registerJs($this->blocks['JS_END'], yii\web\View::POS_END);
$this->registerJs($this->blocks['JS_READY'], yii\web\View::POS_READY);
