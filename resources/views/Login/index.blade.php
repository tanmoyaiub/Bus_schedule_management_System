<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>
    <table>
    @foreach ($errors->all() as $error)
        {{$error}} <br>   
    @endforeach
    <form method="post" >
        @csrf
        <tr>
            <td>Email:</td>
            <td><input type="email" name="email" > </td>
        <tr>
        <tr>
            <td>Password:</td>
            <td><input type="password" name="password" ></td>
        <tr>
        <tr>
            <td></td>
            <td><input type="submit" name="submit" value="Submit" ></td>
        <tr>
        
    </form>
    </table>

    <h3>{{session('msg')}}</h3>
</body>
</html>

