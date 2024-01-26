<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{asset('css/register.css')}}" rel="stylesheet">
</head>
<body>



@if(session('success'))
    <div class="alert alert-success">
         {{ session('success') }}
    </div>
@endif
<form  class="register-form" action="{{route('user.register')}}" method="post">
@csrf 
<h1 class="a11y-hidden">Login Form</h1>

</div>

<div>
    <label class="label-email">
    <select  name="role"> 
      <span class="required">Role</span>
      <option value="user">user</option>
    </select>
    </label>
  </div>


<div>
    <label class="label-email">
      <input type="text" class="text" name="name" placeholder="Name"  />
      <span class="required">Name</span>
      @if($errors->first('name'))
      <span style='color:red;'>{{$errors->first('name')}}</span>
     @endif 
    </label>
  </div>
  <div>
    <label class="label-email">
      <input type="email" class="text" name="email" placeholder="Email"  />
      <span class="required">Email</span>
      @if($errors->first('email'))
      <span style='color:red;'>{{$errors->first('email')}}</span>
     @endif 
    </label>
  </div>
  <input type="checkbox" name="show-password" class="show-password a11y-hidden" id="show-password" tabindex="3" />
  <label class="label-show-password" for="show-password">
    <span>Show Password</span>
    
  </label>
  <div>
    <label class="label-password">
      <input type="text" class="text" name="password" placeholder="Password"  />
      <span class="required">Password</span>
      @if($errors->first('password'))
      <span style='color:red;'>{{$errors->first('password')}}</span>
     @endif
    </label>
  </div>
  <input type="submit" value="Log In" />
  <div class="email">
    <a href="#">Forgot password?</a>
  </div>
  <div class="email">
    <a href="{{route('login')}}">Login</a>
  </div>
  <figure aria-hidden="true">
    <div class="person-body"></div>
    <div class="neck skin"></div>
    <div class="head skin">
      <div class="eyes"></div>
      <div class="mouth"></div>
    </div>
    <div class="hair"></div>
    <div class="ears"></div>
    <div class="shirt-1"></div>
    <div class="shirt-2"></div>
  </figure>
</form>
</body>
</html>