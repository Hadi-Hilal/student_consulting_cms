@if($program)
    <div class="team-style mt-4">
        <div class="team-image"><img src="{{$program->image_link}}" alt="{{$program->name}}"></div>
        <div class="team-content">
            <h5><a href="">{{$program->name}}</a></h5>
            <p class="mb-1">{{__('Universities')}} ({{$program->universities()->count()}})</p>
        </div>
    </div>
@endif
