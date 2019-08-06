<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Login</title>
  <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/admin-login.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">

</head>

<body>

  {{--  <div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						Account Login
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="pass" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button class="login100-form-btn">
							Sign in
						</button>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Forgot
						</span>

						<a href="#" class="txt2 hov1">
							Username / Password?
						</a>
					</div>

					<div class="text-center">
						<span class="txt1">
							Create an account?
						</span>

						<a href="#" class="txt2 hov1">
							Sign up
						</a>
					</div>
				</form>
			</div>
		</div>
  </div>  --}}

  <div class="row d-flex align-self-center justify-content-center">
    <div class="col-md-8 align-self-center">
      <div class="card validate-form text-center ">
        <div class="card-header">
          <h1>Admin Login</h1>
        </div>
        <div class="card-body">
          <form action="{{ route('post_login') }}" role="form" method="POST" autocomplete="off">

            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
              <div class="col-md-6">
                <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="E-Mail"
                  required>
              </div>
            </div>
            <div class="form-group row">
              <label class="col-md-4 col-form-label text-md-right">Password</label>
              <div class="col-md-6">
                <input type="password" class="form-control" name="password" required>
              </div>
            </div>
            <div class="col-md-6 offset-md-4">
              
              {{ csrf_field() }}
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                        <a href="{{ route('get_all_admins') }}" class="btn btn-danger">Cancel</a>
                    </div>

          </form>
        </div>

      </div>
    </div>
  </div>


  <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
  <script src="{{ URL::asset('js/popper.min.js') }}"></script>
  <script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

</body>

</html>