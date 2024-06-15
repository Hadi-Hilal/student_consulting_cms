<x-site-layout :title="__('Contact Us')" bodyTag="contact">
    <!--  ====================== Banner Area =============================  -->

    <x-banner :title="__('Contact Us')"></x-banner>
    <!--  ====================== Contact Area =============================  -->
    <div class="contact-area position-relative mb-7 mb-lg-10 mt-5 mt-md-8">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 order-md-1 mb-3">

                    <div class="shadow p-3">
                        <div class="mb-2">
                            <i class="bi bi-phone fs-6 text-primary"></i>
                            <span class="mx-1"><a class="text-secondary"
                                                  href="tel:{{$settings->get('phone')}}">{{$settings->get('phone')}}</a></span>
                        </div>

                        <div class="mb-2">
                            <i class="bi bi-mailbox fs-6 text-primary"></i>
                            <span class="mx-1"><a class="text-secondary"
                                                  href="mailto:{{$settings->get('email')}}">{{$settings->get('email')}}</a></span>
                        </div>

                        <div class="mb-2">
                            <i class="bi bi-pin-map fs-6 text-primary"></i>
                            <span class="mx-1"><a class="text-secondary">{{$settings->get('address')}} </a></span>
                        </div>


                        {!! $settings->get('map') !!}
                    </div>


                </div>
                <div class="col-md-5 order-md-12 mb-3">
                    <div class="contact-form-style p-3 shadow">
                        <h4>{{__('Have Any Questions?')}}</h4>
                        <p>{{__('Feel free to send your message')}}</p>
                        <form class="contact-form" method="POST" action="{{route('contact-us.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3 name-input">
                                        <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                               placeholder="{{__('Name')}}..">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 name-input">
                                        <input type="text" name="phone_number" value="{{old('phone_number')}}"
                                               class="form-control" placeholder="{{__('Phone')}}..">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 email-input">
                                        <input type="email" name="email" value="{{old('email')}}" class="form-control"
                                               placeholder="{{__('Email')}}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3 comment-input">
                                        <textarea class="form-control" name="message" rows="5"
                                                  placeholder="{{__('Message')}}">{{old('message')}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary text-white btn-lg">{{__('Send')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-site-layout>
