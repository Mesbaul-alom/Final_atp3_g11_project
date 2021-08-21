<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User List</title>
</head>
<body >
    <h3>User List</h3>
 
    <table border="1" width="100%">
        <tr>
            <td> ID </td>
            <td> Name </td>
            <td> Email </td>
            <td> Action </td>
        </tr>
    @foreach($users as $user)
       @if($user->type =='3'  && $user->active=='1')
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