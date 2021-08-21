<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
</head>
<body>
    <h3>User List</h3>
    <a href="/admin">Home</a>

    <table border="1">
        <tr>
            <td> ID </td>
            <td> Username </td>
            <td> Email </td>
            <td> Type </td>
            <td> phone </td>
             <td> Adress </td>
        </tr>
    
    @foreach ($users as $user) 
        <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->username}}</td>
            <td>{{$user->email}}</td>
             @if($user->type =='2')
            <td>Manager</td>
            @elseif($user->type =='3')
            <td>Buyer</td>
            @else
            <td>Seller</td>
            @endif
            
            <td>{{$user->phone}}</td>
            <td>{{$user->adress}}</td>
            <td>
        </tr>
    @endforeach
  
    </table>
    <a href="/pdf">Download</a>
</body>
</html>
