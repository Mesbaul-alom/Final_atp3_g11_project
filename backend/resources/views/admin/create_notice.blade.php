<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bd Freelancer</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    
    <h3><a class="btn btn-primary" href="/admin">Home</a></h3>
    <div class="container">
      <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 400px;">
          <h4 class="card-title mt-3 text-center">Create Notice</h4>
          <form method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group input-group">
              <div class="input-group-prepend">
                <span class="input-group-text"> <i class="fa fa-building"></i> </span>
              </div>
              <select name="type" class="form-control">
                <option selected="">type</option>
                <option value="2">manager</option>
                <option value="3">Buyer</option>
                <option value="4">seller</option>
              </select>
              </div> <!-- form-group end.// -->
              <div class="form-group input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text"> <i class="fa fa-notice"></i> </span>
                </div>
                <input name="notice" class="form-control" value="{{old('notice')}}" placeholder="Written notice..." type="text">
                </div> <!-- form-group// -->
                
                <div class="form-group">
                  <button type="submit" value="submit" name="Submit" class="btn btn-primary btn-block"> Create Notice  </button>
                  </div> <!-- form-group// -->
                </form>
              </article>
              </div> <!-- card.// -->
              <br>
              
            </div>
            <h3>Notice list</h3>
            
            <div class="container ">
              <table class="table table-bordered table-striped table-hover">
                <tr>
                  
                  
                  <th> Type</th>
                  <th>Notice</th>
                  <th>Action</th>
                </tr>
                @foreach($notices as $notice)
                <tr class="info">
                  
                  @if($notice->type =='2')
                  <td>Manager</td>
                  @elseif($notice->type =='3')
                  <td>Buyer</td>
                  @else
                  <td>Seller</td>
                  @endif
                  <td>{{$notice->notice}}</td>
                  <td>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                  </td>
                </tr>
                @endforeach
              </table>
            </div><br /><br />
            
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cancel Notice</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <h3>Are you sure...</h3>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"><a style="text-decoration: none; color: white" href="/notice/delete/{{$notice->id}}">Delete</a></button>
                  </div>
                </div>
              </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
            <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
            <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          </body>
        </html>