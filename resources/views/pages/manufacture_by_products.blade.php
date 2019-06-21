@extends('layout')
@section('content')

<h2 class="title text-center">Features Items</h2>
             <?php foreach($product_by_manufacture as $v_manufacture_by_product){?>
				<div class="col-sm-4">
				 <div class="product-image-wrapper">
					<div class="single-products">
							<div class="productinfo text-center">
								<img src="{{URL::to($v_manufacture_by_product->product_image)}}" style="height: 150px" alt="" />
								<h2>{{$v_manufacture_by_product->product_price}} Tk</h2>								
								<p>{{$v_manufacture_by_product->product_name}}</p>
								<a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
							</div>
							<div class="product-overlay">
								<div class="overlay-content">
									<h2>{{$v_manufacture_by_product->product_price}} Tk</h2>
									<p>{{$v_manufacture_by_product->product_name}}</p>
									<a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
								</div>
							</div>
					 </div>
					<div class="choose">
						<ul class="nav nav-pills nav-justified">
							<li><a href="#"><i class="fa fa-plus-square"></i>{{$v_manufacture_by_product->manufacture_name}}</a></li>
							<li><a href="{{URL::to('/view_product/'.$v_manufacture_by_product->product_id)}}"><i class="fa fa-plus-square"></i>View Product</a></li>
						</ul>
					</div>
				 </div>
				</div>
										
			<?php } ?>			
					</div><!--features_items-->
					
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="height: 200px; width: 170px;" src="{{URL::to('frontend/images/home/9caebbdd5_114042.jpg')}}" alt=""/>
													<h2>75 TK</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="height: 200px; width: 170px;" src="{{URL::to('frontend/images/home/imgrok0610_16264.GIF')}}" alt="" height="200px;" width="170px;" />
													<h2>80 TK</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="height: 200px; width: 170px;" src="{{URL::to('frontend/images/home/paradoxicalSazid.jpg')}}" alt="" />
													<h2>230 TK</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
								<div class="item">	
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="height: 200px; width: 170px;" src="{{URL::to('frontend/images/home/pride.jpg')}}" alt="" />
													<h2>120 TK</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="height: 200px; width: 170px;" src="{{URL::to('frontend/images/home/rokimg_20150224_96670.gif')}}" alt="" />
													<h2>60 TK</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
													<img style="height: 200px; width: 170px;" src="{{URL::to('frontend/images/home/68cb707d2_1354.jpg')}}" alt="" />
													<h2>56 TK</h2>
													<p>Easy Polo Black Edition</p>
													<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>			
						</div>
					</div><!--/recommended_items-->

@endsection