<?php
$taka = 0;
foreach ($balnce as $abalnce) {
  $taka = $taka + $abalnce->balance;
}

$card_tk = (double)$taka; 

//$contents=Cart::content();
$cart_total = (double)Cart::total();

//$remaining_account_total  = $card_tk - $cart_total;

?>





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
<body style="background-color: #ffcccc">

<div class="container">


  <table class="table table-dark" border="2px;" style="height: 300px; margin: 0 auto; margin-top: 30px;">
      <tbody style="font-size: 30px;">
        <tr>
          <th scope="row">Total Account Balance</th>
          <td>{{$card_tk}}</td>
        </tr>
        <tr>
          <th scope="row">Book Price</th>
          <td>{{$cart_total}}</td>
        </tr>
        {{-- <tr>
          <th scope="row">Remaining Account Balance</th>
          <td>{{$remaining_account_total}}</td>
        </tr> --}}
      </tbody>

    </table>
    <h1 style="float: right; text-decoration: none;" class="btn btn-success"><a href="{{URL::to('/buy_book_details')}}">Now Buy</a></h1>

</div>

</body>
</html>



