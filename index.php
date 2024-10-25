<?php
$url = "http://kabukukidigitali.xyz/nida/api/index.php";
$account_id = "Your account id";
$api_key = "Your api key ";
$token = "Your token";
$nida = "your nida";

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
    $response = json_encode(['status' => 'Error', 'message' => 'There is an Erroe '.curl_error($curl)]);
    echo $response;
} elseif ($httpCode === 200) {
    $response = json_encode($response, true);
    echo $response;
}

?>
