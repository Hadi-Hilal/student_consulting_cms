<x-site-layout :title="__('Verify Email')" bodyTag="reset">
    <div class="container">
        <div class="card-shadow p-3 m-5">
            <div class="mx-auto w-md-50 w-100">
                <h1 class="text-center fw-bold h3">{{__('Verify Email')}}</h1>
                <p class="text-center">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}

                </p>
                @if (session('status') == 'verification-link-sent')
                    <div class="text-center text-success mb-3">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                            class="btn btn-primary w-100 p-2 fw-bold">   {{ __('Resend Verification Email') }}</button>
                </form>
            </div>
        </div>
    </div>
</x-site-layout>
