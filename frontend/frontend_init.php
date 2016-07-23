<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/*add_filter( 'woocommerce_get_cart_item_from_session', function ( $cartItemData, $cartItemSessionData, $cartItemKey ) {
    if ( isset( $cartItemSessionData['myCustomData'] ) ) {
        $cartItemData['myCustomData'] = $cartItemSessionData['myCustomData'];
    }
print_r($cartItemSessionData);
    return $cartItemData;
}, 10, 3 );*/


function pippin_filter_content_sample($content) {
    
    ?>


    <div class="page-header">
  <h1>Share Dialog</h1>
</div>

<p>Click the button below to trigger a Share Dialog</p>

<div id="shareBtn" class="btn btn-success clearfix">Share</div>

<p style="margin-top: 50px">
  <hr />
  <a class="btn btn-small"  href="https://developers.facebook.com/docs/sharing/reference/share-dialog">Share Dialog Documentation</a>
</p>



         <div id="fb-root"></div>
<script>
    window.fbAsyncInit = function() {
        FB.init({
            appId      : '1428712257377698',
            xfbml      : true,
            status     : true,
            version    : 'v2.5'
        });
    };

    (function(d, s, id){
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>

<script>
jQuery(window).load(function() {
    var comment_callback = function(response) {
        console.log("comment_callback");
        console.log(response);
    }
    FB.Event.subscribe('comment.create', comment_callback);
    FB.Event.subscribe('comment.remove', comment_callback);
    
    
    
    
   document.getElementById('shareBtn').onclick = function() {
  FB.ui({
    method: 'share',
    display: 'popup',
    href: 'https://developers.facebook.com/docs/',
  }, function(response){});
} 
    
});
</script> 




  
        
        
        
        <?php
    
    
	$new_content = '<p><button>Ravi katreeeThis is added to the bottom of all post and page content</p>';
	$content = $content . $new_content;
	return $content;
}
add_filter('the_content', 'pippin_filter_content_sample');