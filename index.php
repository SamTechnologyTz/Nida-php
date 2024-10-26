<?php

$url = "https://kabukukidigitali.xyz/nida/api/api.php";

$account_id = "Your account id";
$api_key = "Your api key";
$token = "Your token";
$nida = "244678990";

$data = [
    'nida' => $nida
];

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($curl, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'api-key:'.$api_key,
    'token:'.$token,
    'account_id:'.$account_id,
]);

$response = curl_exec($curl);
$httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if ($response === false) {
    $response = json_encode(['status' => 'Error', 'message' => 'There is an Error '.curl_error($curl)]);
    echo $response;
} elseif ($httpCode === 200) {
    $response = json_decode($response, true); // Decode first
    echo json_encode($response); // Encode it again to ensure it's JSON format
} else {
    echo json_encode(['status' => 'Error', 'message' => 'Unexpected HTTP code: '.$httpCode]);
}

curl_close($curl);
?>