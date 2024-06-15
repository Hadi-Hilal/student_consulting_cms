@extends('layouts.admin.base')

@section('title' , __('Dashboard'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Dashboard" :breadcrumbItems="[]"/>
@endsection

@section('content')

    <!--begin::Alert-->
    <div
        class="alert alert-dismissible bg-light-primary border border-primary d-flex flex-column flex-sm-row p-3 mb-10">

        <h2 class="fw-bold p-3"><img src="{{asset('images/custom/robot.png')}}" class="mx-1"
                                     alt="robot"> {{__('Welcome Back') . ' ' . auth()->user()->name}}
        </h2>
        <button type="button"
                class="position-absolute position-sm-relative m-2 m-sm-0 top-0 end-0 btn btn-icon ms-sm-auto"
                data-bs-dismiss="alert">
            <i class="bi bi-x-lg"></i>
        </button>
        <!--end::Close-->
    </div>
    <!--end::Alert-->

    <div class="row">
        <div class="col-md-6 col-lg-6">
            <div class="row">
                <div class="col-4">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                         style="background-color: #4f758b">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-3"><i
                                        class="bi bi-broadcast-pin fs-2hx text-white mx-2"></i> {{ $counts['pages'] }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-white opacity-75 pt-1 fw-semibold fs-6">{{__('Total Pages Count')}}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
                <div class="col-4">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                         style="background-color: #4f758b">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-3"><i
                                        class="bi bi-columns-gap fs-2hx text-white mx-2"></i> {{$counts['blogs'] }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-white opacity-75 pt-1 fw-semibold fs-6">{{__('Total Posts Count')}}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>

                <div class="col-4">
                    <div class="card card-flush bgi-no-repeat bgi-size-contain bgi-position-x-end mb-5 mb-xl-10"
                         style="background-color: #4f758b">
                        <!--begin::Header-->
                        <div class="card-header pt-5">
                            <!--begin::Title-->
                            <div class="card-title d-flex flex-column">
                                <!--begin::Amount-->
                                <span class="fs-2hx fw-bold text-white me-2 lh-1 ls-n2 mb-3"><i
                                        class="bi bi-bank fs-2hx text-white mx-2"></i> {{$counts['universities'] }}</span>
                                <!--end::Amount-->
                                <!--begin::Subtitle-->
                                <span
                                    class="text-white opacity-75 pt-1 fw-semibold fs-6">{{__('Total Universities Count')}}</span>
                                <!--end::Subtitle-->
                            </div>
                            <!--end::Title-->
                        </div>
                        <!--end::Header-->
                        <!--begin::Card body-->
                        <div class="card-body d-flex align-items-end pt-0">
                        </div>
                        <!--end::Card body-->
                    </div>
                </div>
            </div>

            <div class="card card-flush">
                <!--begin::Heading-->
                <div
                    class="card-header rounded bgi-no-repeat bgi-size-cover bgi-position-y-top bgi-position-x-center align-items-start h-100px"
                    data-bs-theme="light">

                </div>
                <!--end::Heading-->
                <!--begin::Body-->
                <div class="card-body mt-n20">
                    <!--begin::Stats-->
                    <div class="mt-n20 position-relative">
                        <!--begin::Row-->
                        <div class="row g-3 g-lg-6">
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-200 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-5">
                                        <i class="bi bi-envelope-open-heart fs-1 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{$counts['subscribers']}}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{__('Subscribers')}}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-200 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-5">

                                        <i class="bi bi-envelope-check fs-1 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{ $counts['contacts'] }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{ __('Contacts') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-200 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-5">
                                        <i class="bi bi-people fs-1 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{$counts['users'] }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{ __('Users') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-6">
                                <!--begin::Items-->
                                <div class="bg-gray-200 bg-opacity-70 rounded-2 px-6 py-5">
                                    <!--begin::Symbol-->
                                    <div class="symbol symbol-30px me-5 mb-5">
                                        <i class="bi bi-person-fill-gear fs-1 mx-1"></i>
                                    </div>
                                    <!--end::Symbol-->
                                    <!--begin::Stats-->
                                    <div class="m-0">
                                        <!--begin::Number-->
                                        <span
                                            class="text-gray-700 fw-bolder d-block fs-2qx lh-1 ls-n1 mb-1">{{$counts['admins'] }}</span>
                                        <!--end::Number-->
                                        <!--begin::Desc-->
                                        <span class="text-gray-500 fw-semibold fs-6">{{ __('Admins') }}</span>
                                        <!--end::Desc-->
                                    </div>
                                    <!--end::Stats-->
                                </div>
                                <!--end::Items-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Stats-->
                </div>
                <!--end::Body-->
            </div>

        </div>
        <div class="col-md-6 col-lg-6">

            <div class="card card-flush ">
                <!--begin::Header-->
                <div class="card-header pt-5">
                    <!--begin::Title-->
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">{{__('Top Queries Searched')}}</span>

                    </h3>
                    <!--end::Title-->

                    <!--begin::Toolbar-->
                    <div class="card-toolbar">
                        {{--            <a href="#" class="btn btn-sm btn-light">PDF Report</a>--}}
                    </div>
                    <!--end::Toolbar-->
                </div>
                <!--end::Header-->

                <!--begin::Body-->
                <div class="card-body d-flex justify-content-between flex-column py-3">

                    <!--begin::Table container-->
                    <div class="table-responsive mb-n2">
                        <!--begin::Table-->
                        <table class="table table-row-dashed gs-0 gy-4">
                            <!--begin::Table head-->
                            <thead>
                            <tr class="fs-7 fw-bold border-0 text-gray-500">
                                <th class="min-w-300px">{{__('Query')}}</th>
                                <th class="min-w-100px">{{__('Count Of Search')}}</th>
                            </tr>
                            </thead>
                            <!--end::Table head-->

                            <!--begin::Table body-->
                            <tbody>
                            @foreach($search as $item)
                                <tr>
                                    <td>
                                        <a href="#"
                                           class="text-gray-600 fw-bold text-hover-primary mb-1 fs-6">{{$item->query}}</a>
                                    </td>
                                    <td class="d-flex align-items-center border-0">
                                        <span class="fw-bold text-gray-800 fs-6 me-3">{{$item->count}}</span>

                                        <div class="progress rounded-start-0">
                                            <div class="progress-bar bg-success m-0" role="progressbar"
                                                 style="height: 12px;width: 100px" aria-valuenow="{{$item->count}}"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100px"></div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                    <!--end::Table container-->
                    {!! $search->links() !!}
                </div>
                <!--end::Body-->
            </div>


        </div>

    </div>
@endsection

