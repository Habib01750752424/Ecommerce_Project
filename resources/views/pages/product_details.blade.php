@extends('layout')
@section('content')


<div class="col-sm-9 padding-right">
	<div class="product-details"><!--product-details-->
		<div class="col-sm-5">
			<div class="view-product">
				<img src="{{URL::to($product_by_details->product_image)}}" style="height: 300px" style="width: 250px" alt="" />
				<h3>ZOOM</h3>
			</div>
          </div>




<?php
	$review_id=Session::get('review_id');
	$rating_review = DB::table('tbl_review')->where('review_id', $review_id)->get();
	//echo $review;
	$count = count($rating_review);

	$i = 0;
	foreach ($rating_review as $arating_review) {
	$i = $i+$arating_review->rating_type;
}
?>









		<div class="col-sm-7">
			<div class="product-information"><!--/product-information-->
				<h2>{{$product_by_details->product_name}}</h2>
				<p>Color: {{$product_by_details->product_color}}</p>
Average Rating:
 <?php
if ($count > 1) {
 $rating = $i/$count;
 }else{
 	$i = 1;
    $rating = $i/1;
 }
	//echo $rating;
	if ($rating>0 && $rating<=1){
        ?>
     <img src="{{URL::to('frontend/images/home/1.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating>1 && $rating<=2){
        ?>
     <img src="{{URL::to('frontend/images/home/2.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating>2 && $rating<=3){
        ?>
     <img src="{{URL::to('frontend/images/home/3.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating>3 && $rating<=4){
    ?>
     <img src="{{URL::to('frontend/images/home/4.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating>4 && $rating<=5){
        ?>
     <img src="{{URL::to('frontend/images/home/5.jpg')}}" alt="" height="30" width="100" />
    <?php
    }
?>
				<span>
					<span>{{$product_by_details->product_price}} Tk</span>

				<form action="{{url('/add-to-cart')}}" method="post">
				   {{ csrf_field() }}
				   	
					<label>Quantity:</label>
					<input name="qty" type="text" value="1" />
					<input type="hidden" name="product_id" value="{{$product_by_details->product_id}}">
					<button type="submit" class="btn btn-fefault cart">
						<i class="fa fa-shopping-cart"></i>
						Add to cart
					</button>
				</form>
				</span>
				<p><b>Availability:</b> In Stock</p>
				<p><b>Condition:</b> New</p>
				<p><b>Brand:</b> {{$product_by_details->manufacture_name}}</p>
				<p><b>Category:</b> {{$product_by_details->category_name}}</p>
				<p><b>Size:</b> {{$product_by_details->product_size}}</p>
			
			</div><!--/product-information-->
		</div>
	</div><!--/product-details-->
	
	<div class="category-tab shop-details-tab"><!--category-tab-->
		<div class="col-sm-12">
			<ul class="nav nav-tabs">
				<li><a href="{{URL::to('/details')}}">Details Review Rating</a></li>
				{{-- <li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
				<li><a href="#tag" data-toggle="tab">Tag</a></li> --}}
				<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
			</ul>
		</div>
		<div class="tab-content">
			{{-- <div class="tab-pane fade" id="details" >
				<p>{{$product_by_details->product_long_description}}</p>
		  	</div> --}}	
			
			<div class="tab-pane fade" id="companyprofile" >
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade" id="tag" >
				<div class="col-sm-3">
					<div class="product-image-wrapper">
						<div class="single-products">
							<div class="productinfo text-center">
								<img src="images/home/gallery1.jpg" alt="" />
								<h2>$56</h2>
								<p>Easy Polo Black Edition</p>
								<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			<div class="tab-pane fade active in" id="reviews" >
				<div class="col-sm-12">
					<ul>
						<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
						<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
						<li><a href=""><i class="fa fa-calendar-o"></i>26 JUN 2018</a></li>
					</ul>
					
					<p>

<?php
if ($count > 0) {

 ?>
 <span>Last User's Review and Rating:<span><br>
Review:{{$arating_review->review}}<br>
Rating:{{$arating_review->rating_type}}




 <?php
if ($count > 1) {
 $rating = $arating_review->rating_type;
 }else{
 	$i = 1;
    $rating = $i/1;
 }
	//echo $rating;
	if ($rating>0 && $rating<=1){
		?>
     <img src="{{URL::to('frontend/images/home/1.jpg')}}" alt="" height="30" width="100" />
    <?php
	}elseif ($rating>1 && $rating<=2){
		?>
     <img src="{{URL::to('frontend/images/home/2.jpg')}}" alt="" height="30" width="100" />
    <?php
	}elseif ($rating>2 && $rating<=3){
		?>
     <img src="{{URL::to('frontend/images/home/3.jpg')}}" alt="" height="30" width="100" />
    <?php
	}elseif ($rating>3 && $rating<=4){
	?>
     <img src="{{URL::to('frontend/images/home/4.jpg')}}" alt="" height="30" width="100" />
    <?php
	}elseif ($rating>4 && $rating<=5){
		?>
     <img src="{{URL::to('frontend/images/home/5.jpg')}}" alt="" height="30" width="100" />
    <?php
	}
?>





<br>
<?php
 }else{
 	?><h4 style="text-align: center;color: #8E1616;"><?php echo "Sorry !! There is no available review in this product";?><h4><?php
 }
?>

                        

					</p>

					<p><b>Write Your Review and Rating:</b></p>
					@if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                  <a href="{{URL::to('/')}}" class="pull-right btn btn-success">Back</a>
                 
                  <a href="{{URL::to('/login-user')}}" class="btn btn-danger">Write Review and Rating</a>
       
                
					{{-- <form action="{{ url('/insert-review/'.$product_by_details->product_id) }}" method="post" style="background-color: gray">
						{{csrf_field()}}
						<span>
							<input type="text" name="name" placeholder="Your Name"/>
							<input type="email" name="email" placeholder="Email Address"/>
						</span>
						<textarea name="review"></textarea>
						<b>Rating:</b>
						<select name="rating_type" class="form-control">
                        	<option disabled="" selected="">Select One</option>
                        	<option value="1">1 Star</option>
                        	<option value="2">2 Star</option>
                        	<option value="3">3 Star</option>
                        	<option value="4">4 Star</option>
                        	<option value="5">5 Star</option>
                        </select>
						<button type="submit" class="btn btn-default pull-right">
							Submit
						</button>
					</form> --}}
				</div>
			</div>
			
		</div>
	</div><!--/category-tab-->
					
					
@endsection