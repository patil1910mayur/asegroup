 jQuery( window ).on( 'elementor/frontend/init', function() {
	if (typeof themetechmount_carousel !== "function"){ return; }

	elementorFrontend.hooks.addAction( 'frontend/element_ready/tm_project_element.default', function($scope, $){ themetechmount_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/tm_team_element.default', function($scope, $){ themetechmount_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/tm_service_element.default', function($scope, $){ themetechmount_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/tm_blog_element.default', function($scope, $){ themetechmount_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/tm_testimonial_element.default', function($scope, $){ themetechmount_carousel(); });
	elementorFrontend.hooks.addAction( 'frontend/element_ready/tm_client_element.default', function($scope, $){ themetechmount_carousel(); });
} );  
