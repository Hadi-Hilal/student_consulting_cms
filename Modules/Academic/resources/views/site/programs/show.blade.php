<x-site-layout :title="$program->name" bodyTag="universities"
               :keywords="$program->keywords"
               :desc="$program->description"
               :img="$program->image_link">
    <!--  ====================== Single Area =============================  -->
    <div class="single-area my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="entry-title mb-2">
                        <h2 class="display-4">{{$program->name}}</h2>
                    </div>

                    <div class="podcast-image"><img style="height: 600px; width: 400px" src="{{$program->image_link}}"
                                                    alt="{{Str::limit($program->name, 30)}}">
                    </div>
                    <div class="my-3 p-2">
                        {!! $program->content !!}
                    </div>
                </div>

            </div>

            <div class="podcast-area position-relative my-7 my-lg-10">
                <div class="container">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="section-title">
                            <h3 class="sepator2 m-0">{{__('Program Universities')}}</h3>
                        </div>
                    </div>
                    <div class="row">
                        @foreach($program->universities as $university)
                            <div class="col-md-6 col-lg-4 mb-3" data-aos="fade-down" data-aos-duration="800">
                                <x-university-card :university="$university" class="2"></x-university-card>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-site-layout>
