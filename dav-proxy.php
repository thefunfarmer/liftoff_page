<?php
// dav-proxy.php - on your own domain to bypass CORS
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/xml");

// Basic Auth credentials
$user = 'funfarmer';
$pass = 'DaRkb-RTxcj-4L3QE-eRYWL-BHb3q';  // <<< put your app password here

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://nx73816.your-storageshare.de/remote.php/dav/files/funfarmer/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Basic " . base64_encode("$user:$pass"),
    "Depth: 1"
]);

$result = curl_exec($ch);

if(curl_errno($ch)){
    http_response_code(500);
    echo "Curl error: " . curl_error($ch);
    exit;
}

curl_close($ch);

echo $result;
?>
