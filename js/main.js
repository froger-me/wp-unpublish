/* global WP_Unpublish */
jQuery(function($) {

    if (WP_Unpublish.screen === 'single') {

    	if ($('select#post_status option[value="unpublish"]').length === 0) {
    		var selected = (WP_Unpublish.postStatus === 'unpublish') ? 'selected' : '',
                option   = '<option value="unpublish"' + selected + '>' + WP_Unpublish.unpublish + '</option>';

        	$('select#post_status option:last').after(option);
    	}

    	if (WP_Unpublish.postStatus === 'unpublish') {
    		$('#post-status-display').html(WP_Unpublish.unpublish);
            $('#save-post').attr('value', WP_Unpublish.saveUnpublished);
    	}

        $('.save-post-status').on('click', function() {
            if ($('select#post_status').val() === 'unpublish') {
                $('#save-post').attr('value', WP_Unpublish.saveUnpublished);
            }
        });
    }

    if (WP_Unpublish.screen === 'list') {
	    $('.wp-list-table').on('click', 'tr:not(.status-unpublish) .editinline', function(e) {
            var option = '<option value="unpublish">' + WP_Unpublish.unpublish + '</option>';

	        $(e.delegateTarget).find('.inline-edit-row .inline-edit-status select').append(option);
	    });
        
	    $('.wp-list-table').on('click', 'tr.status-unpublish .editinline', function(e) {
            var option = '<option value="unpublish" selected>' + WP_Unpublish.unpublish + '</option>';

	        $(e.delegateTarget).find('.inline-edit-row .inline-edit-status select').append(option);
	    });

	    $('#doaction').on('click', function() {
            var condition = $('#bulk-action-selector-top').val() === 'edit';

            condition = condition && $('#bulk-edit .inline-edit-status select option[value="unpublish"]').length === 0;

	    	if (condition) {
                var option = '<option value="unpublish">' + WP_Unpublish.unpublish + '</option>';

	    		$('#bulk-edit .inline-edit-status select').append(option);
	    	}
	    });
    }

});