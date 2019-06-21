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
<body style="background:#CDC4BB; ">

<div class="container">     
  <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
					  <h2><i class="halflings-icon edit"></i><span class="break"></span>Add Branch Admin
					  	<a href="{{URL::to('all-branch-admin')}}" class="btn btn-danger pull-right" style="margin-right: 60px;">All Branch Admin</a>
					  </h2>
					  	
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

					<div class="box-content" style="margin-top: 45px;">
						<form class="form-horizontal" action="{{ url('/update-branch-admin/'.$edit->id) }}" method="post" enctype="multipart/form-data">
							{{ csrf_field() }}	

						  <fieldset>
						    <div class="col-sm-2""></div>					
						    <div class=" col-sm-8">	
							<div class="control-group">
							  <label class="control-label" for="name">Name</label>
							  <div class="controls">
								<input type="text" class="form-control" name="name" value="{{$edit->name}}">
							  </div>
							</div>

							<div class="form-group">
	                        	<img id="image" src="#" />
	                            <label for="exampleInputPassword11">Photo</label>
	                            <input type="file"  name="photo" accept="image/*" onchange="readURL(this);">
                            </div>

                            <div class="form-group">
                            	<img src="{{ URL::to($edit->photo) }}"  style="height: 80px; width: 80px;">
                                <input type="hidden" name="old_photo" value="{{ $edit->photo }}">
                            </div>

							<div class="control-group">
							  <label class="control-label" for="photo">Email</label>
							  <div class="controls">
								<input type="email" class="form-control" name="email" value="{{$edit->email}}">
							  </div>
							</div>


							<div class="control-group">
							  <label class="control-label" for="mobile_number">Mobile Number</label>
							  <div class="controls">
								<input type="text" class="form-control" name="mobile_number" value="{{$edit->mobile_number}}">
							  </div>
							</div>
							<div class="control-group">
							  <div class="controls">
								<input type="submit" class="btn btn-success pull-right" value="Submit">
							  </div>
							</div>
							</div>								         
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->
</div>



<script type="text/javascript">
	function readURL(input) {
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function (e) {
              $('#image')
                  .attr('src', e.target.result)
                  .width(80)
                  .height(80);
          };
          reader.readAsDataURL(input.files[0]);
      }
   }
</script>


</body>
</html>
