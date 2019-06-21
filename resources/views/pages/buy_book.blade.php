<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body style="background-color: #ffcccc">



<div class="container"> 
  <div style="margin-top: 40px; border: 2px solid #fff; background-color: #fff;min-height: 300px;padding: 20px;">
    <h3>Thank You..For your request to purchase books..We had already Collect your details.We will contact you very soon and next week we will send you books whose books you had already purchased.</h3>
  </div>
  <a style="font-size: 30px; text-decoration: none; margin-top: 2px; float: right;" class="btn btn-success" href="{{URL::to('/user_profile')}}">Your Profile</a>
</div>

</body>
</html>