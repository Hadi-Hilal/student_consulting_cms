<x-site-layout :title="__('Blogs')" bodyTag="blog">

    <x-banner :title="__('Blogs')"></x-banner>

    <div class="podcast-area position-relative my-7 my-lg-10">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-title">
                    <h3 class="sepator2 m-0">{{__('Categories')}}</h3>
                </div>
            </div>
            <ul class="list-unstyled my-3">
                @foreach($categories as $category)
                    <li class="d-inline-block me-2 bg-light p-1 mb-3 rounded">
                        <a class=" text-dark" href="?category={{$category->slug}}">{{$category->name}}
                            ({{$category->posts()->count()}})</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <!--  ====================== Blogs =============================  -->
    <div class="podcast-area position-relative my-7 my-lg-10">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-title">
                    <h3 class="sepator2 m-0">{{__('Recent Blogs')}}</h3>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-md-6 col-lg-4" data-aos="fade-down" data-aos-duration="800">
                        <x-blog-card :blog="$blog" class="2"></x-blog-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center mx-auto">
            {!! $blogs->links() !!}
        </div>

    </div>


</x-site-layout>
