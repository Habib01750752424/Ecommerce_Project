<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Home | E-Shopping</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
</head><!--/head-->

<?php
$review_email = Session::get('email');
    //echo $review_email;
?>


<body>

<div class="container" style="margin-top: 30px;margin-right: 20px;">

    <div class="row">
        <div class="col-sm-10">
          <h1 style="text-align: center;">Review Rating Details page</h1>
          <a href="{{URL::to('/')}}" class="pull-right btn btn-danger">Back To Home</a>
			

				<?php
    $review_id=Session::get('review_id');
    $rating_review = DB::table('tbl_review')->where('review_id', $review_id)->orderBy('id', 'DESC')->get();
    //echo $review;
    $count = count($rating_review);

    $i = 0;
    foreach ($rating_review as $arating_review) {
    $i = $i+$arating_review->rating_type;
    //$name = $arating_review->name;
    }


   // }
    //foreach ($review_id_and_email as $areview_id_and_email) {
        //$id = $areview_id_and_email->id;
   // }
    //$tbl_review_count = count($tbl_review_id);
    
    
    

    
    ?>
    <?php
    $m = 0;
    foreach ($rating_review as $arating_review) {
     $m++;
     echo $m.'.';
    $name = $arating_review->name;
    $reviews = $arating_review->review;
    $rating_type = $arating_review->rating_type;
    $review_date = $arating_review->created_at;
    ?>
    Name:<li class="list-group-item" style="width: 250px">{{$name}}</li>
    {{$review_date}}<br>
    Rating:
    {{$rating_type}}
 <?php
    if ($rating_type>0 && $rating_type<=1){
        ?>
     <img src="{{URL::to('frontend/images/home/1.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating_type>1 && $rating_type<=2){
        ?>
     <img src="{{URL::to('frontend/images/home/2.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating_type>2 && $rating_type<=3){
        ?>
     <img src="{{URL::to('frontend/images/home/3.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating_type>3 && $rating_type<=4){
    ?>
     <img src="{{URL::to('frontend/images/home/4.jpg')}}" alt="" height="30" width="100" />
    <?php
    }elseif ($rating_type>4 && $rating_type<=5){
        ?>
     <img src="{{URL::to('frontend/images/home/5.jpg')}}" alt="" height="30" width="100" />
    <?php
    }
?>
<br>
    Review:<li class="list-group-item">{{$reviews}}</li>
    <?php


    }

     ?>


 <?php
 if ($count > 0) {
    ?>Average Rating This Product:<?php
     $rating = $i/$count;
 }else{
    $rating = $i/1;
    ?>
    <br>
    <?php
    ?><h2 style="text-align: center;color: #8E1616;margin-top: 70px;"><?php echo "Sorry !! There is no available review and rating in this product";?><h2><?php
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
            
        </div>
        
    </div>
</div>

    

  
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
</body>
</html>
