@extends('layouts.admin.base')

@section('title' , __('Newsletters'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Newsletters', 'url' => route('admin.newsletters.index')],
            ['label' => 'Send New Newsletter'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Send New Newsletter')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between py-3">
            <h2 class="card-title m-0">{{__('Compose Message')}}</h2>
            <!--begin::Toggle-->
            <a href="#" class="btn btn-sm btn-icon btn-color-primary btn-light btn-active-light-primary d-lg-none"
               data-bs-toggle="tooltip" data-bs-dismiss="click" data-bs-placement="top" title="Toggle inbox menu"
               id="kt_inbox_aside_toggle">
                <i class="ki-duotone ki-burger-menu-2 fs-3 m-0">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                    <span class="path6"></span>
                    <span class="path7"></span>
                    <span class="path8"></span>
                    <span class="path9"></span>
                    <span class="path10"></span>
                </i>
            </a>
            <!--end::Toggle-->
        </div>
        <div class="card-body p-0">
            <!--begin::Form-->
            <form id="kt_inbox_compose_form" method="POST" action="{{route('admin.newsletters.store')}}">
                @csrf
                <!--begin::Body-->
                <div class="d-block">
                    <!--begin::From-->
                    <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                        <!--begin::Label-->
                        <div class="text-dark fw-bold w-75px">{{__('To')}}:</div>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <select class="form-control form-control-transparent border-0" name="to">
                            <option value="Subscribers">{{__('Subscribers')}}</option>
                            <option value="Users">{{__('Users')}}</option>
                            <option value="Admins">{{__('Admins')}}</option>
                        </select>
                        <!--end::Input-->
                    </div>
                    <!--end::From-->
                    <!--begin::From-->
                    <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                        <!--begin::Label-->
                        <div class="text-dark fw-bold w-75px">{{__('From')}}:</div>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input required type="email" class="form-control form-control-transparent border-0"
                               value="{{old('from')}}" name="from" placeholder="no-reply@example.com"/>
                        <!--end::Input-->
                    </div>
                    <!--end::From-->

                    <!--begin::From-->
                    <div class="d-flex align-items-center border-bottom px-8 min-h-50px">
                        <!--begin::Label-->
                        <div class="text-dark fw-bold w-75px">{{__('Subject')}}:</div>
                        <!--end::Label-->
                        <!--begin::Input-->
                        <input type="text" class="form-control form-control-transparent border-0"
                               value="{{old('subject')}}" name="subject" placeholder="Here is my subject"/>
                        <!--end::Input-->
                    </div>
                    <!--end::From-->


                    <!--begin::Subject-->
                    <div class="border-bottom">
                        <textarea name="message" class="form-control " id="tinymce">{!! old('message') !!}</textarea>
                    </div>
                    <!--end::Subject-->

                </div>
                <!--end::Body-->
                <!--begin::Footer-->
                <div class="d-flex flex-stack flex-wrap gap-2 py-5 ps-8 pe-5 border-top">
                    <!--begin::Actions-->
                    <div class="d-flex align-items-center me-3">
                        <!--begin::Send-->
                    </div>
                    <!--end::Actions-->
                    <!--begin::Toolbar-->
                    <div class="d-flex align-items-center">
                        <div class="btn-group me-4">
                            <!--begin::Submit-->
                            <button type="submit" class="btn btn-primary">
                                {{__('Send')}} <i class="bi bi-send-fill fs-4"></i>
                            </button>
                            <!--end::Submit-->
                        </div>
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Footer-->
            </form>
            <!--end::Form-->
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdn.tiny.cloud/1/{{Config::get('core.tinymce_key')}}/tinymce/7/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        $(function () {
            tinymce.init({
                selector: '#tinymce',
                height: 750,
                plugins: 'accordion autolink anchor code directionality fullscreen media emoticons image link lists media table preview',
                toolbar: 'undo redo | blocks  fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat  preview',
                tinycomments_mode: 'embedded',
                tinycomments_author: 'Author name',
                @if(app()->getLocale() == 'ar') language: 'ar', @endif

            });
        })
    </script>
@endsection
