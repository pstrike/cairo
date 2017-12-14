"use strict";
jQuery(document).ready(function($){

	if ($('.more-posts-wrapper .ajax-load-more').length) {
    $('.more-posts-wrapper').off().on('click', '.ajax-load-more a', function(e) {
      e.preventDefault();

      var parent = $(this).parents('.more-posts-wrapper').attr('id');
      parent = '#' + parent;
      var link = $(this).attr('href');

      $(parent+'.more-posts-wrapper').append('<div class="more-posts"></div>');
      $(parent).find('.ajax-load-more').replaceWith('<div class="load-content"><div class="load-circle" data-loader="arrow-circle"></div></div>');
      $(parent).find('.more-posts').load(link + ' '+ parent +' .cairo-ajax-content .post-item, '+ parent +' .ajax-load-more', function() {
      $(parent).find('.more-posts .post-item').hide().detach().appendTo(parent+' .cairo-ajax-wrapper').fadeIn(500);
      $(parent).find('.more-posts .ajax-load-more').detach().appendTo(parent+' .cairo-ajax-wrapper');
      $(parent).find('.more-posts').remove();
      $(parent).find('.load-content').remove();

      });
    });
  }

	$('.cairo-ajax-pagination').on('click', '.pagination a', function(e){
		e.preventDefault();
		var link = $(this).attr('href');
		var container = $(this).closest('.cairo-ajax-pagination');

		container.find(".loading-posts").show();

		$('html, body').animate({
			scrollTop: $('.blog-posts').offset().top - 100
		}, 1000);

		$.post(themeajax.ajaxurl, {
			action: 'cairo_posts',
		}, function (response) {
			$('.cairo-ajax-pagination').load(link + ' .cairo-ajax-content');
			container.find(".cairo-ajax-content").html(response.content);
		});
	});

	//Category Block Ajax
	$('.module-title .subcategory li').not( '.more' ).on( 'click', 'a', function( event ) {
	  event.preventDefault();

	  var CategoryModule = $(this).closest('.category-content-module');
	  var AjaxBlockData = CategoryModule.find('.ajax-block-data');

	  CategoryModule.find(".loading-posts").show();

	  var style    = $(this).parents('.category-content-module').attr('data-style');
	  var categorypost 	 = $(this).attr('id');
	  var postcount = AjaxBlockData.attr('data-postcount');
	  var columnsection = AjaxBlockData.attr('data-columnsection');
	  var categorytitle = AjaxBlockData.attr('data-categorytitle');
	  var titlestyle = AjaxBlockData.attr('data-titlestyle');
	  var categoryorderby = AjaxBlockData.attr('data-categoryorderby');
	  var source = AjaxBlockData.attr('data-source');
	  var cat = AjaxBlockData.attr('data-cat');
	  var excludecategory = AjaxBlockData.attr('data-excludecategory');
	  var excludeposts = AjaxBlockData.attr('data-excludeposts');
	  var excludetag = AjaxBlockData.attr('data-excludetag');
	  var author_ids = AjaxBlockData.attr('data-author_ids');
	  var autherimgdisplay = AjaxBlockData.attr('data-autherimgdisplay');
	  var postreview = AjaxBlockData.attr('data-postreview');
	  var subcategorydisplay = AjaxBlockData.attr('data-subcategorydisplay');
	  var desdisplay = AjaxBlockData.attr('data-desdisplay');
	  var metadisplay = AjaxBlockData.attr('data-metadisplay');
	  var postcount = AjaxBlockData.attr('data-postcount');

	  $.ajax({
	    url: themeajax.ajaxurl,
	    type: 'POST',
	    data: {
	      action  : 'ajax_cat_pagination',
	      style: style,
				categorypost : categorypost,
	      postcount: postcount,
	      columnsection: columnsection,
	      categorytitle: categorytitle,
	      titlestyle: titlestyle,
	      categoryorderby: categoryorderby,
	      source: source,
	      cat: cat,
	      excludecategory: excludecategory,
	      excludeposts: excludeposts,
	      excludetag: excludetag,
	      author_ids: author_ids,
	      autherimgdisplay: autherimgdisplay,
	      postreview: postreview,
	      subcategorydisplay: subcategorydisplay,
	      desdisplay: desdisplay,
	      metadisplay: metadisplay
	    },
	    success: function( result ) {
	      $(CategoryModule).find(".module-content-wrapper").html(result);
				$(".scrollbar-inner").niceScroll({cursorcolor:"#1b1d25"});
	    }
	  });

	});

	//Video Playlist Ajax
	$('.post-video-playlist').on( 'click', 'a', function( event ) {
		event.preventDefault();

		var videoModule = $(this).closest('.video_posts_playlist');
		videoModule.find(".loading-posts").show();

		var style    = $(this).parents('.video_posts_playlist').attr('data-style');
		var postid 	 = $(this).attr('id');

		$.ajax({
			url: themeajax.ajaxurl,
			type: 'POST',
			data: {
        action  : 'ajax_video_pagination',
				style: style,
        postid : postid
      },
			success: function( result ) {
				$(videoModule).find(".video-wrapper-playlist").html(result);
				$(".video-wrapper").fitVids();
			}
		});
	});

});
