+(function($) {   
	$('.color-picker').wpColorPicker();


    if ($('.upload_image_button').length > 0) {
        // VAR
        var file_frame;
        var box_button_id;

        //ADD IMAGE
        $('.upload_image_button').bind('click', function(event) {
            box_button_id = $(this).attr('id').replace('_button', '');
            event.preventDefault();

            // Create Media Frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: $(this).data('uploader_title'),
                button: {
                    text: $(this).data('uploader_button_text'),
                },
                multiple: false // set true for multiple select
            });

            // Selected image callback.
            file_frame.on('select', function() {
                // single image selected
                attachment = file_frame.state().get('selection').first().toJSON();

                // Actions
                $('#' + box_button_id).val(0);
                $('#' + box_button_id).val(attachment.id);
                $('#box-media-' + box_button_id + ' .image_uploaded img').attr('src', attachment.url).attr('data-attachment-id', attachment.id).attr('width', '150px');
                $('#box-media-' + box_button_id + ' .no_image_uploaded').hide();
                $('#box-media-' + box_button_id + ' .image_uploaded').show();
            });

            // Open Modal
            file_frame.open();
        });

        //EDIT IMAGE
        $('.wclp-button-edit').bind('click', function(event) {
            event.preventDefault();
            box_button_id = $(this).closest('.wclp_uploader').attr('id');

            // Create Media Frame.
            file_frame = wp.media.frames.file_frame = wp.media({
                title: $(this).data('uploader_title'),
                button: {
                    text: $(this).data('uploader_button_text'),
                },
                multiple: false // set true for multiple select
            });

            // Selected image callback.
            file_frame.on('select', function() {
                // single image selected
                attachment = file_frame.state().get('selection').first().toJSON();

                // Actions
                if (attachment) {
                    $('#' + box_button_id.replace('box-media-','')).val(attachment.id);
                    $('#' + box_button_id + ' .image_uploaded img').attr('src', attachment.url).attr('data-attachment-id', attachment.id).attr('width', '150px');
                    $('#' + box_button_id + ' .no_image_uploaded').hide();
                    $('#' + box_button_id + ' .image_uploaded').show();
                }
            });

            // Open Modal
            file_frame.open();
        });

        //REMOVE IMAGE
        $('.wclp-button-delete').bind('click', function(event) {
            event.preventDefault();
            box_button_id = $(this).closest('.wclp_uploader').attr('id');

            $('#' + box_button_id.replace('box-media-','')).val(0);
            $('#' + box_button_id + ' .image_uploaded img').attr('src', '').attr('data-attachment-id', '');
            $('#' + box_button_id + ' .no_image_uploaded').show();
            $('#' + box_button_id + ' .image_uploaded').hide();
        });
    };
})(jQuery); 

