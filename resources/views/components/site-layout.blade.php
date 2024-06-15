@props(['title' => null , 'bodyTag' => null , 'keywords' => null , 'desc' => null  , 'img'])
    <!DOCTYPE html>
<html
    dir="{{app()->getLocale() == 'ar' ? 'rtl' :'ltr'}}"
    lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $seo->get('website_name') }} | {{$title}}</title>
    <meta name="keywords" content="{{$keywords ?? $seo->get('website_keywords') }}">
    <meta name="description" content="{{ $desc ?? $seo->get('website_desc')}}">
    <meta name="author" content="{{$seo->get('website_name')}}">
    <meta name="audience" content="all"/>
    <meta name="theme-color" content="#cb9e2c">

    <link rel="canonical" href="{{url()->current()}}"/>
    <meta property="og:title" content="{{$title}}"/>
    <meta property="og:description" content="{{ $desc ?? $seo->get('website_desc')}}"/>
    <meta property="og:image" content="{{$img ?? $settings->get('meta_img')}}"/>
    <meta property="og:url" content="{{url()->current()}}"/>
    <meta property="og:type" content="website"/>
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('images/logo/icons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('images/logo/icons/favicon-16x16.png')}}">
    <link rel="shortcut icon" href="{{asset('images/logo/icons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="{{$seo->get('website_name')}}">
    <meta name="application-name" content="{{$seo->get('website_name')}}">
    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css"
          integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
          integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />

    @stack('css')

    @if(app()->getLocale() == 'ar')
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap"
              rel="stylesheet">
        <link rel="stylesheet" href="{{asset('site/css/rtl.css')}}">
    @else
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link
            href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="{{asset('site/css/style.css')}}">
    @endif


    {!! $settings->get('header_scripts') !!}
</head>

<body class="{{$bodyTag}}">

<main>
    <header class="header-area">
        <div class="container">
            <div class="header-navbar navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{url('/')}}"><img
                        src="{{asset('storage/'. $settings->get('black_logo')) }}" alt="logo"></a>
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbar-nav"
                        aria-controls="navbar-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <div class="burger-box">
                        <div class="burger-inner"></div>
                    </div>
                </button>

                <div class="collapse navbar-collapse" id="navbar-menu">
                    <nav class="header-main-menu ms-auto" id="header-main-menu">
                        <ul class="navbar-nav" id="navbar-nav">
                            <li class="nav-item active"><a class="nav-link" href="{{url('/')}}">{{__('Home')}}</a></li>

                            <li class="nav-item "><a class="nav-link"
                                                     href="{{route('universities.index')}}">{{__('Universities')}}</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('Our Services')}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($pages->where('type' , 'service') as $service)
                                        <li><a class="dropdown-item"
                                               href="{{route('pages.show' , $service->slug)}}">{{$service->title}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                                   data-bs-toggle="dropdown" aria-expanded="false">
                                    {{__('Pages')}}
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @foreach($pages->where('type' , 'general') as $page)
                                        <li><a class="dropdown-item"
                                               href="{{route('pages.show' , $page->slug)}}">{{$page->title}}</a></li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="nav-item "><a class="nav-link"
                                                     href="{{route('faqs.index')}}">{{__('FAQs')}}</a>
                            </li>

                            <li class="nav-item "><a class="nav-link"
                                                     href="{{route('blogs.index')}}">{{__('Blogs')}}</a>
                            </li>

                            <li class="nav-item "><a class="nav-link"
                                                     href="{{route('contact-us.index')}}">{{__('Contact Us')}}</a>
                            </li>

                            @auth()
                                @if(auth()->user()->type == 'admin')
                                    <li class="nav-item "><a class="nav-link"
                                                             href="{{route('admin.dashboard')}}">{{__('Admin Panel')}}</a>
                                    </li>
                                @endif
                            @endauth


                        </ul>
                    </nav>
                </div>
                <ul class="header-rightbar navbar-nav">
                    @if(app()->getLocale() == 'en')
                        <li class="nav-item"><a class="nav-link"
                                                href="{{url('/locale/ar') }}"> <img
                                    style="width: 23px; border-radius: 6px"
                                    src="{{asset('images/flags/ar.svg')}}"
                                    alt="united-states"/></a>
                        </li>
                    @else
                        <li class="nav-item"><a class="nav-link"
                                                href="{{url('/locale/en') }}"> <img
                                    style="width: 23px; border-radius: 6px"
                                    src="{{asset('images/flags/uk.svg')}}"
                                    alt="united-states"/></a>
                        </li>
                    @endif

{{--                    <li class="nav-item mx-1"><a class="nav-link" href="#" data-bs-toggle="modal"--}}
{{--                                                 data-bs-target="#headermodal">--}}
{{--                            <div class="search-modal"><img src="{{asset('site/images/search-icon.svg')}}" alt="title">--}}
{{--                            </div>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                </ul>
            </div>
            <!-- Modal -->
            <div class="modal" id="headermodal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="container">
                            <div class="container-wrapper">
                                <div class="modal-body">
                                    <div class="headermodal-form">
                                        <form action="{{route('universities.search_results')}}" method="GET">
                                            <span><img src="{{asset('site/images/search-icon.svg')}}"
                                                       alt="title"></span>
                                            <input type="text" class="control-form" value="{{request()->query('q')}}"
                                                   name="q" placeholder="{{__("Search In Universities")}}">
                                        </form>
                                        <div class="search-close" data-bs-dismiss="modal">
                                            <img src="{{asset('site/images/cancel.svg')}}" alt="cancel">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </header>

    {{$slot}}

        <section class="book-sc my-7 my-lg-10">
        <div class="container">
            <div
                class="d-lg-flex justify-content-around align-items-center shadow p-3"
            >
                <div class="text-center">
                    <p>{{__('Are you ready to start your academic journey?')}}</p>
                    <h3 class="my-3 text-secondry">{{__('Book your free consultation')}}</h3>
                    <div class="">
                        <a target="_blank" href="https://web.whatsapp.com/send?phone={{$settings->get('whatsapp')}}"
                           class="btn btn-primary">{{__('Contact Us')}} <i class="bi bi-whatsapp mx-1"></i></a>
                    </div>
                </div>
                <div class="img">
                    <img src="{{asset('site/images/student.jpg')}}" alt="Student " class="img-fluid"/>
                </div>
            </div>
        </div>
    </section>

    <!--  ====================== Footer Area =============================  -->
    <footer class="footer-area position-relative my-7">

        <a
            href="https://web.whatsapp.com/send?phone={{$settings->get('whatsapp')}}" target="_blank"
            class="whats-btn btn btn-success heartbeat circle"
        >
            <i class="bi bi-whatsapp"></i>
        </a>
        <div class="container">
            <div class="row">
                <div class="col-md-3 d-flex align-items-center">
                    <div class="footer-widget-logo m-auto">
                        <a href="#"><img src="{{asset('storage/'. $settings->get('black_logo')) }}" alt="title"></a>
                    </div>

                </div>
                <div class="col-6 col-md-2">
                    <div class="footer-widget my-3 my-md-0">
                        <h5>{{__('Quick Links')}}</h5>
                        <ul class="footer-list list-inline m-0">
                            <li><a href="{{route('universities.index')}}">{{__('Universities')}}</a></li>
                            <li><a href="{{route('blogs.index')}}">{{__('Blogs')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-6 col-md-2">
                    <div class="footer-widget my-3 my-md-0">
                        <ul class="footer-list list-inline m-0">
                            <li><a href="{{route('login')}}">{{__('Sign In')}}</a></li>
                            <li><a href="{{route('faqs.index')}}">{{__('FAQs')}}</a></li>
                            <li><a href="{{route('contact-us.index')}}">{{__('Contact Us')}}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 offset-md-1">
                    <div class="footer-widget my-3 my-md-0">
                        <h5>{{__('Newsletter')}}</h5>
                        <form class="footer-newsletter" method="POST"
                              action="{{route('subscribe.store')}}">
                            @csrf
                            <div class="input-group">
                                <input type="email" name="email" class="form-control"
                                       placeholder="{{__('Enter your email')}}">
                                <button class="btn btn-white"><img src="{{asset('site/images/mail-icon.svg')}}"
                                                                   alt="{{__('Newsletter')}}"></button>
                            </div>
                        </form>

                        <div class="mt-3">
                            <ul class="d-inline-block list-unstyled ">
                                <li class="me-2 d-inline"><a target="_blank" href="{{$settings->get('facebook')}}"><i
                                            class="bi bi-facebook fs-4"></i></a></li>
                                <li class="me-2 d-inline"><a target="_blank" href="{{$settings->get('instagram')}}"><i
                                            class="bi bi-instagram fs-4"></i></a></li>
                                <li class="me-2 d-inline"><a target="_blank" href="{{$settings->get('twitter')}}"><i
                                            class="bi bi-twitter-x fs-4"></i></a></li>
                                <li class="me-2 d-inline"><a href="{{$settings->get('youtube')}}"><i
                                            class="bi bi-youtube text-primary fs-4"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row mt-3">
                <div class="col-md-6">
                    <p class="copyright-text my-1"> {{__('All rights reserved')}} &copy; <span id="spanYear">2024</span>
                    </p>
                </div>
                <div class="col-md-4 ms-auto">
                   <p class="copyright-text my-1">  <a class="" href="https://www.linkedin.com/in/hadi-hilal/" target="_blank">
                        {{__('Powered By Hadi Hilal')}}
                    </a>
                   </p>
                </div>
            </div>
        </div>
    </footer>
</main>

<script src="{{asset('site/js/build.min.js')}}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
    integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>

<script>
    @if (session('success'))
    toastr.success('{{ session('success') }}');
    @elseif (session('error'))
    toastr.error('{{ session('error') }}');
    @elseif(session('status'))
    toastr.info('{{ session('status') }}');
    @endif
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    toastr.error('{{ $error }}');
    @endforeach
    @endif
</script>
<script>
    $(function () {
        $('.navbar-toggler').on('click', function () {
            $('#navbar-menu').toggle();
            $('#header-main-menu').toggle();
        })

        $('.search-select').select2();

        $(".owl-carousel").owlCarousel({
            stagePadding: 20,
            loop: true,
            margin: 15,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1.1,
                    nav: true,
                },
                600: {
                    items: 2.3,
                    nav: true,
                },
                1000: {
                    items: 3.2,
                    nav: true,
                    loop: true,
                },
            },
        });

    })

</script>
@stack('js')
{!! $settings->get('body_scripts') !!}
</body>

</html>
