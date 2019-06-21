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
<?php 
$product_id = Session::get('review_id');
?>
<div class="container">
  <h2>Review Rating Page</h2>
  <form action="{{ url('/insert-review/'.$product_id) }}" method="post">
	{{csrf_field()}}

  	{{-- <div class="form-group">
      <input type="text" name="name" placeholder="Your Name" style="width: 300px;" />
    </div>
    <div class="form-group">
      <input type="email" name="email" placeholder="Email Address" style="width: 300px;" />
    </div> --}}
    <b>Review:</b>
    <div class="form-group">
      <textarea name="review" style="height: 200px; width: 700px;"></textarea>
    </div>
    <div class="form-group">
      <b>Rating:</b>
      <select name="rating_type" class="form-control" style="width: 300px;">
    	<option disabled="" selected="">Select One</option>
    	<option value="1">1 Star</option>
    	<option value="2">2 Star</option>
    	<option value="3">3 Star</option>
    	<option value="4">4 Star</option>
    	<option value="5">5 Star</option>
      </select>
    </div>


      <button type="submit" class="btn btn-danger">Submit</button>

  
  </form>
</div>

</body>
</html>