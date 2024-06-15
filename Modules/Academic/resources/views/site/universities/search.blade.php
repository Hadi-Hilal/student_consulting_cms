<x-site-layout :title="__('Search Results')" bodyTag="serach">

    <x-banner :title="__('Search Results')"></x-banner>

    <div class="search-area position-relative my-7 my-lg-10  mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="side bg-light border p-3">
                        <div>
                            <input
                                type="search"
                                placeholder="search"
                                class="px-2 w-100 btn"
                            />
                            <h5 class="my-3 fw-bold">Study Level</h5>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                        </div>
                        <div>
                            <h5 class="my-3 fw-bold">Study Level</h5>
                            <input
                                type="search"
                                placeholder="search"
                                class="px-2 mb-3 w-100 btn"
                            />
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                        </div>
                        <div>
                            <h5 class="my-3 fw-bold">Langugages</h5>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Arabic
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    English
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Turkish
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input
                                    class="form-check-input"
                                    type="checkbox"
                                    value=""
                                    id="flexCheckDefault"
                                />
                                <label class="form-check-label" for="flexCheckDefault">
                                    Default checkbox
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="p-3">
                        <div class="d-md-flex justify-content-between">
                            <p>
                                <strong class="text-warning">({{$universities->count()}})</strong> {{__('University')}}

                            </p>
                            <a href="#" class="btn-sm btn btn-secondary">Download PDF <i class="bi bi-file-pdf-fill"></i
                                ></a>
                        </div>

                        @foreach($universities as $university)
                            <div class="shadow p-3 program-box mt-4">
                    <span class="bg-light p-2"
                    ><img src="images/bachelor.png" alt=""/><span
                            class="mx-2"
                        >Bachelor</span
                        ></span
                    >
                                <span class="bg-light p-2 mx-2"
                                ><img src="images/turkey.png" alt=""/><span class="mx-2"
                                    >Turkish</span
                                    ></span
                                >
                                <div
                                    class="d-md-flex justify-content-between align-items-center mt-4"
                                >
                                    <div>
                                        @if(request()->has('program'))
                                            @php
                                                $programId = request()->query('program');
                                                $program = $university->programs()->find($programId);
                                            @endphp
                                            <h2 class="fs-4">{{$program->name }}</h2>
                                        @endif
                                        <div
                                            class="d-flex justify-content-start align-items-center"
                                        >
                                            <img src="{{$university->logo_link}}" alt=""/>
                                            <p class="mx-2 mb-0">{!! highlightQuery(Str::limit($university->title, 75), request()->query('q')) !!}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <div class="mx-2">
                                            <del class="text-danger">{{$university->disc_price}} $</del>
                                            <p class="mb-0 text-success fw-bold">{{$university->price}} $</p>
                                        </div>
                                        <a href="{{route('login')}}" class="btn btn-primary"
                                        >{{__('Apply')}}</a
                                        >
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
</x-site-layout>
