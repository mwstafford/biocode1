<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <title>biocode1</title>
  </head>
  <body>
    <div class="container">
      <h1>biocode1 </h1>

      <form method="post" action="<?php echo $PHP_SELF?>">
      <p>Email: <input type="Text" size="25" name="email" value="<?php echo $_POST['email']?>"></p>
      <p>First Name: <input type="Text" size="25" name="firstname" value="<?php echo $_POST['firstname']?>"></p>
      <p>Last Name:<input type="Text" size="25" name="lastname" value="<?php echo $_POST['lastname']?>"></p>
      <p>Phone: <input type="Text" size="25" name="phone" value="<?php echo $_POST['phone']?>"></p>
      <p><input type="Submit" name="submitapi" value="SUBMIT"></p>
      </form>

<?php
###LIST ENTRIES
$url = 'https://exfmqwf749.execute-api.us-west-2.amazonaws.com/beta/test?TableName=mark1';
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_TIMEOUT, 5);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$data = curl_exec($ch);
curl_close($ch);
#echo $data;
echo '<br><br><br>';
$decodedText = html_entity_decode($data);
$myArray = json_decode($decodedText, true);
$items = $myArray['Items'];

foreach($items as $item){
        echo $item['email'].' '.$item['firstname'].' '.$item['lastname'].' '.$item['phone'].'<br>';
}

echo '<br><br><br>';

### SUBMIT NEW ENTRY
if($_POST['submitapi'] == 'SUBMIT'){
        //API Url
        $url = 'https://exfmqwf749.execute-api.us-west-2.amazonaws.com/beta/test';
        //Initiate cURL.
        $ch = curl_init($url);
        //The JSON data.
        $jsonData = array(
            'TableName' => 'mark1',
            'Item' => array(
                'email' => $_POST['email'],
                'firstname' => $_POST['firstname'],
                'lastname' => $_POST['lastname'],
                'phone' => $_POST['phone']
                )
        );

        //Encode the array into JSON.
        $jsonDataEncoded = json_encode($jsonData);

        //Tell cURL that we want to send a POST request.
        curl_setopt($ch, CURLOPT_POST, 1);

        //Attach our encoded JSON string to the POST fields.
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);

        //Set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        //Execute the request
        $result = curl_exec($ch);
        $jsonobj  = json_decode($result);
        $resultArray = object2array($jsonobj);
        echo '<br>';
        print_r($resultArray);
        echo '<br>';
}
?>

    </div>
  </body>
</html>




