<!--  --><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Contest</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	 
	 	<div style="padding: 50px">
	 <h1>Edit Contest:</h1> 
	 <div class="card-body"> 
	 <form method="post" enctype="multipart/form-data"> 
	  @csrf
	 <input type="hidden" name="_token" value="{{csrf_token()}}">
	  <table>
		<tr>
			<td>Title</td>
			<td><input type="text" name="title" value="{{$buyerContest['title']}}"></td>
		</tr>
		<tr>
			<td>File</td>
			<td><input type="file" name="contest_file"  value="{{$buyerContest['contest_file']}}"></td>
		</tr>
		<tr>
			<td>Pricing</td>
			<td><input type="number" name="price" value="{{$buyerContest['price']}}"></td>
		</tr>
		<tr>
			<td>Date Time</td>
			<td><input type="date" id="birthdaytime" name="time" value="{{$buyerContest['time']}}"></td>
		</tr>
		<tr>
			<td>Discription</td>
			<td><textarea name="description" value="{{$buyerContest['description']}}"></textarea></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" name="Submit" value="Update">
			</td>
		</tr>
	</table>
	</form><hr>
	@foreach($errors->all() as $err)
		{{$err}} <br>
	@endforeach
	</div>
</div>
</div>


 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>