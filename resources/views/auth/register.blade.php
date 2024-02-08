<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <div class="content" style="width:50%;margin:auto;">

    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="mb-3">
          <label for="name" class="form-label">{{ __('Name') }}</label>
          <input type="text" name="name" class="form-control" id="exampleInputEmail1"   autofocus name="name" value="{{ old('name') }}">
          @error('name')
              <span class="text-danger">{{$message}}</span>
          @enderror
    
        </div>

        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">{{ __('Email Address') }}</label>
          <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   autofocus name="email" value="{{ old('email') }}">
          @error('email')
              <span class="text-danger">{{$message}}</span>
          @enderror
    
        </div>


        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">{{ __('Password') }}</label>
          <input name="password" type="password" class="form-control" id="exampleInputPassword1">
          @error('password')
          <span class="text-danger">{{$message}}</span>
      @enderror
        </div>

        <div class="mb-3">
          <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
          <input name="password_confirmation" id="password-confirm" type="password" class="form-control" autocomplete="new-password">
          @error('password_confirmation')
          <span class="text-danger">{{$message}}</span>
      @enderror
        </div>


        <button type="submit" class="btn btn-success"> {{ __('Register') }}</button>

       

      </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>