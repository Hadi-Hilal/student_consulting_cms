<div class="podcast-style2 mt-4">
    <div class="podcast-top">
        <div class="podcast-image"><img src="{{$blog->image_link}}" alt="{{Str::limit($blog->title, 30)}}">

        </div>
        <div class="podcast-content">
            <ul class="podcast-meta list-inline">
                <li><a target="_blank" href="{{route('blogs.index' , ['category' => $blog->category->slug])}}">{{$blog->category->name}}</a></li>
                <li><span><i class="bi bi-book mx-1"></i> {{$blog->estimated_time}} {{__('reading')}}</span></li>
            </ul>
            <h5 class="mb-2"><a href="{{route('blogs.show' , $blog->slug)}}">{{Str::limit($blog->title, 75)}}</a></h5>
            <p class="m-0">{{Str::limit($blog->description, 125)}}</p>

        </div>
    </div>
    <div class="podcast-bottom">
        <p class="m-0 small"><i class="bi bi-eye mx-1"></i> {{$blog->visits}}</p>
        <p class="m-0 small">{{$blog->created_at->diffForHumans()}}</p>
    </div>
</div>
