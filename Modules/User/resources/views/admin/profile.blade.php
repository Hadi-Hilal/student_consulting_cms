@extends('layouts.admin.base')

@section('title' , __('My Profile'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'My Profile'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="My Profile" :breadcrumbItems="[]"/>
@endsection

@section('content')
    <x-admin.create-card title="Profile Information" :formUrl="route('admin.profile.update')">

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"> {{__('Name')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="name"
                       value="{{old('name', $user->name)}}"/>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"> {{__('Email')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="text" class="form-control form-control-solid" name="email"
                       value="{{old('email', $user->email)}}"/>
            </div>
        </div>
    </x-admin.create-card>

    <div class="my-5"></div>
    <x-admin.create-card title="Update Password" :formUrl="route('password.update')">

        @method('put')
        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"> {{__('Current Password')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="password" class="form-control form-control-solid" name="current_password"
                       autocomplete="current_password"/>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"> {{__('New Password')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="password" class="form-control form-control-solid" name="password" autocomplete="password"/>
            </div>
        </div>

        <div class="row mb-8">
            <!--begin::Col-->
            <div class="col-xl-3">
                <div class="fs-6 fw-bold mt-2 mb-3"> {{__('Confirm Password')}}</div>
            </div>
            <!--end::Col-->
            <!--begin::Col-->
            <div class="col-xl-9 fv-row">
                <input type="password" class="form-control form-control-solid" name="password_confirmation"
                       autocomplete="password_confirmation"/>
            </div>
        </div>

    </x-admin.create-card>

    <div class="my-5"></div>

    {{--    <x-admin.create-card title="Deactivate Account" :formUrl="route('admin.profile.update')">--}}
    {{--        @method('delete')--}}
    {{--              <h2 class="text-lg font-medium text-gray-900">--}}
    {{--                {{ __('Are you sure you want to delete your account?') }}--}}
    {{--            </h2>--}}

    {{--            <p class="mt-1 text-sm text-gray-600">--}}
    {{--                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}--}}
    {{--            </p>--}}
    {{--    </x-admin.create-card>--}}

@endsection
