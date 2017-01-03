/*! TracPress - dev - Copyright 2014 */
(function($){
    jQuery.fn.jConfirmAction = function(options){
        var theOptions = jQuery.extend({
            question: 'Are you sure you want to delete this ticket? This action is irreversible!',
            yesAnswer: 'Yes',
            cancelAnswer: 'No'
        }, options);

        return this.each(function(){
            $(this).bind('click', function(e){
                e.preventDefault();
                thisHref = $(this).attr('href');
                if($(this).next('.question').length <= 0)
                    $(this).after('<div class="question"><i class="fa fa-exclamation-triangle"></i> ' + theOptions.question + '<br><span class="yes">' + theOptions.yesAnswer + '</span><span class="cancel">' + theOptions.cancelAnswer + '</span></div>');

                $(this).next('.question').animate({opacity: 1}, 300);
                $('.yes').bind('click', function(){
                    window.location = thisHref;
                });

                $('.cancel').bind('click', function(){
                    $(this).parents('.question').fadeOut(300, function() {
                        $(this).remove();
                    });
                });
            });
        });
    }
})(jQuery);

jQuery(document).ready(function() {
	jQuery(".post-like a").click(function(){
		heart = jQuery(this);
		post_id = heart.data("post_id");
		jQuery.ajax({
			type: "post",
			url: ajax_var.ajaxurl,
			data: "action=post-like&nonce="+ajax_var.nonce+"&post_like=&post_id="+post_id,
			success: function(count){
				if(count != "already") {
					jQuery('.post-like a').removeClass('hasnotvoted');
					jQuery('.post-like a').addClass('hasvoted');
					jQuery('.post-like a').text(count);
				}
			}
		});
		return false;
	});

    jQuery('.tp-editor-display').click(function(e){
        jQuery('.tp-editor').slideToggle('fast');
        e.preventDefault();
    });

    jQuery('.ask').jConfirmAction();

    // tp_editor() related actions
    jQuery('.delete-post').click(function(e){
        if(confirm('Delete this ticket?')) {
            jQuery(this).parent().parent().fadeOut();

            var id = jQuery(this).data('id');
            var nonce = jQuery(this).data('nonce');
            var post = jQuery(this).parents('.post:first');
            jQuery.ajax({
                type: 'post',
                url: ajax_var.ajaxurl,
                data: {
                    action: 'my_delete_post',
                    nonce: nonce,
                    id: id
                },
                success: function(result) {
                    if(result == 'success') {
                        post.fadeOut(function(){
                            post.remove();
                        });
                    }
                }
            });
        }
        e.preventDefault();
        return false;
    });
})
