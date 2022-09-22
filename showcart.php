
  <!---->
  <script src ="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$('#btn').click(function(){
		alert("continue payment")
		window.location.href='paytm-payment';
	})
})
</script>
   <!--banner-->
<div class="banner-top">
	<div class="container">
		<h3 >Cart</h3>
		<h4><a href="index.html">Home</a><label>/</label>Wishlist</h4>
		<div class="clearfix"> </div>
	</div>
</div>

	<!-- contact -->
		<div class="check-out">	 
		<div class="container">	 
	 <div class="spec ">
				<h3>Wishlist</h3>
					<div class="ser-t">
						<b></b>
						<span><i></i></span>
						<b class="line"></b>
					</div>
			</div>
				<script>$(document).ready(function(c) {
					$('.close1').on('click', function(c){
						$('.cross').fadeOut('slow', function(c){
							$('.cross').remove();
						});
						});	  
					});
			   </script>
			<script>$(document).ready(function(c) {
					$('.close2').on('click', function(c){
						$('.cross1').fadeOut('slow', function(c){
							$('.cross1').remove();
						});
						});	  
					});
			   </script>	
			   <script>$(document).ready(function(c) {
					$('.close3').on('click', function(c){
						$('.cross2').fadeOut('slow', function(c){
							$('.cross2').remove();
						});
						});	  
					});
			   </script>	
		<?php 
		$all_total=0;
         foreach($cdata as $w)
            { 
    	?>
         <table class="table ">
					  
		  <tr>
			<th class="t-head head-it ">Products</th>
			<th class="t-head">Price</th>
		<th class="t-head">Quantity</th>

			<th class="t-head">Total</th>
		  </tr>
		 
  <tr class="cross">
			<td class="ring-in t-data">
				<a href="single.html" class="at-in">
					<img src="images/wi.png" class="img-responsive" alt="">
				</a>
			 
			<div class="sed">
				<h5><?php echo $w->name;?></h5>
			</div>
				<div class="clearfix"> </div>
				 <div class="close1"> <i class="fa fa-times" aria-hidden="true"></i></div> 
			 </td>
			<td class="t-data"><?php echo $w->price;?></td>
			<td class="t-data"><?php echo $w->qty;?></td>
			
			
			
        
			<td class="t-data t-w3l">
				<?php 
				$total =  $w->price*$w->qty;
				echo $total;
				$all_total+=$total;
				// echo $all_total;
				?>
			 </td>
			 <td><button class="btn"> <a href="delete?did=<?php echo $w->cat_id;?>">Delete</a></button> </td>
		
			
  </tr>
		  
		
		 
	</table>
	<?php
        	}
       ?>

	<!--total-->
<table class="table ">
	
 <tr>
		 <th class="t-head head-it ">Grand Total</th>
		 <td class="t-data"><?php echo $all_total;?> </td>
</tr>
 <tr>
	    <td class="t-data t-w3l">
        <button class="btn" ><a class=" add-1" id="btn">Order Now</a></button> </td>
			
</tr>
</table>
		 </div>
		 </div>
	<!--total end -->				
	<!--quantity-->
			<script>
			$('.value-plus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
				divUpd.text(newVal);
			});

			$('.value-minus').on('click', function(){
				var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
				if(newVal>=1) divUpd.text(newVal);
			});
			</script>
			<!--quantity-->
			

<!--footer-->

<!-- //footer-->
<!-- smooth scrolling -->
	<script type="text/javascript">
		$(document).ready(function() {
		/*
			var defaults = {
			containerID: 'toTop', // fading element id
			containerHoverID: 'toTopHover', // fading element hover id
			scrollSpeed: 1200,
			easingType: 'linear' 
			};
		*/								
		$().UItoTop({ easingType: 'easeOutQuart' });
		});
	</script>
	<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- //smooth scrolling -->
<!-- for bootstrap working -->
		<script src="js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<script type='text/javascript' src="js/jquery.mycart.js"></script>
  <script type="text/javascript">
  $(function () {

    var goToCartIcon = function($addTocartBtn){
      var $cartIcon = $(".my-cart-icon");
      var $image = $('<img width="30px" height="30px" src="' + $addTocartBtn.data("image") + '"/>').css({"position": "fixed", "z-index": "999"});
      $addTocartBtn.prepend($image);
      var position = $cartIcon.position();
      $image.animate({
        top: position.top,
        left: position.left
      }, 500 , "linear", function() {
        $image.remove();
      });
    }

    $('.my-cart-btn').myCart({
      classCartIcon: 'my-cart-icon',
      classCartBadge: 'my-cart-badge',
      affixCartIcon: true,
      checkoutCart: function(products) {
        $.each(products, function(){
          console.log(this);
        });
      },
      clickOnAddToCart: function($addTocart){
        goToCartIcon($addTocart);
      },
      getDiscountPrice: function(products) {
        var total = 0;
        $.each(products, function(){
          total += this.quantity * this.price;
        });
        return total * 1;
      }
    });

  });
  </script>

</body>
</html>