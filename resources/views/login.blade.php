<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>

    <div class="container">
      <div class="card mt-5 w-50 m-auto"> 
        {{-- ใช้ m-auto เพื่อจัดให้อยู่กึ่งกลาง --}}
        <h1 class="mx-3">Login System</h1>
        <div class="card-body">
          <form action="{{ url('login') }}" method="POST">
          @csrf 
            <div class="mb-3">
              <label for="exampleFormControlInput1" class="form-label">Email address</label>
              <input type="text" class="form-control" id="exampleFormControlInput1" name="email" value="{{ old('email') }}">
              @error('email')
              <div class="invalid-feedback d-block"> {{ $errors->first('email') }} </div>
              @enderror
            </div>
            
            <div class="mb-3">
              <label for="passwordLable" class="form-label">Password</label>
              <input type="password" class="form-control" id="passwordLabel" name="password" value="">
              @error('password')
              <div class="invalid-feedback d-block"> {{ $errors->first('password') }} </div>
              @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Login</button>
          </form>
        </div>
        </div>
      </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>