@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
<?php
$data = DB::table('brand')->where('status',1)->get();
$count = count($data);
?>


<?php
if ($count == 1) {
			?><div class="register-req"><?php
					?><p style="font-size: 25px; color: red;">{{$count}} new book have been added. You can see first {{$count}} book of home page</p><?php
			?></div><?php
}else
if($count > 1){
	        ?><div class="register-req"><?php
					?><p style="font-size: 25px; color: red;">{{$count}} new books have been added. You can see first {{$count}} books of home page</p><?php	
			?></div><?php
}
?>

			<div class="shopper-informations">
				<div class="row">
					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p>Shipping Details</p>
							<div class="form-one">
								<form action="{{('/save-shipping-details')}}" method="post">

								 {{ csrf_field() }}									
									<input type="text" name="shipping_email" placeholder="Email*">
									<input type="text" name="shipping_first_name" placeholder="First Name *">
									<input type="text" name="shipping_last_name" placeholder="Last Name *">
									<input type="text" name="shipping_address" placeholder="Address *">
									<input type="text" name="shipping_mobile_number" placeholder="Mobile Number *">
									<input type="text" name="shipping_city" placeholder="city *">
									<input type="submit" class="btn btn-default" value="Done">
								</form>
							</div>
						</div>
					</div>					
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->




@endsection