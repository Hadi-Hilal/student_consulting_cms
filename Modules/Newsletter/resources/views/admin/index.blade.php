@extends('layouts.admin.base')

@section('title' , __('Newsletters'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Newsletters'],
        ];
    @endphp
    <x-admin.breadcrumb :pageTitle="__('Newsletters')" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3">
        <a href="{{route('admin.newsletters.create')}}" class="btn btn-sm btn-light-primary me-3">
            <i class="ki-duotone ki-message-add fs-2">
                <span class="path1"></span>
                <span class="path2"></span>
                <span class="path3"></span>
            </i>
            {{__('Send New Newsletter')}}</a>
    </div>
@endsection

@section('content')
    <x-admin.table :model="$letters" search="Search In Newsletters"
                   :formUrl="route('admin.newsletters.deleteMulti')">
        <!--begin::Table head-->
        <thead>
        <tr class="text-start text-muted fw-bold fs-7 gs-0">
            <th class="w-10px pe-2" data-orderable="false">
                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                           data-kt-check-target="#dataTable .form-check-input" value="1"/>
                </div>
            </th>
            <th class="min-w-150px">{{__('From')}}</th>
            <th class="min-w-100px">{{__('To')}}</th>
            <th class="min-w-100px">{{__('Lang')}}</th>
            <th class="min-w-100px">{{__('Message Status')}}</th>
            <th class="min-w-100px">{{__('Count Receivers')}}</th>
            <th class="min-w-100px">{{__('Message Details')}}</th>
            <th class="min-w-100px">{{__('Created By')}}</th>
            <th class="min-w-100px">{{__('Created At')}}</th>
        </tr>
        </thead>
        <!--end::Table head-->
        <!--begin::Table body-->
        <tbody class="text-gray-600 fw-semibold">
        @foreach($letters as $letter)
            <tr>
                <td>
                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                        <input class="form-check-input" @disabled($letter->status == 'Pending')  type="checkbox"
                               name="ids[]" value="{{$letter->id}}"/>
                    </div>
                </td>

                <td>
                    {{$letter->from}}
                </td>
                <td>
                    <strong> {{__($letter->to)}} </strong>
                </td>
                <td>
                    {{$letter->lang}}
                </td>
                <td>
                    <span
                        class="badge badge-{{$letter->status == 'Sent' ? 'success' :'warning'}}"> {{__($letter->status)}}</span>
                </td>

                <td>
                    <strong>{{$letter->count_receivers}} </strong>
                </td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                        {{__('View')}}
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                         aria-hidden="true">
                        <div class="modal-dialog" style="max-width: 700px!important;">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">{{__('Message Details')}}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-5">
                                        <h5 class="mb-2"><span
                                                class="text-primary fw-bold mx-1">{{__('Subject')}}:</span> {{$letter->subject}}
                                        </h5>
                                    </div>
                                    <div class="mb-3">
                                        <h5 class="mb-2 text-primary">{{__('Message')}}: </h5>
                                        {!! $letter->message !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </td>
                <td>
                    <!--begin::User details-->
                    <div class="d-flex flex-column">
                        <p class="text-gray-800 mb-1">{{$letter->createdBy->name}}
                        </p>
                    </div>
                    <!--begin::User details-->
                </td>

                <td>
                    {{$letter->created_at}}
                </td>
            </tr>
        @endforeach
        </tbody>
        <!--end::Table body-->
    </x-admin.table>

@endsection
