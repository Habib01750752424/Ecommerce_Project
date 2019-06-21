@extends('admin_layout')
@section('admin_content')
			
			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Card</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
					  <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Card</h2>	
					</div>
					<p class="alert-success">
						<?php
						$message=Session::get('message');
						if ($message) {

							echo $message;
							Session::put('message',null);
						}

						?>
						</p>


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
					

					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/save-card') }}" method="post">
							{{ csrf_field() }}	

						  <fieldset>							
							<div class="control-group">
							  <label class="control-label" for="date01">Card Number</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="number">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Card Balance</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="balance">
							  </div>
							</div>							         
							
							<div class="control-group hidden-phone">
							  <label class="control-label" for="textarea2">Status</label>
							  <div class="controls">
							  <input type="checkbox" name="status" value="1">
							  </div>
							</div>
							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Add Card </button>
							  <button type="reset" class="btn btn-danger">Reset</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection

