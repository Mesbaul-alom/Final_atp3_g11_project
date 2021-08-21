<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pending Users</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
  <div class="container">
<div class="main-body">

      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a class=" btn btn-primary" style="text-decoration: none; color: white;" href="/admin">Home</a></li>
        </ol>
      </nav>
      <!-- /Breadcrumb -->

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 gutters-sm">
        @foreach($users as $user)
       @if($user->active =='0')
        <div class="col mb-3">
          <div class="card">
            <div class="card-body text-center">
              <img src="{{('/protfolio_img/'.$user->image)}}" style="width:100px;margin-top:-65px" alt="User" class="img-fluid img-thumbnail rounded-circle border-0 mb-3">
              <h5 class="card-title">{{$user->username}}</h5>
              <p class="text-secondary mb-1">{{$user->email}}</p>
            </div>
            <div class="card-footer">
              <button class="btn btn-light btn-sm bg-white has-icon btn-block" type="button"><i class="material-icons"></i></button>
              <button class="btn btn-light btn-sm bg-white has-icon ml-2" type="button"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg></button>
               <a style="text-decoration: none;" href="/Buyer/details/{{$user->id}}">Details</a><hr>
                <a style="text-decoration: none;" class="btn btn-primary" href="/user/approve/{{$user->id}}">Aprove</a>
            </div>
          </div>
   
        </div>
                 @endif
 @endforeach
          </div>
        </div>
      </div>
    
</body>
</html>