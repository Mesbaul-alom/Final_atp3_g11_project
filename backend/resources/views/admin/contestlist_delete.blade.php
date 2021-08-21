<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contest Delete</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<center>
  <form class="form-control" method="post">
    @csrf
	<div class="card" style="width: 18rem;" class="col-md-4" >
  <tr><td><img  class="card-img-top" src="{{('/protfolio_img/'.$contest['contest_file'])}}" alt="Card image cap"></td></tr>
  <div class="card-body">
    <tr>
        <td>Title</td>
        <td><h5 class="card-title">{{$contest['title']}}</h5></td>
    </tr>
    <tr>
        <td>Description</td>
        <td><p class="card-text">{{$contest['discription']}}</p></td>
    </tr>    
     <tr>
            <td><input type="submit" name="submit" value="Confirm delete"> </td>
     </tr>  

   
  </div>
</div>
</form> 
</center>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>