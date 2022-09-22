<?php
ob_start();
include_once 'model.php';
class Mycontrol extends model

{
    public function __construct()
    {
        parent::__construct();
        $menu = $this->SelectAll('addcetegory');
        $url = $_SERVER['PATH_INFO'];
        //echo json_encode($menu);exit;
        session_start();
        switch ($url) {
            
            case '/register':
                   $country = $this->SelectAll('country');
                
                    if (isset($_POST['submit'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $country=$_POST['country'];
                    $password = $_POST['password'];
                    $mobile = $_POST['mobile'];

                    //mail send
                   
                    $sub = "E Store Registration Successfully";
                    $msg = "Welcome To E Store <p>&#128512;</p> ";
                    $this->mail($email, $sub, $msg);


                    //insert
                    $data = array(
                        'username' => $username,
                        'email' => $email,
                        'country'=>$country,
                        'password' => $password,
                        'mobile' => $mobile);


                    $this->InsertData('register', $data);
                    echo "<script>alert('Success full Register')</script>";
                }
                include_once 'hedder.php';
                include_once 'register.php';
                include_once 'footer.php';
                break;

            case '/login':
                if (!isset($_SESSION['id'])) 
                {
                    if (isset($_POST['submit'])) 
                    {
                        $email = $_POST['email'];
                        $password = $_POST['password'];

                        $where = array('email' => $email, 'password' => $password);
                        $res = $this->Select_where("register", $where);
                        $r = $res->num_rows;
                        if ($r > 0) {
                            $_session_data = $res->fetch_object();
                            // echo $_session_data;exit;
                            $_SESSION['id'] = $_session_data->id;
                            // setcookie("name",$email,time()+30);
                            // setcookie("pwd",$password,time()+30);
                            echo "<script>alert('login success!')</script>";
                            // header('location:index');
                            header('location:index');
                        } else {
                            echo "<script>alert('invalid data!')</script>";
                        }
                    }
                    include_once 'hedder.php';
                    include_once 'login.php';
                    include_once 'footer.php';
                } else 
                 {
                    header('location:index');       
                 }
                break;


            case '/contact':

                if(isset($_SESSION['id']))
                {
                    $whare=array('id'=>$_SESSION['id']);
                    $contact_data= $this->Select_Where('register',$whare);
                    while ($fetch = $contact_data->fetch_object())
                   {
                        $data= $fetch;
                    }

                

                if (isset($_POST['submit'])) {

                    $name = $_POST['name'];
                    $email =$_POST['email'];
                    $msg = $_POST['message'];

                    //email
                    $sub = "Thenks For Your Riview";
                //    
                
                        
                    $this->mail($email, $sub, $msg,);

                    $data = array(
                        'name' => $name,
                        'email' => $email,
                        'message' => $msg
                    );
                    $this->InsertData('contact', $data);
                }
                include_once 'hedder.php';
                include_once 'contact.php';
                 }
                 else{header('location:login');}
                break;

            case '/index':

                    if(isset($_SESSION['id']))
                     {
                    include_once 'hedder.php';
                    if (isset($_GET['cet_id']))
                     {
                        $cet_id = $_GET['cet_id'];
                        $where = array('cet_id' => $cet_id);
                        $product = $this->Select_where('addproduct', $where);
                        $product_data = array();
                        // $response["data"]=array();
                       
                        while ($pro = $product->fetch_object())
                         {
                            $product_data[] = $pro;
                            // $data = array();
                            // $data = $pro;
                            // array_push($response["data"],$data);
                        }
                        //     $response["success"]=1;
                        //     $response["message"]="success";
                        // }
                        // else{
                        //     $response["success"]=0;
                        //     $response["message"]="no record found";
                        //     echo json_ecode($response);
                        // }    
                        //     echo json_encode($response);

                         $c = count($product_data);
                        // echo $c;exit;
                        if(isset($_POST['cart']))
                        {
                          $id = $_SESSION['id'];
                          $p_id = $_POST['p_id'];
                          $qty = $_POST['qty'];
                          $data = array('u_id'=>$id,'p_id'=>$p_id,'qty'=>$qty);
                          $this->InsertData('cart',$data);
                           echo "<script>alert('Add to Cart!')</script>";
                        }
                        if ($c != null)
                         {
                            include_once  'index.php';
                        } else
                         {
                            echo "<br><br>";
                            echo "<br><br>";
                            echo "<h1>Oops!..No Product Available...</h1>";
                            echo "<br><br>";
                            echo "<br><br>";
                        }
                    include_once 'footer.php';
               }
            }
               
                else
                {
                 header('location:login');   
                }
                
                break;

            case '/showcart':
                if (isset($_SESSION['id']))
                {
                    include_once 'hedder.php';
                    $id = $_SESSION['id'];
                    $whare = array ('u_id'=>$id);
                    $cdata = $this->Join_Two('cart','addproduct','cart.p_id=addproduct.p_id');
                   
                
                    include_once 'showcart.php';
                   
                    include_once 'footer.php';
                
                }                                                                                                                                                                                           
                else
                {
                    header('location:login');
                }
           case '/delete':
                    if (isset($_GET['did']))
                     {
                        $d=$_GET['did'];
                        $where = array('cat_id'=>$d);
                        $this->Delete_Data('cart',$where);
                         header('location:showcart');
                    }    
        case'/paytm-payment':
            if (isset($_SESSION['id']))
            {
                include_once 'hedder.php';
                $id = $_SESSION['id'];
                $whare = array ('u_id'=>$id);
                $cdata = $this->Join_Two('cart','addproduct','cart.p_id=addproduct.p_id');
               
            
                include_once 'paytm-payment.php';
               
                include_once 'footer.php';
            
            }
            else
            {
                header('location:login');
            }




            
        break;

           
        case '/shipping':
            
            if (isset($_SESSION['id']))
            {
                include_once 'hedder.php';
                $id = $_SESSION['id'];
                $whare = array ('u_id'=>$id);
                $cdata = $this->Join_Two('cart','addproduct','cart.p_id=addproduct.p_id');
               
            
                include_once 'shipping1.php';
               
                
            
            }
            else
            {
                header('location:login');
            }
             
        break;   
        
        case '/state':
            include_once 'hedder.php';
            if(isset($_POST['sid']))
            {
                $sid=$_POST['sid'];
                $where = array('cid'=>$sid);
                $state = $this->Select_Where('state',$whare);
                while($sdata = $state->fetch_object())
                {
                    $sarray[]=$data;

                }
                include_once 'state.php';
            }
        case '/logout':
            session_destroy();
            header('location:login');
        }
    }
}


$obj = new Mycontrol;

ob_flush();
