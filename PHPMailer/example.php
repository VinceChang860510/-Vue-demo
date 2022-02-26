<?php
require_once('PHPMailerAutoload.php');
if (isset($_POST["submit"])) {
    $C_name=$_POST['C_name'];
    $C_email=$_POST['C_email'];
    $C_tel=$_POST['C_tel'];
    $C_message=$_POST['C_message'];
   
    $mail= new PHPMailer();                          //建立新物件
    $mail->IsSMTP();                                    //設定使用SMTP方式寄信
    $mail->SMTPAuth = true;                        //設定SMTP需要驗證
    $mail->SMTPSecure = "tsl";                    // Gmail的SMTP主機需要使用SSL連線
    $mail->Host = "smtp.gmail.com";             //Gamil的SMTP主機
    $mail->Port = 587;                                 //Gamil的SMTP主機的埠號(Gmail為465)。
    $mail->CharSet = "utf-8";                       //郵件編碼
    $mail->Username = "vince860510.1@gmail.com"; //Gamil帳號
    $mail->Password = "Aa900179";                 //Gmail密碼
    $mail->SMTPDebug = 3;
    // $mail->From = "XXXX@gmail.com";        //寄件者信箱
    // $mail->FromName = "XXXX";                  //寄件者姓名
    $mail->setFrom('vince860510.1@gmail.com','VC');
    $mail->Subject ="來自".$C_name."留言"; //郵件標題
    $mail->Body = "姓名:".$C_name."<br />信箱:".$C_email."<br />電話:".$C_tel."<br />回應內容:".$C_message; //郵件內容
    $mail->IsHTML(true);                             //郵件內容為html
    $mail->AddAddress('vince860510.1@gmail.com');            //收件者郵件及名稱
    if(!$mail->Send()){
        echo "Error: " . $mail->ErrorInfo;
    }else{
        echo "<b>感謝您的留言，您的建議是我們前進的動力。</b>";
    }
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