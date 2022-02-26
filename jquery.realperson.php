<?php
require_once("PHPMailer/PHPMailerAutoload.php");
require_once("database.php");
//-----------------------------資料表設定--------------------------------/
$db='user';
//-----------------------------功能設定-------------------------------/



$company = $_POST['company']; // 公司
$name = $_POST['name'];       // 姓名
$email = $_POST['email'];     // email
$sex = $_POST['sex'];         // 性別
$hobby = $_POST['hobby'];     // 興趣
$phone = $_POST['phone'];     // 手機
$msg = $_POST['msg'];         // 留言
// print_r($hobby);
// die();
if(isset($name)){
    // 上傳資料表
    $stmt = $mysqli->prepare("INSERT INTO $db (`id`, `name`, `company`, `sex`, `hobby`, `Email`, `phone`, `msg`, `age`) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, NULL)");
    $stmt->bind_param('sssssss', $name, $company, $sex, $hobby, $email, $phone, $msg);

    $sent_action = 1;
    if($stmt->execute()){   
    }else{
        $sent_action = 2;
       
    }

    // 寄件程式
    // function smtpailer($from, $from_name, $subject, $body, $src1){

    //     $mail= new PHPMailer();
    //     $mail->IsSMTP();
    //     $mail->SMTPAuth = true;
    //     $mail->SMTPSecure = "ssl";
    //     $mail->Host = "smtp.gmail.com";
    //     $mail->Port = 465;  //我們主機的郵件伺服器port為 25    
    //     $mail->CharSet = "utf-8";
    //     // 信件處理的編碼方式
    //     $mail->Encoding = "base64";  
    //     $mail->Username = "your gmail"; 
    //     $mail->Password = "your gmail password";
    //     $mail->IsHTML(true);
    //     $mail->From="your gmail";
    //     $mail->FromName=$from_name;
    //     $mail->Sender=$from;
    //     $mail->AddReplyTo($from,$from_name);
    //     $mail->Subject = $subject;
    //     $mail->Body=$body;
        
    //     $mail->AddAddress("vince860510@gmail.com");
        
    //     if(!$mail->Send()){
    //         echo "<script> alert('傳訊錯誤，請重新嘗試。');parent.location.href='technique'; </script>";
    //     }else{
    //     $tip = "感謝您的留言，\\n您的需求已送出，\\n我們將會盡快與您連絡!!\\n";
    //     $strMeta ="<meta http-equiv='content-type' content='text/html; charset=UTF-8'  />";   
    //         echo $strMeta."<script language='javascript'>window.alert('$tip');location='technique.php'</script>";
    //     }

    // }

	//  if (!empty($_SERVER['HTTP_CLIENT_IP'])){//抓取真實ip
	//    $ip=$_SERVER['HTTP_CLIENT_IP'];
	//  }else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
	//    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	//  }else{
	//    $ip=$_SERVER['REMOTE_ADDR'];
	//  }

    // $date=date("Y-m-d H:i:s");

    // $form="mars860510.1@gmail.com";
    // $subject="管理員您好，您的網站有訪客留言，留言時間：".$date;

    // $body=
    // "
    // 親愛的管理員，您好！
    // 您的網站有訪客留言，內容如下，請儘速回覆。<br />
    // ══════════════════════════════════<br />"."姓名:".$name."<br />信箱:".$email."<br />電話:".$phone."<br />公司:".$company."<br />性別:".$sex."<br />回應內容:".$msg."<br />ip位址:".$ip;
    // //smtpailer($from, $name, $subject, $body, $mail_src1_account);

    // if ($sent_action==1) {
    //     smtpailer($from, "測試表單", $subject, $body, $mail_src1_account);
    // }else{
        
    //     $tip = "Fail!！";
    //     $strMeta ="<meta http-equiv='content-type' content='text/html; charset=UTF-8'  />";   
    //     echo $strMeta."<script language='javascript'>window.alert('$tip');location='index'</script>";
    // }

}
?>