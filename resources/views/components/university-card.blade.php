@if($university)
    <div class="university-card rounded ">
      <a href="{{route('universities.show' , $university->slug)}}">
        <div class="position-relative img">
          <div class="overlay rounded"></div>
          <span class="text-white">{{$university->visits}} <i class="bi bi-eye"></i></span>
          <img style="height: 250px" src="{{$university->image_link}}" class="card-img-top" alt="{{$university->name}}" />
          <div class="body d-flex align-items-center flex-column">
            <img src="{{$university->logo_link}}" alt="{{$university->name}}" />
            <h5 class="text-center my-1 text-white">{{$university->title}}</h5>
            <p class="text-center text-white">{{$university->location}}</p>
          </div>
        </div>
      </a>
    </div>
@endif
