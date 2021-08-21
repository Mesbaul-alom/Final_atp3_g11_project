<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Project</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div style="padding: 50px">
<h1>ProjectList :</h1> 
<hr>
</div>
</div>
<div class="container">
  <div class="row">
    @foreach($buyers as $buyer)
    <div class="padding" style="padding: 10px">
	<div class="card" style="width: 18rem;" >
  <!-- <img  class="card-img-top" src="{{('protfolio_img/'.$buyer['contest_file'])}}" height="150px" width="30px;" alt="Card image cap"> -->
  <div class="card-body">
    <h5 class="card-title">{{$buyer['title']}}</h5>
    <p class="card-text">{{$buyer['discription']}}</p>
    <div class="d-grid gap-4">
    <a class="btn btn-primary btn-sm" href="/Manager/project/list/{{$buyer['id']}}">Buyer Details</a>
    <a class="btn btn-outline-danger btn-sm" href="/Manager/project/delete/{{$buyer['id']}}">Project Delete</a>
    <a class="btn btn-outline-success btn-sm"  href="{{url('/download',$buyer['contest_file'])}}">Project Download</a>
    <!-- <a class="btn btn-primary btn-sm" href="/manager/contest/list/{{$buyer['buyer_id']}}">Buyer Edit</a> -->
    </div>
    <!--  a href="/user/details/>{{$buyer['buyer_id']}}"> Details </a>-->
  </div>
</div>
</div>
@endforeach
  </div>
</div>
 </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>