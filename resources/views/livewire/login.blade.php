<div>
    <div class="container-scroller">
        <div class="container-fluid">
            <div class="row">
                <div class="content-wrapper full-page-wrapper d-flex align-items-center auth-pages">
                    <div class="card col-lg-4 mx-auto">
                        <div class="card-body px-5 py-5">
                            <h3 class="card-title text-left mb-3">Login</h3>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control p_input" placeholder="Username"
                                           wire:model="email">
                                    @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control p_input" placeholder="Password"
                                           wire:model="password">
                                    @error('password') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group d-flex align-items-center justify-content-between">
{{--                                    <div class="form-check"><label><input type="checkbox" class="form-check-input">Remember--}}
{{--                                            me</label></div>--}}
{{--                                    <a href="#" class="forgot-pass">Forgot password</a>--}}
                                </div>
                                <div class="text-center">
                                    <a href="#" class="btn btn-primary btn-block enter-btn"
                                            wire:click="authenticate">LOG IN
                                    </a>
                                </div>
                                {{--                                <p class="Or-login-with my-3">Or login with</p>--}}
                                {{--                                <a href="#" class="facebook-login btn btn-facebook btn-block">Sign in with Facebook</a>--}}
                                {{--                                <a href="#" class="google-login btn btn-google btn-block">Sign in with Google+</a>--}}
                                {{--                                <a href="#" class="google-login btn btn-create-account btn-block">Create An Account</a>--}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
