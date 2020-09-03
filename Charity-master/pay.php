<?php
$name=$_POST["name"];
$phone=$_POST["phone"];
 $email=$_POST["email"];
$amount=$_POST["amount"];
include 'instamojo\Instamojo.php';
$api = new Instamojo\Instamojo('test_cb91986a8a42a7debc99d4f2801', 'test_b8e6c447d7093423baa82a14eab', 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Donation",
        "amount" => $amount,
         "send_email"=>true,
         "email"=>$email,
         "buyer_name"=>$name,
         "phone"=>$phone,
         "send_sms"=>true,
         "allow_repeated_payments"=>false,
        "redirect_url" => "http://localhost/payment/Charity-master/thankyou.php"
        ));
    //print_r($response);
    $pay_url=$response['longurl'];
    header("location:$pay_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>