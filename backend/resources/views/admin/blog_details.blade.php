<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Protfolio Details</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
         <button class="btn btn-primary"><li class="breadcrumb-item"><a style="text-decoration: none;color:white" href="/admin">Home</a></li></button> 
        </ol>
      </nav>
	
	<div class="card" style="width: 18rem;" class="col-md-4" >
  <img  class="card-img-top" src="{{('/protfolio_img/'.$blog->image)}}" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title">{{$blog->title}}</h5>
    <p class="card-text">{{$blog->discription}}</p>
    <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
     <a class="btn btn-danger" href="/blog/delete/{{$blog->id}}">Delete</a>		
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Delete Blog</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      	<form method="post" enctype="multipart/form-data"> 
      	<input type="hidden" name="_token" value="{{csrf_token()}}">
      	<table>
		<tr>
			<tr>
			<td>Title</td>
			<td><input type="text" name="title" value="{{$blog->title}}"></td>
		</tr>
		<tr>
			<td>Category</td>
			<td><input type="text" name="category" value="{{$blog->category}}"></td>
		</tr>
			<td>Image</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td>Discription</td>
			<td><input type="text" name="discription" value="{{$blog->discription}}"></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" class="btn btn-primary" name="Submit" value="Update">
			</td>
		</tr>
	</table>
	 @foreach ($errors->all() as $error)
     <div class="btn btn-danger">{{$error}}</div> <br>
    @endforeach
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>