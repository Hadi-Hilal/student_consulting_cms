<x-site-layout :title="__('FAQs')" bodyTag="faq">

    @push('css')

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jqueryui@1.11.1/jquery-ui.min.css">
    @endpush
    <x-banner :title="__('FAQs')"></x-banner>

    <div class="podcast-area position-relative my-7 my-lg-10">
        <div class="container">
            <div id="accordion">
                @foreach($faqs as $faq)
                    <h3>{{$faq->title}}</h3>
                    <div>
                        <p>
                            {{$faq->content}}
                        </p>
                        @if($faq->link)
                            <a class="fw-bold" href="{{$faq->link}}"
                               target="_blank">{{__("Click here for more details")}}</a>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    @push('js')

        <script src="https://cdn.jsdelivr.net/npm/jqueryui@1.11.1/jquery-ui.min.js"></script>
        <script>
            $(function () {
                $('#accordion').accordion();
            })
        </script>
    @endpush
</x-site-layout>
