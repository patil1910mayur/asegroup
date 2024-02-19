function themetechmount_imgselector_click(){
	
	jQuery('a.tm_gallery_widget_add_images').each(function(){
		var $this   = jQuery(this),
			$parent	= jQuery(this).closest('.tm_image_selector_w'),
			wp_media_frame;
		
		jQuery($this).on( 'click', function(e){
			e.preventDefault();
			
			if ( typeof wp === 'undefined' || ! wp.media || ! wp.media.gallery ) {
			  return;
			}

			if ( wp_media_frame ) {
			  wp_media_frame.open();
			  return;
			}
			
			wp_media_frame = wp.media({
			  library: {
				type: 'image'
			  }
			});

			wp_media_frame.on( 'select', function() {
				
				var $img_w     = jQuery('div.gallery_widget_attached_images', $parent);
				var $img       = jQuery('div.gallery_widget_attached_images ul li img', $parent);
				var $input     = jQuery('.tm_gallery_widget_attached_image_val', $parent);
				
				var attachment = wp_media_frame.state().get('selection').first().attributes;
				var thumbnail  = ( typeof attachment.sizes.thumbnail !== 'undefined' ) ? attachment.sizes.thumbnail.url : attachment.url;
				var fullimg    = ( typeof attachment.sizes.full !== 'undefined' ) ? attachment.sizes.full.url : attachment.url;
				var img_id     = ( typeof attachment.id !== 'undefined' ) ? attachment.id : '' ;
				
				jQuery($img_w).show();
				
				$img.removeClass('hidden');
				$img.attr('src', thumbnail);
				$newval = fullimg + '|' + thumbnail + '|' + img_id ;
				$input.val( $newval );
				
			});
			wp_media_frame.open();
			
		});
		
		jQuery( '.tm_vc_icon-remove', $parent ).on( 'click', function(e){
			var $input     = jQuery('.tm_gallery_widget_attached_image_val', $parent);
			e.preventDefault();
			jQuery('.gallery_widget_attached_images', $parent).hide();
			jQuery($input).val('');
		});
			
	});
		
};
themetechmount_imgselector_click();