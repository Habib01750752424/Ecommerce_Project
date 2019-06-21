@extends('admin_layout')
@section('admin_content')


<div class="row-fluid sortable">	
				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Customer Details</h2>
					</div>
					<div class="box-content">
						<table class="table">
							  <thead>
								  <tr>
									  <th>customer name</th>
									  <th>mobile</th>                                   

									</tr>
							  </thead>   
							  <tbody>
							  	<tr>
{{-- 							  		@foreach($order_by_id as $v_order)
							  		@endforeach --}}
							  		<td>{{$order_by_id->customer_name}}</td>
							  		<td>{{$order_by_id->mobile_number}}</td>

							  	</tr>
								        
							  </tbody>
						 </table>      
					</div>
				</div>

				<div class="box span6">
					<div class="box-header">
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Shipping Details</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped ">
							  <thead>
								  <tr>
									  <th>Username</th>
									  <th>Address</th>
									  <th>Mobile</th>
									  <th>Email</th>                                   

									</tr>
							  </thead>   
							  <tbody>
							  	<tr>
							  		{{-- @foreach($order_by_id as $v_order)
							  		@endforeach --}}
							  		<td>{{$order_by_id->shipping_first_name." ".$order_by_id->shipping_last_name}}</td>
							  		<td>{{$order_by_id->shipping_address}}</td>
							  		<td>{{$order_by_id->shipping_mobile_number}}</td>
							  		<td>{{$order_by_id->shipping_email}}</td>

							  	</tr>
								        
							  </tbody>
						 </table>      
					</div>
				</div>
			</div><!--/span-->

 <div class="row-fluid sortable">	
				<div class="box span12">
					<div class="box-header" data-original-title >
						<h2><i class="halflings-icon align-justify"></i><span class="break"></span>Order Details</h2>
					</div>
					<div class="box-content">
						<table class="table table-striped ">
							  <thead>
								  <tr>
									  <th>Order Id</th>
									  <th>Product name</th>
									  <th>Product price</th>
									  <th>Product sales quantity</th>
									  <th>Product sub total</th>                                   
									</tr>
							  </thead>   
							  <tbody>

							  	<?php
							  	$i = 0;
							  	//echo $i;
							  	?>
							  	{{-- @foreach($order_by_id as $v_order) --}}	
							  	<tr>
							  		<td>{{$order_by_id->order_id}}</td>
							  		<td>{{$order_by_id->product_name}}</td>
							  		<td>{{$order_by_id->product_price}}</td>
							  		<td>{{$order_by_id->product_sales_quantity}}</td>
							  		<td>{{$order_by_id->product_price * $order_by_id->product_sales_quantity}}</td>
							  		

							  	</tr>
							  	{{-- @endforeach --}}

							  </tbody>
							  {{-- <tfoot>
							  	<tr>
							  		<td colspan="4">Total with vat: </td>
							  		<td><strong>={{$order_by_id->order_total}} Tk</strong></td>
							  	</tr>							  	
							  </tfoot> --}}
						 </table>      
					</div>
				</div>
 </div><!--/row -->


@endsection