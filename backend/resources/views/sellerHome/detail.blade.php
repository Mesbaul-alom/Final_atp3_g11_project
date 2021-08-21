<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>

.detalil-img{
    height: 400px;
}
</style>
</head>
<body>
<div class="container">
   <div class="row">
       <div class="col-sm-6">
       
       </div>
       <div class="col-sm-6">
           <a href="/sellerHome">Go Back</a>
       <h2>{{$buyer['title']}}</h2>
       <h3>Price : {{$buyer['price']}}</h3>
       <h4>Details: {{$buyer['description']}}</h4>
       <h4>category: {{$buyer['time']}}</h4>
       <br><br>
       <form action="/add_to_cart" method="POST">
           @csrf
           <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="product_id" value={{$buyer->id}}>
       <button class="btn btn-primary">Bid request</button>
       </form>
       <br><br>
       
    </div>
   </div>
</div>
</body>
</html>
