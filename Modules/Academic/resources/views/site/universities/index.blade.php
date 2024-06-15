<x-site-layout :title="__('Universities')" bodyTag="universities">

    <x-banner :title="__('Universities')"></x-banner>

    <div class="podcast-area position-relative my-7 my-lg-10">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-title">
                    <h3 class="sepator2 m-0">{{__('University Programs')}}</h3>
                </div>
            </div>
            <ul class="list-unstyled my-3">
                @foreach($programs as $program)
                    <li class="d-inline-block me-2 bg-light p-1 rounded mb-3">
                        <a class=" text-dark" href="?program={{$program->id}}">{{$program->name}}
                            ({{$program->universities()->count()}})</a>
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
                    <h3 class="sepator2 m-0">{{__('Universities')}}</h3>
                </div>
            </div>
            <div class="row">
                @foreach($universities as $university)
                    <div class="col-md-6 col-lg-4 mb-3" data-aos="fade-down" data-aos-duration="800">
                        <x-university-card :university="$university" class="2"></x-university-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center mx-auto">
            {!! $universities->links() !!}
        </div>

    </div>


</x-site-layout>
