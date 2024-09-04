<x-site-layout :title="__('University Programs')" bodyTag="universities">

    <x-banner :title="__('University Programs')"></x-banner>

    <!--  ====================== University Programs =============================  -->
    <div class="podcast-area position-relative my-7 my-lg-10">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="section-title">
                    <h3 class="sepator2 m-0">{{__('University Programs')}}</h3>
                </div>
            </div>
            <div class="row">
                @foreach($programs as $program)
                    <div class="col-md-6 col-lg-4 mb-3" data-aos="fade-down" data-aos-duration="800">
                        <x-program-card :program="$program"></x-program-card>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container">
        <div class="text-center mx-auto">
            {!! $programs->links() !!}
        </div>

    </div>


</x-site-layout>
