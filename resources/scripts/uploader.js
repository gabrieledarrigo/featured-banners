jQuery(document).ready(function($) {
    $(document).on('click', '[data-featured-banners-upload]', function(e) {

        var $el = $(e.target);
        var $target = $($el.data('target'));
        var $placeholder = $el.parent().find('.image-placeholder .image-picture');

        var mediaUploader = wp.media({
            frame:    "post",
            state:    "insert",
            multiple: false
        });

        mediaUploader.on('insert', function() {
            var json = mediaUploader.state().get('selection').first().toJSON();
            $target.val(json.url);
            $placeholder.attr('src', json.sizes.thumbnail.url);
        });

        mediaUploader.open();
    });
});
