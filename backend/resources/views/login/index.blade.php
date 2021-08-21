<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   <!--Made with love by Mutiullah Samim -->
	<!--Bootsrap 4 CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    
    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<!--Custom styles-->
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
				<div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div>
			</div>
			<div class="card-body">
				<form method="post">
					{{-- @csrf --}}
		           {{-- {{csrf_field()}} --}}
		         <input type="hidden" name="_token" value="{{csrf_token()}}">

				
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" name="username" value="{{old('username')}}" class="form-control" placeholder="username" >
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" value="{{old('password')}}"class="form-control" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" name="Submit" value="submit" class="btn float-right login_btn">
					</div>
				</form>
				<br>
	{{session('msg')}}
	<br>
	@foreach ($errors->all() as $error)
		{{$error}} <br>
	@endforeach
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a style="color:blue " href="/register">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html><!--  <!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
	<form method="post">
		{{-- @csrf --}}
		{{-- {{csrf_field()}} --}}
		<input type="hidden" name="_token" value="{{csrf_token()}}">
	<table>
		<tr>
			<td>Name</td>
			<td><input type="text" name="uname" value="{{old('uname')}}"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password" value="{{old('password')}}"></td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="submit" name="Submit" value="submit">
			<a href="/register"> Signup</a>
			</td>
		</tr>
	</table>
	</form>
	
	<br>
	{{session('msg')}}
	<br>
	@foreach ($errors->all() as $error)
		{{$error}} <br>
	@endforeach
</body>
</html>