"use strict";

jQuery(document).ready( function(){
 function media_upload( button_class, me_signature) {
    var _custom_media = true,
    _orig_send_attachment = wp.media.editor.send.attachment;
    jQuery('body').on('click',button_class, function(e) {
        var button_id ='#'+jQuery(this).attr('id');
        /* console.log(button_id); */
        var self = jQuery(button_id);
        var send_attachment_bkp = wp.media.editor.send.attachment;
        var button = jQuery(button_id);
        var id = button.attr('id').replace('_button', '');
        _custom_media = true;
        wp.media.editor.send.attachment = function(props, attachment){
            if ( _custom_media  ) {
               jQuery('.custom_media_id').val(attachment.id);
               jQuery(me_signature).val(attachment.url);
               jQuery('.custom_media_image').attr('src',attachment.url).css('display','block');
            } else {
                return _orig_send_attachment.apply( button_id, [props, attachment] );
            }
        }
        wp.media.editor.open(button);
        return false;
    });
}
media_upload( '.custom_media_upload','.custom_media_url');
media_upload( '.custom_media_upload_sign','.custom_media_url_sign');
media_upload( '.custom_media_upload_ads','.custom_media_url_ads');
media_upload( '.custom_title_bg','.custom_title_bg_url');
});


jQuery(document).ready(function($) {

  var _el = {
          body: $('body')
      },
      wp_media;

//Add About Images
_el.body.on('click', '.codepages-btn-remove-media', function(e) {
    e.preventDefault();
    var t = $(this),
        c = 'codepages-hide';
    t.siblings('input.codepages-media').val('');
    t.siblings('.codepages-media-holder').html('');
    t.addClass(c).siblings('.codepages-btn-add-media').removeClass(c);
});

_el.body.on('click', '.codepages-btn-add-media', function(e) {
    e.preventDefault();
    var t = $(this),
        c = 'codepages-hide',
        el_media = t.siblings('input.codepages-media'),
        el_media_holder = t.siblings('.codepages-media-holder');

    if ( wp_media ) {
        wp_media.open();
        return;
    }

    wp_media = wp.media({
        multiple: false  // Set to true to allow multiple files to be selected
    });

    // When an image is selected in the media frame...
    wp_media.on( 'select', function() {
        // Get media attachment details from the frame state
        var attachment = wp_media.state().get('selection').first().toJSON(),
            media_result = attachment.url;

        if(t.data('return') == 'id') {
            media_result = attachment.id;
        }
        el_media.val(media_result);
        el_media_holder.html($('<img>').attr({'src': attachment.url}));
        t.addClass(c).siblings('.codepages-btn-remove-media').removeClass(c);
    });
    // Finally, open the modal on click
    wp_media.open();
});

//Add Social Icon
_el.body.on('click', '.codepages-btn-add-social-icon', function(e) {
    e.preventDefault();
    var i = $(this).parents('.widget').attr('id').split('-').pop(),
        p = $(this).parents('p'),
        c = 'codepages-social-icon-row-instance',
        el = p.siblings('.'+c).clone(),
        sel_name = el.find('select').attr('name'),
        inp_name = el.find('input').attr('name');
    el.removeClass(c);
    p.before(el.show());
    el.find('select').attr('name',sel_name.replace('__i__',i));
    el.find('input').attr('name',inp_name.replace('__i__',i));
});
_el.body.on('click', '.codepages-social-icon-row-rm', function(e) {
    e.preventDefault();
    $(this).parents('.codepages-social-icon-row').remove();
});

});
