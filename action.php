<?php
require_once("database.php");

//-----------------------------資料表設定--------------------------------/
$db='user';
//-----------------------------功能設定-------------------------------/
$received_data = json_decode(file_get_contents("php://input"));
$data = array();



if($received_data->action == 'fetchall')
{

    
 $query = "
 SELECT id, name, email, phone, msg, company, sex, hobby FROM $db 
 ORDER BY id ASC
 ";

$i = 0;
 $statement = $mysqli->prepare($query);
 $statement->execute();
 $statement->bind_result($id, $name, $email, $phone, $msg, $company, $sex, $hobby);
 while($row = $statement->fetch())
 {
    $data[$i]['id'] = $id;
    $data[$i]['name'] = $name;
    $data[$i]['email'] = $email;
    $data[$i]['phone'] = $phone;
    $data[$i]['msg'] = $msg;
    $data[$i]['company'] = $msg;
    $data[$i]['sex'] = $msg;
    $data[$i]['hobby'] = $msg;
    $i++;
 }

 echo json_encode($data);
}

if($received_data->action == 'delete')
{
 $query = "
 DELETE FROM $db 
 WHERE id = '".$received_data->id."'
 ";

 $statement = $mysqli->prepare($query);

 $statement->execute();

 $output = array(
  'message' => '成功刪除'
 );

 echo json_encode($output);
}

?>