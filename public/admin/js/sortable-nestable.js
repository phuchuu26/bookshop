$(function () {
    $('.dd').nestable();

    $('.dd').on('change', function () {
        var $this = $(this);
        var serializedData = window.JSON.stringify($($this).nestable('serialize'));

        $this.parents('http://puffintheme.com/demo/oculux/html/assets/js/pages/ui/div.body').find('textarea').val(serializedData);
    });

    $('.dd4').nestable();

    $('.dd4').on('change', function () {
        var $this = $(this);
        var serializedData = window.JSON.stringify($($this).nestable('serialize'));
    });
});