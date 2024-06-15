<x-site-layout :title="__('Register')" bodyTag="register">
    <div class="container">
        <div class="card-shadow p-3 m-5">
            <div class="mx-auto w-md-50 w-100">
                <h1 class="text-center fw-bold h3">{{__('Create A New Account')}}</h1>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-2">
                        <label for="name" class="form-label">{{__('Name')}}</label>
                        <input type="text" name="name" class="form-control" id="name" aria-describedby="name"
                               placeholder="Jone Doe" required>
                    </div>
                    <div class="mb-2">
                        <label for="mobile" class="form-label">{{__('Phone Number')}}</label>
                        <input type="text" name="mobile" class="form-control" id="mobile" aria-describedby="mobile"
                               placeholder="090534xxxxxxx" required>
                    </div>

                    <div class="mb-2">
                        <label for="email" class="form-label">{{__('Email')}}</label>
                        <input type="email" name="email" class="form-control" id="email"
                               placeholder="examble@examble.com" aria-describedby="emailHelp"
                               autocomplete="email" required>
                    </div>
                    <div class="mb-2">
                        <label for="password" class="form-label">{{__('Password')}}</label>
                        <input type="password" name="password" class="form-control" autocomplete="password"
                               placeholder="*************"
                               id="password" required>
                    </div>
                    <div class="mb-2">
                        <label for="password_confirmation" class="form-label">{{__('Password Confirmation')}}</label>
                        <input type="password" class="form-control" name="password_confirmation" required
                               placeholder="*************"
                               autocomplete="new-password" id="password_confirmation">
                    </div>
                    <div class="mb-2">
                        <p class="fw-bold">{{__('Already Have An Account?')}} <a class="mx-1"
                                                                                 href="{{route('login')}}">{{__('Sign In')}}</a>
                        </p>
                    </div>
                    <button type="submit"
                            class="btn btn-primary w-100 p-2 fw-bold">{{__('Create A New Account')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-site-layout>
