<!--  --><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bd Freelancer</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	 <a class="btn btn-primary" href="/admin">Home</a>
	 <center>
	 	<div style="padding: 50px">
	 <h1>Create Blog :</h1> 
	 
	 <form method="post" enctype="multipart/form-data"> 
	 <input type="hidden" name="_token" value="{{csrf_token()}}">
	<table>
		<tr>
			<tr>
			<td>Title</td>
			<td><input type="text" name="title" value="{{old('title')}}"></td>
		</tr>
		<tr>
			<td>Category</td>
			<td><input type="text" name="category" value="{{old('category')}}"></td>
		</tr>
			<td>Image</td>
			<td><input type="file" name="image" ></td>
		</tr>
		<tr>
			<td>Description</td>
			<td><input type="text" name="discription" value="{{old('discription')}}"></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" name="Submit" value="Create">
			</td>
		</tr>
	</table>
	  @foreach ($errors->all() as $error)
     <div class="btn btn-danger">{{$error}}</div> <br>
    @endforeach   
	</form></center><hr>
</div>
</div>
<div class="container">
  <div class="row">
    @foreach($blogs as $blog)
    <div class="padding" style="padding: 10px">
	<div class="card" style="width: 18rem;" >
  <img  class="card-img-top" src="{{('/protfolio_img/'.$blog->image)}}" height="150px" width="30px;" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$blog->title}}</h5>
    <p class="card-text">{{$blog->category}}</p>
    <a class="btn btn-primary" href="/blog/details/{{$blog->id}}">Details</a>
   
  </div>
</div>
</div>
@endforeach
  </div>
</div>
 </div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
