<!doctype html>
<html class="no-js h-100" lang="en">
@include('bootplant::inc.html-header')
<body class="h-100">
  <div class="container-fluid icon-sidebar-nav h-100">
    <div class="row h-100">
      <main class="main-content col px-0">
        <div class="main-content-container container-fluid px-4 my-auto h-100">
          <div class="row no-gutters h-100">
            <div class="col-lg-3 col-md-5 auth-form mx-auto my-auto">
              <div class="card">
                <div class="card-body">
                  <img class="auth-form__logo d-table mx-auto mb-3" src="{{asset("bootplant/images/logo".(config('bootplant.app_color') ? '-'.config('bootplant.app_color') : '').".svg")}}">
                  <h5 class="auth-form__title text-center mb-4">Accedi</h5>
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" name="email" aria-describedby="emailHelp" placeholder="Indirizzo Email">
                      @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                      @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                      </span>
                      @endif
                    </div>
                    <div class="form-group mb-3 d-table mx-auto">
                      <div class="custom-control custom-checkbox mb-1">
                        <input type="checkbox" class="custom-control-input" id="remember">
                        <label class="custom-control-label" for="remember" {{ old('remember') ? 'checked' : '' }}>Ricordami.</label>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-pill btn-accent d-table mx-auto">Accedi</button>
                  </form>
                </div>
              </div>
              <div class="auth-form__meta text-center mt-4">
                &copy; {{date('Y')}} {{config('bootplant.app_copyrights')}} - <a href="{{config('bootplant.app_copyrights_link')}}" target="_blank">{{config('bootplant.app_copyrights_txt')}}</a>
              </div>
                {{-- <div class="auth-form__meta d-flex mt-4">
                  <a href="forgot-password.html">Forgot your password?</a>
                  <a class="ml-auto" href="register.html">Create new account?</a>
                </div> --}}
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>
    @include('bootplant::inc.html-footer-scripts')
  </body>
  </html>
