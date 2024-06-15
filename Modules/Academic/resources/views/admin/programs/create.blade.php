@extends('layouts.admin.base')

@section('title' , __('New University Program'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'University Programs' , 'url' => route('admin.programs.index')],
            ['label' => 'New University Program'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="New University Program" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <x-admin.create-card title="New University Program" :formUrl="route('admin.programs.store')">
        <!--begin::Row-->
        <div class="row mb-10">

            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3">{{__('Image')}} <span class="text-danger">*</span>
                </div>
            </div>

            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <!--begin::Image input-->
                <div class="image-input image-input-outline " data-kt-image-input="true"
                     style="background-image: url('{{asset('images/blank.png')}}')">
                    <!--begin::Preview existing avatar-->
                    <div class="image-input-wrapper w-125px h-125px bgi-position-center"
                         style="background-size: 75%; background-image: url({{asset('images/default.jpg')}})"></div>
                    <!--end::Preview existing avatar-->
                    <!--begin::Label-->
                    <label
                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                        data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                        <i class="bi bi-pencil-fill fs-7"></i>
                        <!--begin::Inputs-->
                        <input type="file" name="img" accept=".png, .jpg, .jpeg, .webp"/>
                        <input type="hidden" name="avatar_remove"/>
                        <!--end::Inputs-->
                    </label>
                    <!--end::Label-->
                    <!--begin::Cancel-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Cancel-->
                    <!--begin::Remove-->
                    <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-white shadow"
                          data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                        <i class="bi bi-x fs-2"></i>
                    </span>
                    <!--end::Remove-->
                </div>
                <!--end::Image input-->
                <!--begin::Hint-->
                <div class="form-text"> 400px * 600px</div>
                <!--end::Hint-->
            </div>
            <!--end::Col-->
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Program Name')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="name" value="{{old('name')}}"
                       placeholder="Medicine"/>

            </div>
        </div>
        <!--end::Row-->

        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Program Level')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <select class="form-select mb-2" data-control="select2" data-hide-search="true" name="level[]" multiple
                        data-placeholder="Select an option" id="level">
                    <option value=""></option>
                    @foreach($levels as $level)
                        <option value="{{$level->id}}">{{$level->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <!--end::Row-->


        <!--begin::Row-->
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"><i
                        class="bi bi-translate text-primary mx-1 "></i>{{__('Program Language')}} <span
                        class="text-danger">*</span></div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <!--begin::Row-->
                <div class="row mw-500px mb-5" data-kt-buttons="true"
                     data-kt-buttons-target=".form-check-image, .form-check-input">


                    <!--begin::Col-->
                    <div class="col-4">
                        <label class="form-check-image">
                            <div class="form-check-wrapper">
                                <img style="height: 70px" src="{{asset('images/flags/tr.svg')}}"/>
                            </div>

                            <div class="form-check form-check-custom form-check-solid me-10">
                                <input class="form-check-input" checked type="checkbox" value="tr" name="lang[]"/>
                                <div class="form-check-label">
                                    TR
                                </div>
                            </div>
                        </label>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-4">
                        <label class="form-check-image active">
                            <div class="form-check-wrapper">
                                <img style="height: 70px" src="{{asset('images/flags/uk.svg')}}"/>
                            </div>

                            <div class="form-check form-check-custom form-check-solid">
                                <input class="form-check-input" type="checkbox" value="uk" name="lang[]"/>
                                <div class="form-check-label">
                                    EN
                                </div>
                            </div>
                        </label>
                    </div>
                    <!--end::Col-->

                    <!--begin::Col-->
                    <div class="col-4">
                        <label class="form-check-image">
                            <div class="form-check-wrapper">
                                <img style="height: 70px" src="{{asset('images/flags/ar.svg')}}"/>
                            </div>

                            <div class="form-check form-check-custom form-check-solid me-10">
                                <input class="form-check-input" type="checkbox" value="ar" name="lang[]" id="text_wow"/>
                                <div class="form-check-label">
                                    AR
                                </div>
                            </div>
                        </label>
                    </div>
                    <!--end::Col-->

                </div>
                <!--end::Row-->

            </div>
        </div>
        <!--end::Row-->


    </x-admin.create-card>
@endsection

@section('js')

@endsection
