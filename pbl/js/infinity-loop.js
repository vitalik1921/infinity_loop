jQuery(document).ready(function ($) {
    var $loop_container_selector = il_settings.loop_container_selector;
    var $loop_item_selector = il_settings.loop_item_selector;
    var $il_load_more_id = '#'+il_settings.load_more_id;

    var $loop_container = $($loop_container_selector);

    $('body').on('click', $il_load_more_id, function(e) {
        e.preventDefault();

        var $href = $(this).find('a').attr('href');
        $loop_container.addClass('il-loading');

        $.ajax({
            type: 'POST',
            url: $href,
            success: function (data) {

                $loop_container.removeClass('il-loading');

                $newItems = $(data).find($loop_container_selector + '>' + $loop_item_selector);
                $loop_container.append($newItems);

                if (typeof ($(data).find($il_load_more_id).find('a').attr('href')) != 'undefined') {
                    $($il_load_more_id).find('a').attr('href', $(data).find($il_load_more_id).find('a').attr('href'));
                } else {
                    $($il_load_more_id).remove();
                }

                $(document).trigger("if-ajax-ready", [$newItems]);
            },
            error: function (xhr, type, exception) {
                alert("Infinity loop filter ajax error response type " + type);
            }
        });
    })
});