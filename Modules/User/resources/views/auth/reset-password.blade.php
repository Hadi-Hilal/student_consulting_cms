<x-site-layout :title="__('Reset Password')" bodyTag="reset">
    <div class="container">
        <div class="card-shadow p-3 m-5">
            <div class="mx-auto w-md-50 w-100">
                <h1 class="text-center fw-bold h3">{{__('Reset Password')}}</h1>

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="mb-3">
                        <label for="email" class="form-label">{{__('Email')}}</label>
                        <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp"
                               readonly value="{{$request->email}}"
                               autocomplete="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{__('Password')}}</label>
                        <input type="password" name="password" class="form-control" autocomplete="password"
                               id="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">{{__('Password Confirmation')}}</label>
                        <input type="password" class="form-control" name="password_confirmation" required
                               autocomplete="new-password" id="password_confirmation">
                    </div>
                    <button type="submit"
                            class="btn btn-primary w-100 p-2 fw-bold">{{__('Reset Password')}}</button>
                </form>
            </div>
        </div>
    </div>
</x-site-layout>
