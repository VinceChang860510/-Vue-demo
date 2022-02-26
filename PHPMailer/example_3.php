<?php 
require("PHPMailerAutoload.php");

function smtpailer($to, $from, $from_name, $subject, $body){

	$mail= new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    //$mail->SMTPSecure = "ssl";
    $mail->Host = "localhost";
    $mail->Port = 25;  //我們主機的郵件伺服器port為 25    
    $mail->CharSet = "utf-8";
    // 信件處理的編碼方式
	$mail->Encoding = "base64";  
    $mail->Username = "info@cib.hct.tw"; 
    $mail->Password = "54%OTC7gRuQi";
    $mail->IsHTML(true);
    $mail->From="info@cib.hct.tw";
    $mail->FromName=$from_name;
    $mail->Sender=$from;
    //$mail->AddReplyTo($from,$from_name);
    $mail->Subject = $subject;
    $mail->Body=$body;
    $mail->AddAddress("vince860510.1@gmail.com");
    $mail->AddAddress("vince860510@gmail.com");
    if(!$mail->Send()){
        echo "Error: " . $mail->ErrorInfo;
    }else{
        echo "<b>感謝您的留言，您的建議是我們前進的動力。</b>";
    }

}


if (isset($_POST["submit"])) {
	$to = "vince860510.1@gmail.com";
	$form="info@taipei-arakawa.hct.tw";
	$name="info";
	$subject="來自".$C_name."留言";
	$body="姓名:".$C_name."<br />信箱:".$C_email."<br />電話:".$C_tel."<br />回應內容:".$C_message;
	smtpailer($to, $from, $name, $subject, $body);
}



 ?>
 <!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" charset="utf-8" />
        <title>留言給我們</title>
    </head>
<body>
    <form id="form1" name="form1" method="post" action="">
    <fieldset>
    <legend>留言給我們</legend>
    <label>您的大名：</label>
    <input id="C_name" name="C_name" type="text" />
    <br />

    <label>您的Email：</label>
    <input id="C_email" name="C_email" type="text" />
    <br />

    <label>您的電話號碼：</label>
    <input id="C_tel" name="C_tel" type="text" />
    <br />

    <label>您的寶貴意見：</label>
    <textarea id="C_message" name="C_message"></textarea>
    <br />

    <input id="submit" name="submit" type="submit" value="確定送出" />
    </fieldset>
    </form>
</body>
</html>