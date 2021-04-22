// Instagram Feed
$(window).on('load', function(){

    $('.instagram-feed').each(function(){
        var $this = $( this ),
            type  = $this.data('type'),
            username = 'oklerportogym';

		var $wrapper = $this,
	        html = $wrapper.html();

	    // Instagram Feed Basic
	    $this.instagramFeed({
	        'username': username,
	        'get_data': true,
	        'callback': function(data, $this){
	            var $wrapper = $( $this ),
	                html     = $wrapper.html(),
	                images   = data.edge_owner_to_timeline_media.edges,
	                output   = '',
	                image_url = '',
	                caption = '',
	                link = '',
	                items_number = $wrapper.data('items-number');

	            // Limit items number
	            if( items_number > 12 ) {
	                items_number = 12;
	            }

	            // Set a minimum for items number
	            if( items_number < 1 ) {
	                items_number = 1;
	            }

	            // Loop trough each instagram image result
	            for( var i=0; i < items_number; i++ ) {
	                
	                if( typeof images[i] == 'undefined' ) {
	                    break;
	                }

	                // Image URL
	                if( typeof images[i].node.display_url != 'undefined' ) {
	                    image_url = images[i].node.display_url;
	                }

	                // Image Caption
	                if( typeof images[i].node.edge_media_to_caption.edges[0] != 'undefined' ) {
	                    caption = images[i].node.edge_media_to_caption.edges[0].node.text;
	                }

	                // Post Link
	                if( typeof images[i].node.shortcode != 'undefined' ) {
	                    link = images[i].node.shortcode;
	                }

	                output += '<div style="background: url('+ image_url +'); background-size: cover;"><a target="_blank" href="https://www.instagram.com/p/'+ link +'/"></a></div>';
	            }

	            // Build Html
	            $wrapper.append(output);

	            $wrapper.addClass('owl-carousel').owlCarousel({
	                items: 2,
					nav: false,
					dots: false,
					loop: true,
					navText: [],
					autoplay: true,
					autoplayTimeout: 6000,
					rtl: ( $('html').attr('dir') == 'rtl' ) ? true : false
	            });
	        }
	    });
	});

});