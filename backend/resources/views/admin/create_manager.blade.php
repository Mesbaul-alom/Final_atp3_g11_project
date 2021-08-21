<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">

<div class="container">
 <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
         <button class="btn btn-primary"><li class="breadcrumb-item"><a style="text-decoration: none;color:white" href="/admin">Home</a></li></button> 
        </ol>
      </nav>
<div class="card bg-light">
<article class="card-body mx-auto" style="max-width: 400px;">
	<h1>Create Manager</h1>
	<form method="post">
  <input type="hidden" name="_token" value="{{csrf_token()}}">
	<div class="form-group input-group">
		<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
		 </div>
        <input name="username" class="form-control" value="" placeholder="Full name" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
		 </div>
        <input name="email" class="form-control" value="" placeholder="Email address" type="S">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-phone"></i> </span>
		</div>
    	<input name="phone" class="form-control" placeholder="Phone number" type="text">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-adress"></i> </span>
		</div>
    	<input name="adress" class="form-control" placeholder="Adress" type="text">
    </div>
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input name="password" class="form-control" placeholder="Create password" type="password">
    </div> <!-- form-group// -->
    <div class="form-group input-group">
    	<div class="input-group-prepend">
		    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
		</div>
        <input class="form-control" placeholder="Repeat password" type="password">
    </div> <!-- form-group// -->                                      
    <div class="form-group">
        <button type="submit" value="submit" name="Submit" class="btn btn-primary btn-block"> Create Manager</button>
    </div> <!-- form-group// -->    
     @foreach ($errors->all() as $error)
     <div class="btn btn-danger">{{$error}}</div> <br>
    @endforeach                                                                    
</form>
</article>
</div> <!-- card.// -->

</div> 
<!--container end.//-->
