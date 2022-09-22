<style type="text/css">
    .btn-success
    {
        background-color: red;
        border-radius: 10px;
    }
</style>

<?php




require_once("PaytmKit/lib/config_paytm.php");
require_once("PaytmKit/lib/encdec_paytm.php");

foreach ($cdata as $c) {

                                            $price = $c->price;
                                            $qty = $c->qty;
                                            $total = $price*$qty;
                                            $arr[] = $total;
                                            
                                        }

                                        $total_amount = array_sum($arr);

    $orderId 	= time();
    $txnAmount 	= $total_amount;
    $custId 	= $_SESSION['id'];
    $mobileNo 	= "7777777777";
    $email 		= "username@emailprovider.com";

    $paytmParams = array();
    $paytmParams["ORDER_ID"] 	= $orderId;
    $paytmParams["CUST_ID"] 	= $custId;
    $paytmParams["MOBILE_NO"] 	= $mobileNo;
    $paytmParams["EMAIL"] 		= $email;
    $paytmParams["TXN_AMOUNT"] 	= $txnAmount;
    $paytmParams["MID"] 		= "fWizni69239403272631";
    $paytmParams["CHANNEL_ID"] 	= "WEB";
    $paytmParams["WEBSITE"] 	= "WEBSTAGING";
    $paytmParams["INDUSTRY_TYPE_ID"] = "Retail";
    $paytmParams["CALLBACK_URL"] = "http://localhost/MVC-cart/paytm_response";
    $paytmChecksum = getChecksumFromArray($paytmParams, "frAqUsSfY8FakmXi");
    $transactionURL = "https://securegw-stage.paytm.in/theia/processTransaction";
    // $transactionURL = "https://securegw-stage.paytm.in/theia/processTransaction";
    // $transactionURL = "https://securegw.paytm.in/theia/processTransaction"; // for production
?>


    <body>
        


        <div class="holder">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-18 col-lg-12">
                <h1 class="text-center">Please do not refresh this page...</h1>

                <h2 class="text-center"> Amount to be Paid </h2>
                <div class="form-wrapper">


                      <form method='post' action='<?php echo $transactionURL; ?>' name='f1'>
            <?php
                foreach($paytmParams as $name => $value) {
                    echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
                }
            ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">
                        



                            <h1 class="text-center">
                                        
                                       <span style="font-weight: bold;">INR</span>
                                        <?php 

                                           
                                         

                                            
                                          print_r($total_amount);
                                                                                 

                                        ?>
                                    
                                    </h1>
                            
                        
                       

                       

                      
                        
                        
                        <div class="text-center">
                            <button type="submit"  name="submit" class="btn btn-warning ">Pay Now</button> <span style="font-weight: bold;">
                        </div>


           
        </form>
        <!-- <script type="text/javascript">
            document.f1.submit();
        </script> -->

                        

                        <div>
            
                        </div>

                        
                    
                </div><!--FORM-wrapper-->
            </div><!--col-->

        </div><!--row-->
    </div><!--container-->
</div><!--holder-->


<br>
      


<?php include_once 'footer.php'; ?>




