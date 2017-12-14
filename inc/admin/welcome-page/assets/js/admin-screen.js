/*
 * Admin Screen
 *
 */

( function( $ ) {
	"use strict";

	$(document).on( 'click', '.button-uninstall-demo', function(e) {

		var current	= this;

		$.confirm({
			theme: 'supervan',
			title: false,
			content: admin_var.unins_confirm,
			confirmButtonClass: 'btn-success',
			cancelButtonClass: 'btn-danger',
			confirmButton: admin_var.yes,
   			cancelButton: admin_var.no,
			confirm: function(){

				var choosed_demo = $(this).data('demo-id');
				var loading_wrap = $(current).parents('.demo-inner').find('.codepages-demo-import-loader');
				var progress = $(current).parents('.codepagesthemes-demo-item').find('.installation-progress .progress');
				var progress_text = $(current).parents('.codepagesthemes-demo-item').find('.installation-progress p');
				progress.css('width', '0%');
				progress_text.text(admin_var.uninstalling);
				loading_wrap.show();

				//Delete Attachments
				$.ajax({
					type: 'POST',
					url: ajaxurl,
					data: {
						action: 'codepages_uninstall',
					},
					success: function(response){
						if( response && response.indexOf('success') == -1 ) {
							loading_wrap.hide();
							alert(response);
						}else{
							$('.codepagesthemes-demo-item').removeClass('demo-actived demo-inactive').addClass('demo-active');
							loading_wrap.hide();
							progress_text.text(admin_var.uninstalled);
						}
					},
					error: function(response, errorThrown){
						loading_wrap.hide();
						alert(admin_var.unins_pbm);
					}
				});
			}
		});

		return false;
	});

	var codepages_admin_screen = {

		install_demos: function() {
			$(document).on( 'click', '.button-install-demo', function(e) {

				e.preventDefault();
				var current			= this;
				var progress = $(current).parents('.codepagesthemes-demo-item').find('.installation-progress .progress');
				var progress_text = $(current).parents('.codepagesthemes-demo-item').find('.installation-progress p');
				var choosed_demo 	= $(this).data('demo-id');
				var loading_wrap 	= $('.codepages-preview-' + choosed_demo);
				var requirement 	= $(this).parents('.demo-inner').find('.theme-requirements').data('requirements');
				progress.css('width', '0%');
				if( choosed_demo !== null ) {

					$.confirm({
						theme: 'supervan',
						title: false,
						content: requirement,
						confirmButtonClass: 'btn-success',
    					cancelButtonClass: 'btn-danger',
						confirmButton: admin_var.proceed,
   						cancelButton: admin_var.cancel,
						confirm: function(){
							loading_wrap.show();
							$(current).parents('.codepagesthemes-demo-item').find('.installation-progress p').text(admin_var.downloading);
							$('.codepages-importer-notice').hide();

							/*Demo Files Download*/
							$.ajax({
								type: 'POST',
								url: ajaxurl,
								data: {
									action: 'codepages_download',
									demo_type: choosed_demo,
								},
								success: function(response){

									if( response && response.indexOf('success') == -1 ) {
										alert(response);
									}else{
										progress.animate({'width' : "20%"});
										progress_text.text(admin_var.import_xml);

										/*Theme Xml Import*/
										$.ajax({
											type: 'POST',
											url: ajaxurl,
											data: {
												action: 'codepages_theme_xml',
											},
											success: function(response){
												if( response && response.indexOf('success') == -1 ) {
													alert(response);
												}else{
													progress.animate({'width' : "60%"});
													progress_text.text(admin_var.import_theme_opt);

													/*Theme Option Import*/
													$.ajax({
														type: 'POST',
														url: ajaxurl,
														data: {
															action: 'codepages_theme_option',
														},
														success: function(response){
															if( response && response.indexOf('success') == -1 ) {
																alert(response);
															}else{
																progress.animate({'width' : "80%"});
																progress_text.text(admin_var.import_widg);

																$.ajax({
																	type: 'POST',
																	url: ajaxurl,
																	data: {
																		action: 'codepages_widgets',
																	},
																	success: function(response){
																		if( response && response.indexOf('success') == -1 ) {
																			alert(response);
																		}else{
																			$('.codepagesthemes-demo-item').removeClass('demo-actived demo-inactive demo-active');
																			$(current).parents('.codepagesthemes-demo-item').addClass('demo-actived');
																			$('.codepagesthemes-demo-item:not(.demo-actived)').addClass('demo-inactive');
																			progress.find('.progress-bar').removeClass('active');
																			progress.animate({'width' : "100%"});
																			progress.animate({'opacity' : "0"});
																			$('.regenerate-thumb').attr('style','display: block !important');
																			progress_text.text(admin_var.imported);

																		}
																		loading_wrap.hide();
																	},
																	error: function(response, errorThrown){
																		alert(admin_var.import_pbm);
																	}
																});

															}
															//loading_wrap.hide();
														},
														error: function(response, errorThrown){
															alert(admin_var.import_pbm);
														}
													});

												}
												//loading_wrap.hide();
											},
											error: function(response, errorThrown){
												alert(admin_var.import_pbm);
											}
										});
									}
								},
								error: function(response, errorThrown){
									alert(admin_var.access_pbm);
								}
							});
						},
						cancel: function(){}
					});

				}

			});
		},

	};

	$(document).ready(function(){

		codepages_admin_screen.install_demos();

	});

})( jQuery );
