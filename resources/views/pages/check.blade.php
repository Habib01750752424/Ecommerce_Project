<?php
     $contents=Cart::content();

     foreach ($contents as $acontent) { 
?>

<p>{{$acontent->total}}</p>


<?php } ?>




if ($card_balance->rowId == $id) {
	foreach ($card_balance as $acard_balance) {
	$tk = $tk + $acard_balance->balance;
}
}





foreach ($card_balance as $acard_balance) {
	echo $acard_balance->rowId;
}




$delete=DB::table('cards')
                ->where('rowId',$id)
                ->get();
$dltuser=DB::table('cards')
                  ->where('rowId',$id)
                  ->delete();














    public function SubmitBalance(Request $request)
    {
    	$this->validate($request, [
        'balance' => 'required',
        ]);

        $tk = Session::get('tk');

    	$data=array();
        $data['balance']=$request->balance;
        $data['rowId']=$request->rowId;

    	$balance=$request->balance;
    	$rowId=$request->rowId;

    	$taka = (int)$balance;
    	//echo gettype($taka);
    	//echo gettype($balance);

    	while($taka <= 20000) {
    		$len = strlen($balance);
	    	$lastCharacter = $balance[$len-1];
	    	if ($lastCharacter == '0') {
	    		
	    			while ($tk >= 0) {
                        $card=DB::table('cards')->insert($data);
	    				Session::put('message','You have successfully purchased your card !!');	
	    			     return Redirect::to('/buy-your-card');
	    			}
    				Session::put('message','Balance Card could not taken Negative taka !!');	
    			     return Redirect::to('/buy-your-card');

	    				
	    		}else{
	    			Session::put('message','Something Went Wrong, Please Check Inserting Details !!');
	    			return Redirect::to('/buy-your-card');	
	    		}
	    
    	}

    	Session::put('message','Please, enter balance between 10 to 20000 taka');
    	return Redirect::to('/buy-your-card');	
    }














    
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
<?php
$contents=Cart::content();

foreach ($contents as $acontent){

    $id = $acontent->rowId;
    $total = $acontent->total;
    //echo $id;
    //echo $total;
}
Session::put('total',$total);



 $tk = 0;
$card_balance = DB::Table('cards')->get();

    foreach ($card_balance as $acard_balance) {
        
            $tk = $tk + $acard_balance->balance;
}
$totl = (int)Cart::total();
$taka = $totl - $tk;
Session::put('tk',$taka);


?>
<p class="alert-success" style="margin-top: 50px;">
    <?php
    $inBalance=Session::get('inBalance');
    if ($inBalance) {

        echo $inBalance." ".$taka;
        Session::put('inBalance',null);
    }
    ?>
</p><?php

?>



<p class="alert-success" style="margin-top: 50px;">
    <?php
    $BuyProduct=Session::get('BuyProduct');
    if ($BuyProduct) {

        echo $BuyProduct;
        Session::put('BuyProduct',null);



$delete=DB::table('cards')
                ->where('rowId',$id)
                ->get();
$dltuser=DB::table('cards')
                  ->where('rowId',$id)
                  ->delete();
    }


    ?>
</p>

    <p class="alert-success" style="margin-top: 50px;">
        <?php
        $message=Session::get('message');
        if ($message) {

            echo $message;
            Session::put('message',null);
        }

        ?>


        @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
               @foreach ($errors->all() as $error)
                 <li>{{ $error }}</li>
               @endforeach
            </ul>
          </div>
        @endif
    </p>

    <span style="font-size: 30px;">Your Total Product Price:</span>



 <span style="font-size: 30px;"><b>{{Cart::total()}}</b> TK</span>

 

 <?php

if ($tk >= $total) {
    ?><span style="font-size: 25px; float: right;margin-right: 150px; color: black;" class="btn btn-danger"><button><a href="buy-product" style="text-decoration: none;">Now Buy</a></button></span><?php
}

if ($taka >= 0) {
    ?><br><span style="font-size: 25px;">Your Card Total: <b>{{$tk}}</b></span><?php
  
    ?><br><span style="font-size: 20px;">Till Now Your Balance is Required <strong>{{Cart::total()}}</strong> For This Product</span><?php
}




 ?>


<div style="margin-left: 350px;">
  <h2>Place Your Taka:</h2>

  <form action="{{ url('/submit-balance') }}" method="post">
    {{csrf_field()}}

    <div class="form-group">
      <input type="text" name="balance" placeholder="Balance in taka" style="width: 300px; height: 30px;" />
    </div>
    <input  type="hidden" name="rowId" value="{{$id}}" >

    <div class="form-group">
      <button type="submit" class="btn btn-danger">Submit</button>
    </div>
    </div>
  
  </form>
</div>

</body>
</html>