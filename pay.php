	<?php
$con=mysqli_connect('localhost','root','','schoolfeesys');
if (isset($_POST['payment']) && $_POST['amt'] >=1) {
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $amount=$_POST['amt'];
	$transaction_remark=$_POST['transaction_remark'];
    $pay_to='Fees Club';
    include 'instamojo\Instamojo.php';
    $api = new Instamojo\Instamojo('test_fbff4a2dab61ec2b82e989a18b3', 'test_2f7f6e9031b1f70b6b64bb40c7a', 'https://test.instamojo.com/api/1.1/');
    try {
        $response = $api->paymentRequestCreate(array(
            "purpose" => $pay_to,
            "user_name" => $name,
            "email" => $email,
            "phone" => $phone,
            "amount" => $amount,
			"transaction_remark" => $transaction_remark,
            "send_email" => true,
            "allow_repeated_payments" => false,
            "redirect_url" => "http://localhost/E-Trust/user/thankyou.php"
            ));
       // print_r($response);
        $url=$response['longurl'];
        header("location:$url");
        }
        catch (Exception $e) {
            print('Error: ' . $e->getMessage());
        }
        $query="INSERT INTO transaction (name,email,phone,amount,transaction_remark,pay_to) VALUES ('$name','$email','$phone','$amount','$transaction_remark','$pay_to')";
        $run=mysqli_query($con,$query);
    }
?>