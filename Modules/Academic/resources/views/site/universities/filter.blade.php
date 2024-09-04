<x-site-layout :title="__('Program Filter Results')" bodyTag="serach">

    <x-banner :title="__('Program Filter Results')"></x-banner>

    <div class="search-area position-relative my-5">
        <div class="container">
            <div class="p-3">
                @if($program)
                    <div class="d-md-flex justify-content-between">
                        <h6>
                            {{__('Result Found')}} :
                            <strong class="text-warning">({{$program->universities->count()}})</strong> {{__('University')}}
                        </h6>
                        <a href="{{route('program.download_PDF' , $program->id)}}" class="btn btn-outline-primary">{{__('Export')}} <i class="bi bi-file-pdf-fill mx-1"></i
                            ></a>
                    </div>

                    @foreach($program->universities as $university)
                        <div class="shadow p-3 program-box mt-4">
                            @if($level)
                                <span class="bg-light p-2">{{$level->name}}</span>
                            @endif
                            @foreach($program->lang as $item)
                                <img alt="{{$item}}" class="mx-1" style="height: 25px"
                                     src="{{asset('images/flags/' . $item .'.svg')}}"/>
                            @endforeach
                            <div
                                class="d-md-flex justify-content-between align-items-center mt-4"
                            >
                                <div>
                                    <h2 class="h3">{{$program->name }}</h2>

                                    <div
                                        class="d-flex justify-content-start align-items-center"
                                    >
                                        <img src="{{$university->logo_link}}" alt="{{ $university->title }}"/>
                                        <h3 class="mx-1 h5">{{ $university->title }}</h3>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="mx-1">
                                        <p>{{__('University Price Start From')}}</p>
                                    </div>
                                    <div class="mx-2">
                                        <del class="text-danger">{{$university->disc_price}} $</del>
                                        <p class="mb-0 text-success fw-bold">{{$university->price}} $</p>
                                    </div>
                                    @guest
                                        <a href="{{route('register')}}" class="btn btn-primary">{{__('Apply Now')}}</a>
                                    @else
                                        <a href="https://web.whatsapp.com/send?phone={{$settings->get('whatsapp')}}"
                                           class="btn btn-primary">{{__('Contact Us')}}</a>
                                    @endguest

                                </div>
                            </div>
                        </div>
                    @endforeach

                @else
                    <h4>     {{__('Result Found')}} :
                        <strong class="text-warning">(0)</strong> {{__('University')}}</h4>
                @endif
            </div>

        </div>
    </div>


</x-site-layout>
