@extends('layouts.admin.base')

@section('title' , __('Tips & Docs'))

@section('toolbar')
    @php
        $breadcrumbItems = [
            ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
            ['label' => 'Tips & Docs'],
        ];
    @endphp
    <x-admin.breadcrumb pageTitle="Tips & Docs" :breadcrumbItems="$breadcrumbItems"/>
    <div class="d-flex align-items-center gap-2 gap-lg-3"></div>
@endsection

@section('content')

    <div class="card mb-5">
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title fs-3 fw-bolder">{{__('Important Tips')}}</div>
            <!--end::Card title-->
        </div>
        <div class="card-body">

            <div class="my-3">
                <div class="rounded border p-5">
                    <ol class="fs-5">
                        <li>{{__('Create Your Content In ENGLISH First, After Saving It Translate It To Another Language')}}
                            .
                        </li>
                        <li>{{__("Don't Left Any Content Without Translation")}}</li>
                        <li>{{__("Please Don't UPLOAD Image Or Video Or Any Media Rather Than 750 KB")}}.</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <!--begin::Card title-->
            <div class="card-title fs-3 fw-bolder">{{__('Symbols Meaning')}}</div>
            <!--end::Card title-->
        </div>
        <div class="card-body">

            <div class="my-3">
                <div class="rounded border p-5">
                    <p class="fs-5"><span class="text-danger mx-1 fs-5">*</span> {{__('Input required')}}</p></div>
            </div>
            <div class="my-3">
                <div class="rounded border p-5">
                    <p class="fs-5">
                        <i class="bi bi-star-fill mx-1 text-warning fs-5"></i> {{__('The user is super admin and has all the permissions')}}
                    </p></div>
            </div>
            <div class="my-3">
                <div class="rounded border p-5">
                    <p class="fs-5">
                        <i class="bi bi-translate text-primary mx-1 fs-5"></i> {{__('Input has translation, so you should switch to another language and rewrite it in another language')}}
                    </p>
                </div>
            </div>

        </div>
    </div>

@endsection
