@extends('admin_layout')
@section('admin_content')

<div class="container">

<?php

$shipping_email = Session::get('shipping_email');
$shipping_first_name = Session::get('shipping_first_name');
$shipping_last_name = Session::get('shipping_last_name');
$shipping_address = Session::get('shipping_address');
$shipping_mobile_number = Session::get('shipping_mobile_number');
$shipping_city = Session::get('shipping_city');





?>
<h1 style="text-align: center;">Shipping Address</h1>
	<table class="table table-dark" border="2px;" style="width: 800px; height: 300px; margin: 0 auto; margin-top: 30px;">
		  <tbody style="font-size: 30px;">
		    <tr>
		      <th scope="row">Name</th>
		      <td>{{$shipping_first_name}} {{$shipping_last_name}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Email</th>
		      <td>{{$shipping_email}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Mobile Number</th>
		      <td>{{$shipping_mobile_number}}</td>
		    </tr>
		    <tr>
		      <th scope="row">Adress</th>
		      <td>{{$shipping_address}}</td>
		    </tr>
		    <tr>
		      <th scope="row">City</th>
		      <td>{{$shipping_city}}</td>
		    </tr>
		  </tbody>
		</table>








	<div class="table-responsive cart_info">
      <?php 
         $contents=Cart::content();

      ?>

    <table class="table table-condensed" style="width: 800px; margin: 0 auto; margin-top: 30px;">
      <thead>
        <tr class="cart_menu">
          <td class="image">Image</td>
          <td class="description">Name</td>
          <td class="price">Price</td>
          <td class="quantity">Quantity</td>
          <td class="total">Subtotal</td>
        </tr>
      </thead>
      <tbody>

        @foreach( $contents as $v_contents)
        <tr>
          <td class="cart_product">
            <a href=""><img src="{{ $v_contents->options->image}}" height="100px" width="100px" alt=""></a>
          </td>
          <td class="cart_description">
            <h4><a href="">{{$v_contents->name}}</a></h4>
            
          </td>
          <td class="cart_price">
            <p>{{$v_contents->price}}</p>
          </td>
          <td class="cart_price">
            <p>{{$v_contents->qty}}</p>
          </td>

          {{-- <td class="cart_quantity">
            <div class="cart_quantity_button">
            <form action="{{url('/update-cart')}}" method="post">
                {{ csrf_field() }}

              <input class="cart_quantity_input" type="text" name="qty" value="{{$v_contents->qty}}" autocomplete="off" size="2">
              <input type="hidden" name="rowId" value="{{$v_contents->rowId}}" >
              <input type="submit" name="submit" value="update" class="btn btn-sm btn-default">
             </form>
             </div>
          </td> --}}

          <td class="cart_total">
            <p class="cart_total_price">{{$v_contents->total}}</p>
          </td>

        </tr>
        @endforeach

      </tbody>
    </table>
    <hr>
  </div>
  <h1 style="text-align: center;color: red;">Total: {{Cart::total()}}</h1>
</div>

@endsection
