@extends('admin_layout')
@section('admin_content')

<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a> 
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="#">Tables</a></li>
			</ul>
			<p class="alert-success">
				<?php
				$message=Session::get('message');
				if ($message) {

					echo $message;
					Session::put('message',null);
				}

				?>
			</p>

			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon user"></i><span class="break"></span>All Cards</h2>
						
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>Card Number</th>
								  <th>Card Balance</th>
								  <th>Status</th>
								  <th>Actions</th>
							  </tr>
						  </thead>

						@foreach($cards as $v_card)     
						  <tbody>
							<tr>
								<td class="center">{{ $v_card->number }}</td>
								<td class="center">{{ $v_card->balance }}</td>

								<td class="center">
									@if($v_card->status==1)
									    <span class="label label-success">Active</span>
									@else
										<span class="label label-danger">Unactive</span>

									@endif

								</td>

								<td class="center">

									@if($v_card->status==1)
								        <a class="btn btn-danger" href="{{URL::to('/unactive_card/'.$v_card->id)}}">
										<i class="halflings-icon white thumbs-down"></i>  
									</a>
									@else
									<a class="btn btn-success" href="{{URL::to('/active_card/'.$v_card->id)}}">
										<i class="halflings-icon white thumbs-up"></i>  
									</a>
									@endif

								</td>
							</tr>					
						  </tbody>

						  @endforeach
					  </table>            
					</div>
				</div><!--/span
			
			</div><!--/row-->

@endsection