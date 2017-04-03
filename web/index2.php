CTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <title>biocode1</title>
  </head>
  <body>
    <div class="container">
      <h1>biocode1 </h1>
         
<?php

//API Url
$url = 'https://exfmqwf749.execute-api.us-west-2.amazonaws.com/beta/test';
//Initiate cURL.
$ch = curl_init($url);
//The JSON data.
$jsonData = array(
    'TableName' => 'mark1',
    'Item' => array(
        'email' => 'bob@example.com',
        'firstname' => 'Bob',
        'lastname' => 'Barker',
        'phone' => '234-234-2345'
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
                  
echo '<br>'.$result.'<br>'; 
         
?>

    </div>
  </body>
</html>

