<script>
	function ajaxdata(e)
	{
		$.ajax({
			type:'post',
			url:'state',
			data:{sid:$('#country').val()},
			success:function(response)
			{
				alert(response)
				$('#state').html(response);
			}
		})
	}
	</script>
<div class="banner-top">
	<div class="container">
		<h3 >Register</h3>
		<h4><a href="index.html">Home</a><label>/</label>Register</h4>
		<div class="clearfix"> </div>
	</div>
</div>
<!--login-->

	<div class="login">
		<div class="main-agileits">
				<div class="form-w3agile form1">
					<h3>Register</h3>
					<form action="#" method="post">
						<div class="key">
							<i class="fa fa-user" aria-hidden="true"></i>
							<input  type="text" value="Username" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Username';}" required="">
							<div class="clearfix"></div>
						</div>
						<div class="key">
							<i class="fa fa-envelope" aria-hidden="true"></i>
							<input  type="text" value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}" required="">
							<div class="clearfix"></div>
						</div>
					   <div class="key">
					   <i class="fa fa-envelope" aria-hidden="true"></i>
	<td>Country</td>
	   <td><select name="country" id="country" onchage="ajaxdata(this.value)">
							
			<?php 
					foreach($country as $c)
			{
			?>
			 <option value="<?php echo $c->country;?>"><?php echo $c->country;?></option>
			<?php	   
			}
			 ?>
	    </select></td>
	    <div class="clearfix"></div>
		</div> 
		<div class="key">
		<i class="fa fa-envelope" aria-hidden="true"></i>


		<td>State:</td>
			<td><select name="state" id="state">
			<option value="">Select</option>
	    </select></td>
		<div class="clearfix"></div>
			</div> 	
			<div class="key">
			<i class="fa fa-lock" aria-hidden="true"></i>
	<input  type="password" value="Password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" required="">
				<div class="clearfix"></div>
				 </div>
						<div class="key">
							<i class="fa fa-lock" aria-hidden="true"></i>
							<input  type="password" value="Confirm Password" name="mobile" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Confirm Password';}" required="">
							<div class="clearfix"></div>
						</div>
						<input type="submit" value="Submit" name="submit">
					</form>
				</div>
				
			</div>
		</div>
<!--footer-->

<script type="text/javascript">	
		
$(document).ready(function(){
	
	$(document).on("click", "#btn_send", function(e){	
				
		var email = $("#txt_email").val();
		var atpos = email.indexOf("@");
		var dotpos = email.lastIndexOf(".com");
			
		if(email == ""){
			alert("Please Enter Email Address"); 
		}
		else if(atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length){
			alert("Please Enter Valid Email Address !"); 
		}
		else{
			$.ajax({
				url: "send_otp.php",
				type: "post",
				data: {uemail:email},
				success:function(response){
					if($.trim(response)=="send"){
						$("#email_error").remove();
						$("#success_msg").html("otp send check your mail box... and enter it here");
						$(".second_division").show();
						$(".first_division").hide();
					}	
					if($.trim(response)=="wrong_email"){
						$("#email_error").html("sorry, you enter wrong email");
					}	
				}
				
			});	
		}	
	});

	$(document).on("click", "#btn_submit", function(e){	
		var otp=$("#txt_otp").val();
		$.ajax({
			url:"check_otp.php",
			type:"post",
			data: {uotp:otp},
			success:function(response){
				if($.trim(response)==="valid"){
					window.location="welcome.php"
				}
				if($.trim(response)==="invalid"){
					$("#otp_error").html("sorry, you enter invalid otp number");
				}
			}
		});
	});
	
});

</script>