<x-site-layout :title="$university->title" bodyTag="posts" :keywords="$university->keywords"
               :desc="$university->description"
               :img="$university->image_link">

    @push('css')
        <style>
            .sticky-sidebar {
                position: sticky;
                top: 1rem;
                z-index: 1;
            }
        </style>
    @endpush
    <!--  ====================== Single Area =============================  -->
    <div class="single-area my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="side" id="sidebar">
                        <div class="p-3 shadow rounded">
                            {!! $university->video !!}
                            <div
                                class="d-flex justify-content-between align-items-center my-2"
                            >
                                <span>{{$university->disc_price}} $ / {{__('Yearly')}}</span>
                                <div>
                                    <span><del class="text-danger">{{$university->price}} $</del></span>
                                    <span class="text-success">% {{$university->discount}} </span>
                                </div>
                            </div>


                            <div class="mb-2">
                                {{--                                <span><i class="bi bi-globe me-1 text-primary"></i></span>--}}
                                <span class="fw-bold">{{__('Local Rank')}} :</span>
                                <span>{{$university->rank}}</span>
                            </div>

                            <div class="mb-2">
                                {{--                                <span><i class="bi bi-pin-map me-1 text-primary"></i></span>--}}
                                <span class="fw-bold">{{__('Location')}} :</span>
                                <span>{{$university->location}}</span>
                            </div>

                            <div class="mb-2">
                                <span class="fw-bold">{{__('University Type')}} :</span>
                                <span>{{__($university->type)}}</span>
                            </div>
                            <div class="mb-2">
                                <span class="fw-bold">{{__('University Programs')}} :</span>
                                <span>{{$university->programs()->count()}}</span>
                            </div>

                            @guest
                                <a href="{{route('register')}}" class="btn btn-primary w-100">{{__('Apply Now')}}</a>
                            @else
                                <a href="https://web.whatsapp.com/send?phone={{$settings->get('whatsapp')}}"
                                   class="btn btn-primary w-100">{{__('Contact Us')}}</a>
                            @endguest
                        </div>
                        <div class="p-3 shadow mt-4 rounded">
                            <h4 class="mb-4">{{__('Other Universities')}}</h4>
                            @foreach($mayLike as $item)
                                <div class="mb-3">
                                    <a href="{{route('universities.show' , $item->slug)}}"
                                       class="other-unv d-flex align-items-center">
                                        <img
                                            src="{{$item->logo_link}}" width="75"
                                            alt="{{$item->title}}"
                                            class="img-fluid"
                                        />
                                        <div class="mx-2">
                                            <h5 class="my-1 h5">{{$item->title}}</h5>
                                            <p class="text-secondary">{{$item->disc_price}} $/ {{__('Yearly')}}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="shadow p-3 rounded">
                        <div class="entry-title mb-2">
                            <h2 class="display-4">{{$university->title}}</h2>
                        </div>

                        <div class="podcast-image"><img src="{{$university->image_link}}"
                                                        alt="{{Str::limit($university->title, 30)}}">
                        </div>
                        <hr/>
                        <div class="my-3 p-2">
                            {!! $university->content !!}
                        </div>

                        <div class="entry-footer row my-5 my-md-7">
                            <div class="col-md-12">
                                <h4>{{__('Keywords')}}</h4>
                                <ul class="entry-tag-share list-inline">
                                    @foreach(explode(',' , $university->keywords) as $keyword)
                                        <li class="list-inline-item">
                                            <a href="#">{{$keyword}}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            window.addEventListener('scroll', function () {

                var sidebar = document.getElementById('sidebar');
                if (window.scrollY > 0) {
                    sidebar.classList.add('sticky-sidebar');
                } else {
                    sidebar.classList.remove('sticky-sidebar');
                }
            });
        </script>
    @endpush
</x-site-layout>
