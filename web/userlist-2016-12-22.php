<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <title>biocode1</title>
  </head>
  <body>
    <div class="container">
      <h1>biocode1 </h1>

      <form method="post" action="<?php echo $PHP_SELF?>">
      <table>
      <tr><td>Email: </td><td><input type="Text" size="25" name="email" value="<?php echo $_POST['email']?>"></td></tr>
      <tr><td>First Name: </td><td><input type="Text" size="25" name="firstname" value="<?php echo $_POST['firstname']?>"></td></tr>
      <tr><td>Last Name: </td><td><input type="Text" size="25" name="lastname" value="<?php echo $_POST['lastname']?>"></td></tr>
      <tr><td>Phone: </td><td><input type="Text" size="25" name="phone" value="<?php echo $_POST['phone']?>"></td></tr>
<<<<<<< HEAD
      <tr><td><input type="Submit" name="submitapi" value="SUBMIT"> <input type="Submit" name="updateapi" value="UPDATE"></td><td><input type="Submit" name="deleteapi" value="DELETE"></td></tr>
=======
      <tr><td><input type="Submit" name="submitapi" value="SUBMIT"></td><td><input type="Submit" name="deleteapi" value="DELETE"></td></tr>
>>>>>>> d51e50f4eb3daf9e77dad1626760f28f5892b227
      </table>
      </form>

<?php
        $url = 'https://exfmqwf749.execute-api.us-west-2.amazonaws.com/beta/test';
        $ch = curl_init($url);
###SUBMIT NEW ENTRY
if($_POST['submitapi'] == 'SUBMIT'){
        $jsonData = array(
            'TableName' => 'mark1',
            'Item' => array(
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'phone' => $_POST['phone']
                )
        );

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
<<<<<<< HEAD
        $result = curl_exec($ch);
        curl_close($ch);
        echo '<br>'.$result.'<br>';
}
###SUBMIT NEW ENTRY
if($_POST['updateapi'] == 'UPDATE'){
        $jsonData = array(
            'TableName' => 'mark1',
            'Item' => array(
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname']
                )
        );

        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $result = curl_exec($ch);
        curl_close($ch);
        echo '<br>'.$result.'<br>';
}
### DELETE ENTRY
if($_POST['deleteapi'] == 'DELETE'){
        $jsonData = array(
            'TableName' => 'mark1',
            'Key' => array(
                'email' => $_POST['email']
                )
        );
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
=======
>>>>>>> d51e50f4eb3daf9e77dad1626760f28f5892b227
        $result = curl_exec($ch);
        curl_close($ch);
        echo '<br>'.$result.'<br>';
}
<<<<<<< HEAD
=======
### DELETE ENTRY
if($_POST['deleteapi'] == 'DELETE'){
        $jsonData = array(
            'TableName' => 'mark1',
            'Key' => array(
                'email' => $_POST['email']
                )
        );
        $jsonDataEncoded = json_encode($jsonData);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        echo '<br>'.$result.'<br>';
}
>>>>>>> d51e50f4eb3daf9e77dad1626760f28f5892b227


###LIST ENTRIES
$url = 'https://exfmqwf749.execute-api.us-west-2.amazonaws.com/beta/test?TableName=mark1';
$ch2 = curl_init($url);
curl_setopt($ch2, CURLOPT_TIMEOUT, 5);
curl_setopt($ch2, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch2);
curl_close($ch2);
echo '<br><br><br>';
$decodedText = html_entity_decode($data);
$myArray = json_decode($decodedText, true);
$items = $myArray['Items'];
$user_table = '<table><tr><td>Email</td><td>Name</td><td>Phone</td></tr>';
foreach($items as $item){
        $user_table .= '<tr><td>'.$item['email'].'</td><td>'.$item['firstname'].' '.$item['lastname'].'</td><td>'.$item['phone'].'</td></tr>';
}
$user_table .= '</table>';
echo $user_table;
<<<<<<< HEAD
echo '<br>t3<br><br>';
=======
echo '<br>t4<br><br>';
>>>>>>> d51e50f4eb3daf9e77dad1626760f28f5892b227

?>

    </div>
  </body>
</html>
<<<<<<< HEAD
=======

>>>>>>> d51e50f4eb3daf9e77dad1626760f28f5892b227
