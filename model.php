<?php
class model

{
    public $con = "";
    public function __construct()
    {
        $this->con = new mysqli('localhost', 'root', '', 'estore1');
    }


        public function InsertData($tbl,$data)

     {
        $dk = array_keys($data);
        $k = implode(",",$dk);
        $dv = array_values($data);
        $v = implode("','",$dv);

        $sql = "INSERT INTO $tbl ($k) VALUES ('$v')";
        // echo $sql;exit;
        $q=$this->con->query($sql);
        return $q;
     }
     function Join_Two($tbl1,$tbl2,$on)
     {
         $sql = "SELECT * FROM $tbl1 JOIN $tbl2 on $on";
         //echo $sql;exit;
         $q = $this ->con->query($sql);
         while($fetch = $q->fetch_object())
         {
             $res[]=$fetch;
         }
         return $res;
     }


      function Select_where($tbl,$where)

    {
        $sql="SELECT * FROM $tbl WHERE 1=1";
        $key = array_keys($where);
        $val = array_values($where);
        $i = 0;

        foreach($where as $w)
        {
            $sql.= " AND $key[$i]= '$val[$i]' ";
            $i++;
        }
        //echo $sql;exit;

        $q = $this->con->query($sql);
        return $q;
    }

     public function SelectAll($tbl)

    {

       $sql = "SELECT * FROM $tbl";
        //echo $sql;exit;
        $q = $this->con->query($sql);
        while ($fetch = $q->fetch_object())
        {
            $res[] = $fetch;
        }
        return $res;
    } 
    function Delete_Data($tbl,$where)

        {
            $key =array_keys($where);
            $vals =array_values($where);
            $sql = "DELETE FROM $tbl WHERE 1=1";
            $i=0;
          foreach($where as $w)
            {
                $sql.=" and $key[$i]='$vals[$i]' ";
                $i++;
            }
            //echo $sql;exit;

            $q=$this->con->query($sql);
            return $q;
       

    }
   
    function mail($email,$sub,$msg)
    {
            
        require_once 'file_handling/phpmailer/PHPMailerAutoload.php';
        
    $to = $email;
    $sub = $sub;
    $msg = $msg;
    
   
  

    // mail($to,$sub,$msg);
    // echo "mail send";

    $mail = new PHPMailer;

    $mail->IsSMTP();
    $mail->isHTML(true);
    $mail->Host = "smtp.gmail.com"; 

    $mail->SMTPAuth = true;
    $mail->SMTPAutoTLS = false; 
    $mail->Port = 587; 
    $mail->SMTPSecure = 'tls';

    $mail->Username = 'sp2064505@gmail.com';  // enter your email

    $mail->Password = 'ordhztokbvwbrxkg';  // enter your email password

    $mail->setFrom('sp2064505@gmail.com', 'Sandip');  // enter display email & name

    $mail->addReplyTo('sp2064505@gmail.com', 'Sandip'); // enter your reply email & name

    $mail->addAddress($to) ;

    $mail->Subject = $sub;
    

    $mail->msgHTML($msg);

    if (!$mail->send()) {
       $error = "Mailer Error: " . $mail->ErrorInfo;
       echo "<pre>";
        echo $error;
    } 
    else 
    {
      
       echo '<script>
       alert("send Success");
      
       </script>';
    }
   }
        
     



}