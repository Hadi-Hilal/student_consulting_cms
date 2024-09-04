<x-site-layout :title="__('Home')" bodyTag="home">

    <div class="banner-area my-1 p-5 position-relative"
         style=" background-image: url({{asset('storage/'. $settings->get('home_img')) }}); height: 600px">
        <div class="overlay"></div>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="text py-3">
                            <h1 class="w-100 w-lg-75 text-white">
                                {{$seo->get('main_title')}}
                            </h1>
                            <a href="https://web.whatsapp.com/send?phone={{$settings->get('whatsapp')}}" target="_blank"
                               class="btn btn-primary my-3 d-none d-md-block w-25">
                                {{__('Contact Us')}} <i class="bi bi-whatsapp mx-1"></i> </a>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="position-relative">
                            <form action="{{route('program.filter')}}" method="GET">
                                <h2><i class="bi bi-bank mx-1"></i> {{__(__('Search In Universities'))}}</h2>

                                <div class="mb-2">
                                    <label for="level mb-1">{{__('Program Levels')}}</label>
                                    <select name="level" class="form-select mb-1 search-select"
                                            aria-label="Default select example">
                                        @foreach($levels as $level)
                                            <option value="{{$level->id}}">{{$level->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-2">
                                    <label for="level mb-1">{{__('University Programs')}}</label>
                                    <select name="program" class="form-select mb-1 search-select"
                                            aria-label="Default select example">
                                        @foreach($programs as $program)
                                            <option value="{{$program->id}}">{{$program->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-primary w-100">{{__('Search Now')}} <i
                                        class="bi bi-search mx-1"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <section class="statistics mt-5">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <h3>{{$publicUniversityCount}} <span class="text-primary">+</span></h3>
                        <p>{{__('Public University')}}</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <h3>{{$privateUniversityCount}} <span class="text-primary">+</span></h3>
                        <p>{{__('Private University')}}</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <h3>{{$programs->count()}} <span class="text-primary">+</span></h3>
                        <p>{{__('University Programs')}}</p>
                    </div>
                </div>
                <div class="col-6 col-lg-3">
                    <div class="box">
                        <h3>5 <span class="text-primary">+</span></h3>
                        <p>{{__('Years Of Experience')}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about-sc my-7 my-lg-10">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-12 mb-3 text-center order-lg-0 order-1">
                    <div class="">
                        {!! $settings->get('about_us_video') !!}
                    </div>
                </div>
                <div class="col-lg-6 col-12 mb-3 order-lg-1 order-0">
                    <div class="section-title mb-3">
                        <h3 class="sepator2 m-0">{{__('About Us')}}</h3>
                    </div>
                    <p class="text-secondary fs-5">
                        {{$seo->get('about_us')}}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--  ====================== University Programs Area =============================  -->

    <div class="team-area my-7 my-lg-10">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center">
                <div class="section-title mb-3">
                    <h3 class="sepator2 m-0">{{__('University Programs')}}</h3>
                </div>
                <a href="{{route("programs.index")}}" class="view-all">{{__('View All')}}</a>
            </div>
            <div class="owl-carousel">
                @foreach($programs as $program)

                    <div class="item">
                        <x-program-card :program="$program"></x-program-card>
                    </div>

                @endforeach
            </div>

        </div>
    </div>


    <!--  ====================== University Area =============================  -->

    <div class="university-area my-7 my-lg-10">
        <div class="container">
            <div class="d-md-flex justify-content-between align-items-center">
                <div class="section-title mb-3">
                    <h3 class="sepator2 m-0">{{__('Universities')}}</h3>
                </div>
                <a href="" class="view-all">{{__('View All')}}</a>
            </div>
            <div class="owl-carousel">
                @foreach($universities as $item)

                    <div class="item">
                        <x-university-card :university="$item"></x-university-card>
                    </div>

                @endforeach
            </div>

        </div>
    </div>

    <!--  ====================== University Area =============================  -->

    <div class="testimonial-area  my-7 my-lg-10">
        <div class="container">
            <div class="owl-carousel">
                @foreach($testimonials as $testimonial)
                    <div class="item">
                        <div class="testimonial-style">
                            <div class="testimonial-content">
                                <p>{{Str::limit($testimonial->comment , 65)}}</p>
                                <h6 class="m-0">{{$testimonial->name}}</h6>
                            </div>
                            <div class="testimonial-image">
                                <img src="{{$testimonial->image}}" alt="{{$testimonial->name}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!--  ====================== Blog Area =============================  -->
    <div class="podcast-area position-relative  my-7 my-lg-10">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-title">
                    <h3 class="sepator2 m-0">{{__('Our Featured Blogs')}}</h3>
                </div>
                <a href="{{route('blogs.index')}}" class="view-all">{{__('View All')}}</a>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4" data-aos="fade-down" data-aos-duration="800">
                        <x-blog-card :blog="$blog">

                        </x-blog-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</x-site-layout>
