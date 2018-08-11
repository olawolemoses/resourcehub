<!doctype html>
<html lang="en">
<head>
    
    <title>Forgot Password</title>
    
    
</head>    
<body>
    <form method="POST" action="/admin-forgot">
        @csrf
        <label>Administrator Email</label>
        <input type="email" name="username" placeholder="Administrator Email">
          <input type="submit" value="Reset"  >
    </form>
    
    <div>
        @if($errors->any())
<h4>{{$errors->first()}}</h4>
@endif
    </div>
</body>    
</html>