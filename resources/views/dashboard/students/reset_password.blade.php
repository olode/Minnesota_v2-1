@extends('dashboard.layouts.login')

@section('content')


<!-- style="background: center; background-size: cover; background-image: url('dashboard/app-assets/images/backgrounds/background-color.jpg') " -->
        <section  class="flexbox-container">
          <div class="col-12 d-flex align-items-center justify-content-center">
            <div class="col-md-4 col-10 box-shadow-2 p-0">
              <div class="card border-grey border-lighten-3 m-0">
                <div class="card-header border-0">
                  <div class="card-title text-center">
                    
                  </div>
                  <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2">
                    <span> استعادة كلمة المرور </span>
                  </h6>
                </div>
                <div class="card-content">
                  <div class="card-body">
                    <form class="form-horizontal form-simple" action="{{ route('password.email') }}" method="POST">
                      @csrf
                      <fieldset class="form-group position-relative has-icon-left">
                        <input type="email" class="form-control form-control-lg input-lg" id="user-password"
                        name="email" placeholder="أكتب البريد الإلكتروني" required>
                        <div class="form-control-position">
                          <i class="fa fa-envelope"></i> 
                        </div>
                      </fieldset>
                        @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                        @enderror 
                      <button type="submit" class="btn btn-danger btn-lg btn-block"> ارسال رابط استعادة كلمة المرور</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
 

@endsection