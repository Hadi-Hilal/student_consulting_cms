@extends('layouts.admin.base')

@section('title' , __('Edit University'))
@section('css')
    <style>
        .placeholder1 {
            background-image: url({{$university->image_link}});
        }

        .placeholder2 {
            background-image: url({{$university->logo_link}});
        }
    </style>
@endsection
@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Universities' , 'url' => route('admin.universities.index')],
            ['label' => 'Edit University'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Edit University" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <form id="kt_ecommerce_add_category_form" class="form d-flex flex-column flex-lg-row"
          action="{{route('admin.universities.update' , $university->id)}}"
          method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <!--begin::Aside column-->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">
            <!--begin::Thumbnail settings-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{__('University Image')}}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <!--begin::Image input placeholder-->

                    <!--end::Image input placeholder-->
                    <!--begin::Image input-->
                    <div
                        class="image-input image-input-empty image-input-outline image-input-placeholder placeholder1  mb-3"
                        data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                               data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-pencil fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Inputs-->
                            <input type="file" name="img" accept=".png, .jpg, .jpeg, .webp"/>
                            <input type="hidden" name="avatar_remove"/>
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="form-text"> 400px * 250px</div>
                    <div
                        class="text-muted fs-7">{{__('Only *.png, *.jpg and *.jpeg *.webp image files are accepted')}}</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Thumbnail settings-->

            <!--begin::Thumbnail settings-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{__('University Logo')}}</h2>
                    </div>
                    <!--end::Card title-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body text-center pt-0">
                    <!--begin::Image input-->
                    <!--begin::Image input placeholder-->

                    <!--end::Image input placeholder-->
                    <!--begin::Image input-->
                    <div
                        class="image-input image-input-empty image-input-outline image-input-placeholder placeholder2 mb-3"
                        data-kt-image-input="true">
                        <!--begin::Preview existing avatar-->
                        <div class="image-input-wrapper w-150px h-150px"></div>
                        <!--end::Preview existing avatar-->
                        <!--begin::Label-->
                        <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                               data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                            <!--begin::Icon-->
                            <i class="ki-duotone ki-pencil fs-7">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                            <!--end::Icon-->
                            <!--begin::Inputs-->
                            <input type="file" name="ulogo" accept=".png, .jpg, .jpeg, .webp"/>
                            <input type="hidden" name="avatar_remove"/>
                            <!--end::Inputs-->
                        </label>
                        <!--end::Label-->
                        <!--begin::Cancel-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                        <!--end::Cancel-->
                        <!--begin::Remove-->
                        <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                              data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="ki-duotone ki-cross fs-2">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </span>
                        <!--end::Remove-->
                    </div>
                    <!--end::Image input-->
                    <!--begin::Description-->
                    <div class="form-text"> 75px * 75px</div>
                    <div
                        class="text-muted fs-7">{{__('Only *.png, *.jpg and *.jpeg *.webp image files are accepted')}}</div>
                    <!--end::Description-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Thumbnail settings-->

            <!--begin::Fees-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{__('University Info')}}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <div class="mb-5">
                        <label class="required form-label" for="location">{{__('Location')}}</label>
                        <input type="text" class="form-control" id="location" name="location"
                               value="{{old('location', $university->location)}}"/>
                    </div>

                    <div class="mb-5">
                        <label class="required form-label" for="rank">{{__('Local Rank')}}</label>
                        <input type="text" class="form-control" id="rank" name="rank"
                               value="{{old('rank', $university->rank)}}"/>
                    </div>

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Fees-->


            <!--begin::Fees-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{__('University Fees')}}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">

                    <label class="required form-label" for="price">{{__('Price Start At')}}</label>
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" id="price" name="price"
                               value="{{old('price', $university->price)}}"/>
                        <span class="input-group-text">$</span>
                    </div>

                    <label class="required form-label" for="discount">{{__('Discount')}}</label>
                    <div class="input-group mb-5">
                        <input type="text" class="form-control" id="discount" name="discount"
                               value="{{old('discount', $university->discount)}}"/>
                        <span class="input-group-text">%</span>
                    </div>


                </div>
                <!--end::Card body-->
            </div>
            <!--end::Fees-->

            <!--begin::Status-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{__('University Type')}}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                    </div>
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Select2-->
                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" name="type"
                            data-placeholder="Select an option" id="type">
                        <option value=""></option>

                        <option
                            @selected(old('type', $university->type) === 'private') value="private"
                            class="text-uppercase"
                            selected="selected">{{__('private')}}</option>
                        <option
                            @selected(old('type', $university->type) === 'public') value="public">{{__('public')}}</option>
                    </select>
                    <!--end::Select2-->

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Status-->

            <!--begin::Status-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <!--begin::Card title-->
                    <div class="card-title">
                        <h2>{{__('Publish Status')}}</h2>
                    </div>
                    <!--end::Card title-->
                    <!--begin::Card toolbar-->
                    <div class="card-toolbar">
                        <div class="rounded-circle bg-success w-15px h-15px"
                             id="kt_ecommerce_add_category_status"></div>
                    </div>
                    <!--begin::Card toolbar-->
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Select2-->
                    <select class="form-select mb-2" data-control="select2" data-hide-search="true" name="publish"
                            data-placeholder="Select an option" id="publish">
                        <option value=""></option>

                        <option
                            @selected(old('publish' , $university->publish) === 'published') value="published"
                            class="text-uppercase"
                            selected="selected">{{__('published')}}</option>
                        <option
                            @selected(old('publish' , $university->publish) === 'archived') value="archived">{{__('archived')}}</option>
                    </select>
                    <!--end::Select2-->

                </div>
                <!--end::Card body-->
            </div>
            <!--end::Status-->

            <!--begin::Appearance-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{__('Appearance')}}</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div>
                        <!--begin::Methods-->
                        <!--begin::Input row-->
                        <div class="d-flex fv-row">
                            <!--begin::Radio-->
                            <div class="form-check form-check-custom form-check-solid">
                                <!--begin::Input-->
                                <input class="form-check-input me-3" name="featured" type="radio" value="1"
                                       id="kt_ecommerce_add_category_automation_0" @checked(old('featured' , $university->featured) === 1)/>
                                <!--end::Input-->
                                <!--begin::Label-->
                                <label class="form-check-label" for="kt_ecommerce_add_category_automation_0">
                                    <div class="fw-bold text-gray-800">{{__('Featured')}}</div>
                                    <div class="text-gray-600">
                                        {{__('Add it to the home page in the website')}}
                                    </div>
                                </label>
                                <!--end::Label-->
                            </div>
                            <!--end::Radio-->
                        </div>
                        <!--end::Input row-->
                        <div class='separator separator-dashed my-5'></div>
                        <!--begin::Input row-->
                        <div class="d-flex fv-row">
                            <!--begin::Radio-->
                            <div class="form-check form-check-custom form-check-solid">
                                <!--begin::Input-->
                                <input class="form-check-input me-3" name="featured" type="radio" value="0"
                                       @checked(old('featured' , $university->featured) === 0)
                                       id="kt_ecommerce_add_category_automation_1"/>
                                <!--end::Input-->
                                <!--begin::Label-->
                                <label class="form-check-label" for="kt_ecommerce_add_category_automation_1">
                                    <div class="fw-bold text-gray-800">{{__('Not Featured')}}</div>
                                    <div class="text-gray-600">{{__("Don't add it to the home page of the website")}}
                                    </div>
                                </label>
                                <!--end::Label-->
                            </div>
                            <!--end::Radio-->
                        </div>
                        <!--end::Input row-->
                        <!--end::Methods-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Appearance-->


        </div>
        <!--end::Aside column-->
        <!--begin::Main column-->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <!--begin::General options-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{__('General')}}</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row">
                        <!--begin::Label-->
                        <label for="title" class="required form-label"><i
                                class="bi bi-translate text-primary mx-1 "></i>{{__('Title')}}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-2" id="title" name="title"
                               value="{{old('title' , $university->title)}}"
                        />
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div
                            class="text-muted fs-7">{{__('The title is required and should to be attractive & short')}}</div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div class="mb-10 fv-row">
                        <!--begin::Label-->
                        <label for="video" class="required form-label">{{__('Embed Video')}}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-2" id="video" name="video"
                               value="{{old('video', $university->video)}}"
                               placeholder="<iframe width='560' height='300'...."/>
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div class="text-muted fs-7 ">{{__('To know how to embed video')}} <a
                                href="https://www.youtube.com/watch?v=lJIrF4YjHfQ"
                                target="_blank">{{__('Click Here')}}</a></div>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->


                    <div class="">
                        <!--begin::Label-->
                        <label for="program" class="required form-label">{{__('University Programs')}}</label>
                        <!--end::Label-->
                        <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                multiple="multiple" name="program[]"
                                data-placeholder="Select an option" id="program">
                            <option value=""></option>

                            @foreach($programs as $program)
                                <option
                                    @selected(in_array($program->id, $university->programs->pluck('id')->toArray() , true)) value="{{$program->id}}">{{$program->name}}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <!--end::Card header-->
            </div>
            <!--end::General options-->
            <!--begin::Meta options-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{__('Meta Options')}}</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div class="mb-10 ">
                        <!--begin::Label-->
                        <label for="description" class="required form-label"><i
                                class="bi bi-translate text-primary mx-1 "></i>{{__('Brief Description')}}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-2" name="description" id="description"
                               value="{{old('description' , $university->description)}}"/>
                        <!--end::Input-->
                        <!--begin::Description-->
                        <div
                            class="text-warning fs-7">{{__('This Description Very Important For SEO Should Be Between 150-160 characters')}}</div>
                        <small class="text-muted" id="wordCountDisplay"></small>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                    <!--begin::Input group-->
                    <div>
                        <!--begin::Label-->
                        <label for="kt_tagify_1" class="required form-label"><i
                                class="bi bi-translate text-primary mx-1 "></i>{{__('Keywords')}}</label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control mb-2" value="{{old('keywords' , $university->keywords)}}"
                               name="keywords" id="kt_tagify_1"/>
                        <!--end::Description-->
                    </div>
                    <!--end::Input group-->
                </div>
                <!--end::Card header-->
            </div>
            <!--end::Meta options-->

            <!--begin::Meta options-->
            <div class="card card-flush py-4">
                <!--begin::Card header-->
                <div class="card-header">
                    <div class="card-title">
                        <h2>{{__('Content')}}</h2>
                    </div>
                </div>
                <!--end::Card header-->
                <!--begin::Card body-->
                <div class="card-body pt-0">
                    <!--begin::Input group-->
                    <div class="mb-10 ">
                        <!--begin::Label-->
                        <label for="tinymce" class="required form-label"><i
                                class="bi bi-translate text-primary mx-1 "></i></label>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <textarea name="content" class="form-control form-control-solid "
                                  id="tinymce">{!! old('content', $university->content) !!}</textarea>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                </div>
                <!--end::Card header-->
            </div>
            <!--end::Meta options-->


            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{route('admin.universities.index')}}" id="kt_ecommerce_add_product_cancel"
                   class="btn btn-light me-5">{{__('Discard')}}</a>
                <!--end::Button-->
                <!--begin::Button-->
                <button type="submit" id="kt_ecommerce_add_category_submit" class="btn btn-primary">
                    <span class="indicator-label">{{__('Save Changes')}}</span>
                    <span class="indicator-progress">Please wait...
                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                </button>
                <!--end::Button-->
            </div>
        </div>
        <!--end::Main column-->
    </form>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/{{Config::get('core.tinymce_key')}}/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        $(document).ready(function (e) {
            var input1 = document.querySelector("#kt_tagify_1");
            new Tagify(input1);

            $("#description").on("input", function () {
                var text = $(this).val();
                var charCount = text.length;
                $("#wordCountDisplay").text(charCount + ' ' + '{{__('Character')}}');
            });

            function generateSlug(text) {
                return text
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '') // Remove non-word characters
                    .replace(/\s+/g, '-') // Replace whitespace with dashes
                    .replace(/--+/g, '-') // Replace multiple dashes with a single dash
                    .trim(); // Trim leading/trailing whitespace and dashes
            }

            tinymce.init({
                selector: '#tinymce',
                height: 900,
                plugins: 'accordion autolink anchor code directionality fullscreen media emoticons image link lists media table preview',
                toolbar: 'undo redo | blocks  fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat  preview',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                @if(app()->getLocale() == 'ar') language: 'ar', @endif

            });

        })

    </script>

@endsection
