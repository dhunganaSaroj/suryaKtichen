//functions.php

function display_coupon_code() {
    $retailer_name=$_POST['retailer_name'];
	$coupons = get_posts(array(
		'post_type' => 'shop_coupon',
		'posts_per_page' => 1,
		'meta_key'      =>'retailer_name',
		'meta_value'    =>$retailer_name,
		
	));
	if (!empty($coupons)) {
		$coupon = $coupons[0];
		echo '<div id="random-coupon-code" class="btn btn-primary btn-success unique-discount-code" data-code="' . $coupon->post_title . '">One Time Discount Code : <copy id="copy-contents" data-clipboard-text="'.$coupon->post_title.'">'.$coupon->post_title.'</copy></div>';
		echo '<div id="copyBtn" class="btn btn-primary btn-success unique-discount-code-copy">Copy Code</div>';
		if ( ! empty( $coupon ) ) {
			$coupon_id = $coupon->ID;
			wp_delete_post( $coupon_id, true );
		 }
	}else{
		?>
	   <div class="btn btn-primary btn-danger no-unique-discount-code">
		   <?php echo "All Discount Codes have been used"; ?>
	   </div>
	<?php
	}
	$coupon_id=$coupon->ID;

	exit;
}
add_action('wp_ajax_display_coupon_code', 'display_coupon_code');
add_action('wp_ajax_nopriv_display_coupon_code', 'display_coupon_code');

//deals and offers

jQuery(document).ready(function(){
    jQuery(document).on('click','.reveal-button',function(){
        
        var ajaxurl = '<?php echo admin_url('admin-ajax.php'); ?>';
        var clickedButton = jQuery(this);
        var retailer_name=clickedButton.find('#reveal-button').data('vendor-name');
        clickedButton.find('#reveal-button').css('display','none');
        clickedButton.text("Loading...");
        console.log(retailer_name);
        jQuery.ajax({
            url:ajaxurl,
            type: 'POST',
            data: {
                action: 'display_coupon_code',
                retailer_name : retailer_name,
            },
            success: function(response) {
                clickedButton.text(" ");
                clickedButton.after(response);
            },
            error: function(xhr, status, error) {
                alert('There was an error processing the AJAX request: ' + error);
            }
        });
        
    });
    
    // JavaScript
    // Initialize Clipboard.js
    var clipboard = new ClipboardJS("#copyBtn", {
      text: function() {
        return document.querySelector("#copy-contents").textContent;
      }
    });
    
    // Handle success/failure
    clipboard.on("success", function () {
      console.log("Text copied to clipboard");
      jQuery(document).find("#copyBtn").text("Copied");
    });
    
    clipboard.on("error", function () {
      console.log("Error copying text to clipboard");
    });
});



</script>
<?php get_footer();
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>


//