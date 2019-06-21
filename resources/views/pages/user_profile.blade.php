<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


<?php

$cus_name = Session::get('cus_name');
$cus_email = Session::get('cus_email');
$cus_number = Session::get('cus_number');


 $data = DB::table('balance')->where('email',$cus_email)->get();
 $count = count($data);

 $balance_sum = 0;

foreach ($data as $adata) {
   $balance_sum = $balance_sum + $adata->balance;
}



$card_tk = (double)$balance_sum; 

//$contents=Cart::content();
$cart_total = (double)Cart::total();

$total  = $card_tk - $cart_total;


?>

	<div class="container" style="margin-top:50px;">
		<br/>
		  <table class="table table-dark" border="2px;" style="height: 500px;">
		  <tbody style="font-size: 30px;">
		    <tr>
		      <th scope="row">Name</th>
		      <td>{{$cus_name}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Email</th>
		      <td>{{$cus_email}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Mobile Number</th>
		      <td>{{$cus_number}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Account Remaining Balance</th>
		      <td>{{$total}}</td>
		    </tr>
		  </tbody>
		</table>

		<a style="float: right; text-decoration: none;font-size: 30px;" href="{{URL::to('customer_logout')}}" class="btn btn-primary">Logout</a>
	</div>

</body>
</html>
