<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  {{-- For Sweetalert Link --}}
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    {{-- End --}}
</head>
<body style="background:#CDC4BB; ">



<?php
function current_url()
{
  $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  $validURL = str_replace("&", "&amp;", $url);
  return $validURL;
}

$CurrentUrl = current_url();
//if ($CurrentUrl  == "127.0.0.1:8000/all-branch-admin") {
 // echo "Current URL is:".current_url();
//}else{
 // echo "Sorry";
//}
?>



<div class="container">
<?php
if ($CurrentUrl  == "127.0.0.1:8000/all-branch-admin")
{
  ?><h2>Super Admin Area <?php

    ?>
  <a href="{{URL::to('/create-branch')}}" class="pull-right btn btn-primary">Add New Branch Admin</a>
  <?php
}else
{
  ?><h2>Branch Admin Area <?php
}
?>
</h2> 

<p class="alert-success">
    <?php
    $message=Session::get('message');
    if ($message) {

      echo $message;
      Session::put('message',null);
    }

    ?>
</p>

  <table class="table">
    <thead>
      <tr>
        <th>Name</th>
        <th>Photo</th>
        <th>Email</th>
        <th>Mobile Number</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      
<?php 
$branch_admins=DB::table('branch_admins')->orderBy('id', 'DESC')->get();

foreach ($branch_admins as $a_branch_admin) {

?>

      <tr>
        <td>{{$a_branch_admin->name}}</td>
        <td>
          <img src="{{URL::to($a_branch_admin->photo)}}" style="height: 50px" width="50px" alt="" />
        </td>
        <td>{{$a_branch_admin->email}}</td>
        <td>{{$a_branch_admin->mobile_number}}</td>
        <td> 

<?php
if ($CurrentUrl  == "127.0.0.1:8000/all-branch-admin"){
  ?>
  <a class="btn btn-danger" href="{{URL::to('/edit-branch-admin/'.$a_branch_admin->id)}}">Edit
  </a>
  <a class="btn btn-danger" href="{{URL::to('/delete-branch-admin/'.$a_branch_admin->id)}}" id="">Delete
  </a>
  <?php
}else{
  ?>
  <a class="btn btn-danger" href="{{URL::to('/login-branch-admin/'.$a_branch_admin->id)}}">Login
  </a>
  <?php

}
?>
          
        </td>
      </tr>

<?php } ?>
    </tbody>
  </table>
{{-- Session::put('branch_admin_id',$a_branch_admin->id);
$BranchAdminIid = Session::get('branch_admin_id'); --}}


<?php
if ($CurrentUrl  == "127.0.0.1:8000/all-branch-admin")
{

  ?>
  <a href="{{URL::to('/dashboard')}}" class="pull-right btn btn-primary">Skip to Dashboard</a>
  <?php

}
?> 


  </div>

{{-- Sweetalert Message print code --}}
<script>
    $(document).on("click", "#delete", function(event) {
        event.preventDefault();
        var link = $(this).attr("href");
        swal({
            title: "Are you sure to delete?",
            text: "Once Deleted, This will be deleted Permanently!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if(willDelete) {
                window.location.href = link;
            } 
            else {
                swal("Safe Data!");
            }
        });
    });
</script>
{{-- End --}}
</body>
</html>
