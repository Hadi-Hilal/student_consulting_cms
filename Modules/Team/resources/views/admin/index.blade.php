@extends('layouts.admin.base')

@section('title' , __('Our Team'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Our Team'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Our Team" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.teams.create')}}" class="btn btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('Create New Member')}}</a>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$teams" search="Search In Our Teams"
                   :formUrl="route('admin.teams.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>

            <th class="ps-4 min-w-250px rounded-start">{{__('Image')}}</th>
            <th class="min-w-150px">{{__('Name')}}</th>
            <th class="min-w-150px">{{__('Position')}}</th>
            <th class="min-w-150px">{{__('Publish')}}</th>
            <th class="min-w-200px text-end rounded-end"></th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($teams as $team)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" type="checkbox" name="ids[]" value="{{$team->id}}"/>
                    </div>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{$team->image}}" target="_blank">
                            <img src="{{$team->image}}" class="img-fluid" style="height: 100px"
                                 alt="{{$team->name}}"/>
                        </a>

                    </div>
                </td>
                <td>
                    {{$team->name}}
                </td>
                <td>
                    {{$team->position}}
                </td>

                <td>
                        <span
                            class="badge badge-light-{{$team->publish == 'published' ? 'success' : 'warning'}} fs-7 fw-bold">{{__($team->publish)}}</span>
                </td>
                <td>
                    <a href="{{route('admin.teams.edit' , $team->id)}}"
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
