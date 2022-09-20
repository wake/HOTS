(function($){
  'use strict';

  $(document).ready(function(){

    var image_frame;

    $('.mcc-box__field-container').on('click', '.js-mcc-box-image-upload-button', function(e){
      e.preventDefault();

      image_frame = wp.media.frames.image_frame = wp.media({library: {type: 'image'}});
      image_frame.open();

      var id = $(this).data('hidden-input').replace(/(\[|\])/g, '\\$1');
      console.log(id);

      image_frame.on('select', function() {
        var attachment = image_frame.state().get('selection').first().toJSON();
        console.log(id);
        $('#image-'+id).val(attachment.url);

        $('#js-'+id+'-image-preview').removeClass('is-hidden').attr('src', attachment.url);

        $('.js-mcc-box-image-upload-button').text('Change Image');

        $('#'+id).css({background: 'red'});
      });

      image_frame.open();

    });

    var pdf_frame;

    $('.mcc-box__field-container').on('click', '.js-mcc-box-pdf-upload-button', function(e){
      e.preventDefault();

      pdf_frame = wp.media.frames.image_frame = wp.media({library: {type: 'application/pdf'}});
      pdf_frame.open();

      var id = $(this).data('hidden-input').replace(/(\[|\])/g, '\\$1');
      console.log(id);

      pdf_frame.on('select', function() {
        var attachment = pdf_frame.state().get('selection').first().toJSON();
        console.log(id);

        var basename = attachment.url.split(/[\\/]/).pop();

        $('#pdf-'+id).val(attachment.url);
        $('#js-'+id+'-pdf-info').css('opacity', 1);

        $('#js-'+id+'-pdf-info')
          .removeClass('is-hidden').find ('a').attr ('href', attachment.url)
          .find ('.pdf-name').text (basename.length > 20 ? basename.substr (0, 20) + '...' : basename);

        $('.js-mcc-box-pdf-upload-button').text('重新上傳');
        $('.js-mcc-box-pdf-upload-button').next ().removeClass ('is-hidden');

        $('#'+id).css({background: 'red'});
      });

      pdf_frame.open();

    });

    $('.mcc-box__field-container').on('click', '.mcc-box-repeated-header', function(){
      $(this).siblings('.mcc-box__repeated-content').toggleClass('is-hidden');
    });

    $('.mcc-box__repeated-blocks').on('click', '.mcc-box__remove', function() {
      $(this).closest('.mcc-box__repeated').remove();
      return false;
    });

    $('.mcc-box__repeated-blocks').sortable({
      opacity: 0.6,
      revert: true,
      cursor: 'move',
      handle: '.js-mcc-box-sort'
    });

  });

})(jQuery);
