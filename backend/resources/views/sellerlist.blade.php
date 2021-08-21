<!DOCTYPE html>
<html lang="en">
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
    <title>seller List</title>
</head>
<body>
    <h3>User List</h3>
 
    <table border="1" width="100%">
        <tr>
            <td> ID </td>
            <td> Name </td>
            <td> Email </td>
            <td> Action </td>
        </tr>
   @foreach($users as $user)
       @if($user->type =='4')
        <tr>
        <td>{{$user->id}}</td>
        <td>{{$user->username}}</td>
        <td>{{$user->email}}</td>
            <td>
                <a href=""> Details </a> |
                <a href=""> Edit </a> |
                <a href=""> Delete </a> |
            </td>
        </tr>
        @endif
 @endforeach
    </table>
</body>
</html>