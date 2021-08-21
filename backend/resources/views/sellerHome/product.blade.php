<html>
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
<style>
 img.slider-img{
   height: 400px;
 }
</style>
</head>
<body>
<div class="custom-product">
   
 
      </div>
      <div class="">
        <h3>Tredning Project</h3>
        @foreach($buyer as $item)
     
        <div class="trening-item">
          <a href="detail/{{$item['id']}}">
          <img class="trending-image" src="{{$item['gallery']}}">
          <div class="">
            <h3>{{$item['title']}}</h3>
          </div>
        </a>
        </div>
        @endforeach
      </div>
      </div>
</div>
</body>
</html>