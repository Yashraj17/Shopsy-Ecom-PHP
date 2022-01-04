<?php 
if (isset($_POST['checkout'])) {
    $amount = $_POST['total'];
    echo $amount;
}
?>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://test.instamojo.com/api/1.1/payment-requests/');
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER,
            array("X-Api-Key:test_715a013cca417fd8f1667627b4c",
                  "X-Auth-Token:test_0a65c808ebee6918066aa71e576"));
$payload = Array(
    'purpose' => 'Buy Products',
    'amount' => $amount,
    'phone' => '6207888026',
    'buyer_name' => 'Yash Raj',
    'redirect_url' => 'http://localhost/shopsy/redirect.php',
    'send_email' => true,
    'send_sms' => true,
    'email' => 'yashraj172000@gmail.com',
    'allow_repeated_payments' => false
);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($payload));
$response = curl_exec($ch);
curl_close($ch); 
$response = json_decode($response);
header('location:'.$response->payment_request->longurl);
die();

?>