@extends('layouts.admin.base')

@section('title' , __('University Programs'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'University Programs'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="University Programs" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.programs.create')}}" class="btn btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('New University Program')}}</a>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$programs" search="Search In University Programs"
                   :formUrl="route('admin.programs.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="min-w-150px">{{__('Image')}}</th>
            <th class="min-w-150px">{{__('Name')}}</th>
            <th class="min-w-150px">{{__('Languages')}}</th>
            <th class="min-w-150px">{{__('Program Levels')}}</th>
            <th class="min-w-150px">{{__('Universities')}}</th>
            <th class="min-w-150px "></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($programs as $program)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$program->id}}"/>
                    </div>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{$program->image_link}}" target="_blank" class="symbol">
                            <img src="{{$program->image_link}}" class="img-fluid" height="75"
                                 alt="{{$program->name}}"/>
                        </a>
                    </div>
                </td>
                <td>
                    {{$program->name}}
                </td>
                <td>
                    @foreach($program->lang as $item)
                        <img alt="{{$item}}" class="mx-1" style="height: 25px"
                             src="{{asset('images/flags/' . $item .'.svg')}}"/>
                    @endforeach
                </td>
                <td>
                    @foreach($program->levels as $item)
                        <span class="badge badge-primary badge-lg">
                            {{$item->name}}
                        </span>
                    @endforeach
                </td>
                <td>
                    {{$program->universities()->count()}}
                </td>
                <td>
                    <a href="{{route('admin.programs.edit' , $program->id)}}"
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

@section('js')

@endsection
