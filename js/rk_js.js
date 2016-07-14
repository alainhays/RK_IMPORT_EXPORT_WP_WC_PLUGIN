/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function($) {
        $('.rk_upload_file').click(function(e) {
            e.preventDefault();

            var custom_uploader = wp.media({
                title: 'Csv Upload',
                button: {
                    text: 'Upload'
                },
                multiple: false  // Set this to true to allow multiple files to be selected
            })
            .on('select', function() {
                
                var attachment = custom_uploader.state().get('selection').first().toJSON();
         console.log(attachment);   
                alert("jjjj");
                //$('.header_logo').attr('src', attachment.url);
                $('.header_logo_url').val(attachment.url);
                
                
                
      var selection = custom_uploader.state().get('selection');
      selection.map( function( attachment ) {
        //attachment = attachment.toJSON();
        $.post(ajax_object.ajaxurl, {
           action: 'ajax_action',
           data: attachment
        }, function(data) {
           console.log(data);  
        });
      });
                
                
                
                
                
            })
            .open();
        });
    });
    
    


