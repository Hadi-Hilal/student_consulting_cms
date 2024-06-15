<x-site-layout :title="$page->title" bodyTag="pages" :keywords="$page->keywords" :desc="$page->description"
               :img="$page->image_link">


    <!--  ====================== Page Area =============================  -->
    <div class="single-area my-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="entry-title mb-3">
                        <h2 class="display-5">{{$page->title}}</h2>
                    </div>

                    <div class="podcast-image"><img src="{{$page->image_link}}" alt="{{Str::limit($page->title, 30)}}">
                    </div>
                    <hr/>
                    <div class="my-3 p-2">
                        {!! $page->content !!}
                    </div>


                </div>

            </div>


        </div>
    </div>

</x-site-layout>
