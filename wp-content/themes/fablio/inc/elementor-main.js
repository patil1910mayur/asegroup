jQuery( window ).load(function() {
	elementor.hooks.addAction( 'panel/open_editor/section', function( panel, model, view ) {

		jQuery('input[data-setting="tm-extended-column"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"], input[data-setting="tm-strech-content-left"]').on('change', function(){
			setTimeout(function(){
				jQuery('#elementor-preview-iframe')[0].contentWindow.tm_rearrange_stretched_col( model.id );
			}, 200);
		});

	});

	elementor.hooks.addAction( 'panel/open_editor/column', function( panel, model, view ) {
		setTimeout(function(){
			jQuery('.elementor-component-tab > a').on('click',function(){
				setTimeout(function(){
					jQuery('input[data-setting="tm-extended-column"], select[data-setting="background_position"], select[data-setting="background_attachment"], select[data-setting="background_repeat"], select[data-setting="background_size"], input[type=radio]').on('change', function(){
						setTimeout(function(){
							jQuery('#elementor-preview-iframe')[0].contentWindow.tm_rearrange_stretched_col( model.id );
						}, 200);
					});
					jQuery('label[for="elementor-control-classic"]').on('click', function(){
						jQuery('#elementor-preview-iframe')[0].contentWindow.tm_rearrange_stretched_col( model.id );
					});
				}, 500);
			})
		 }, 500);
	});

});