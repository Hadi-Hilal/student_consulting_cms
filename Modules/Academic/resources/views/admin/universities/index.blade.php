@extends('layouts.admin.base')

@section('css')
    <style>
        td .symbol > img {
            width: 225px !important;
            height: 100px !important;
        }
    </style>
@endsection
@section('title' , __('Universities'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Universities'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Universities')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">

        <a href="{{route('admin.universities.create')}}" class="btn btn-sm btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('Add New University')}}</a>

        <a href="{{route('admin.universities.export')}}" type="button" class="btn btn-sm btn-light-primary me-3"
           id="export">
            <i class="ki-duotone ki-exit-up fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
            </i>{{__('Export')}}</a>

    </div>
@endsection

@section('content')
    <x-admin.table :model="$universities" search="Search In Universities"
                   :formUrl="route('admin.universities.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">

            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>


            <th class="min-w-200px"></th>
            <th class="min-w-200px">{{__('Title')}}</th>
            <th class="min-w-125px">{{__('Price')}}</th>
            <th class="min-w-125px">{{__('Featured')}}</th>
            <th class="min-w-125px">{{__('Publish')}}</th>
            <th class="min-w-125px">{{__('Created By')}}</th>
            <th class="min-w-125px">{{__('Created At')}}</th>
            <th class="min-w-125px"><i class="bi bi-eye text-primary fa-2x"></i></th>
            <th class="min-w-125px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($universities as $university)
            <tr>

                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$university->id}}"/>
                    </div>
                </td>


                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{$university->image_link}}" target="_blank" class="symbol me-5">
                            <img src="{{$university->image_link}}" class=""
                                 alt="{{$university->title}}"/>
                        </a>
                    </div>
                </td>
                <td>
                    <span class="badge badge-primary mb-2">{{__($university->type)}}</span>
                    <h5 class="">

                        <a href="" target="_blank"
                           class=" fw-bolder text-hover-primary mb-1 fs-6">{{$university->title}}</a>
                    </h5>
                </td>

                <td>
                    <strong class="text-success">
                        {{$university->price}} $
                    </strong> <br/>
                    <span class="text-danger">
                        {{__('Discount') . ' ' . $university->discount}} %
                    </span>
                </td>
                <td>
                    {{$university->featured ? __('Yes') : __('No') }}
                    @if($university->featured)
                        <i class="bi bi-check-circle-fill text-success"></i>
                    @else
                        <i class="bi bi-x-circle-fill text-danger"></i>
                    @endif
                </td>
                <td>
                    <span
                        class="badge badge-light-{{$university->publish == 'published' ? 'success' : 'warning'}} fs-7 fw-bold">{{__($university->publish)}}</span>
                </td>
                <td>
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        <p class="text-gray-800 mb-1">{{$university->createdBy->name}}
                        </p>
                    </div>
                    <!--begin::User details-->
                </td>
                <td>
                    {{$university->created_at->diffForHumans() }}
                </td>

                <td>
                    {{$university->visits }}
                </td>
                <td>
                    <a href="{{route('admin.universities.edit' , $university->id)}}"
                       class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                        <i class="ki-duotone ki-message-edit fs-1">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>
@endsection
