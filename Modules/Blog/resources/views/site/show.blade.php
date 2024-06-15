<x-site-layout :title="$blog->title" bodyTag="posts" :keywords="$blog->keywords" :desc="$blog->description"
               :img="$blog->image_link">


    <!--  ====================== Single Area =============================  -->
    <div class="single-area my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="entry-title mb-2">
                        <h2 class="display-4">{{$blog->title}}</h2>
                        <div class="d-flex justify-content-between my-1">
                            <a target="_blank" href="{{route('blogs.index' , ['category' => $blog->category->slug])}}"
                               class="small fw-bold"><i class="bi bi-bookmark mx-1"></i> {{$blog->category->name}}</a>
                            <p class="small fw-bold"><i class="bi bi-calendar mx-1"></i> {{$blog->created_at}}</p>
                        </div>
                        <p class="small mb-0">
                            <span><i class="bi bi-book mx-1"></i> {{$blog->estimated_time}} {{__('reading')}}</span>
                        </p>
                    </div>

                    <div class="podcast-image"><img src="{{$blog->image_link}}" alt="{{Str::limit($blog->title, 30)}}">
                    </div>
                    <hr/>
                    <div class="my-3 p-2">
                        {!! $blog->content !!}
                    </div>

                    <div class="entry-footer row my-5 my-md-7">
                        <div class="col-md-12">
                            <h4>{{__('Keywords')}}</h4>
                            <ul class="entry-tag-share list-inline">
                                @foreach(explode(',' , $blog->keywords) as $keyword)
                                    <li class="list-inline-item">
                                        <a href="#">{{$keyword}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            @if(count($mayLike) > 0)
                <div class="podcast-area  my-7 my-lg-10">
                    <div class="container">
                        <div class="d-md-flex justify-content-between align-items-center">
                            <div class="section-title mb-3">
                                <h2 class="sepator2">{{__('You may also like')}}</h2>
                            </div>

                        </div>
                        <div class="row">
                            @foreach($mayLike as $blog)
                                <div class="col-md-6 col-lg-4" data-aos="fade-down" data-aos-duration="1000">
                                    <x-blog-card :blog="$blog"></x-blog-card>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

</x-site-layout>
