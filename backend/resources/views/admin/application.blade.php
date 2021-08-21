<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aplication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h3>Aplication list</h3>
    <h3><a class="btn btn-primary" href="/admin">Home</a></h3>
<div class="container ">
<table class="table table-bordered table-striped table-hover">
  <tr>
      
      <th>User Name</th>
      <th>Type</th>
      <th>Sub</th>
      <th>Action</th>
  </tr>
   @foreach ($users as $user) 
  <tr class="info">
     <td>{{$user->username}}</td>
     @if($user->type =='2')
            <td>Manager</td>
            @elseif($user->type =='3')
            <td>Buyer</td>
            @else
            <td>Seller</td>
            @endif
        <td>{{$user->sub}}</td>
            <td>
                 <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#">Approve</button>
                
             <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#cancelleModal">Cancel</button>
            </td>
  </tr>
  @endforeach
</table>
</div><br /><br />
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">User Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"><a style="text-decoration: none; color: white" href="">Delete</a></button>
      </div>
    </div>
  </div>
</div>
<!-- cancel modal -->
<div class="modal fade" id="cancelleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Leave Aplication</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <h3>Are you sure...</h3>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-danger"><a style="text-decoration: none; color: white" href="">Cancel Confirm</a></button>
      </div>
    </div>
  </div>
</div>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>