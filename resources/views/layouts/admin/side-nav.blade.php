<div class="menu-item">
    <div class="menu-content pb-2">
        <span class="menu-section text-muted text-uppercase fs-8 ls-1">{{ __('Admin Tools') }}</span>
    </div>
</div>
@if(auth()->user()->can('Manage Settings')  || auth()->user()->super_admin)
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ isset($active['settings']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-wrench-adjustable"></i>
                </span>
                <span class="menu-title">{{ __('Settings') }}</span>
                <span class="menu-arrow"></span>
            </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['website_settings']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['website_settings']) ? 'active' : '' }}"
                   href="{{ route('admin.settings.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('Website Configurations') }}</span>
                </a>
            </div>
        </div>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['website_seo']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['website_seo']) ? 'active' : '' }}"
                   href="{{ route('admin.seo.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('Seo Configurations') }}</span>
                </a>
            </div>
        </div>
    </div>
@endif

@if(auth()->user()->can('Manage Academic')  || auth()->user()->super_admin)
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ isset($active['academic']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-bank"></i>
                </span>
                <span class="menu-title">{{ __('Academic Management') }}</span>
                <span class="menu-arrow"></span>
            </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['programs']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['programs']) ? 'active' : '' }}"
                   href="{{ route('admin.programs.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('University Programs') }}</span>
                </a>
            </div>
        </div>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['universities']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['universities']) ? 'active' : '' }}"
                   href="{{ route('admin.universities.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('Universities') }}</span>
                </a>
            </div>
        </div>

    </div>
@endif


@if(auth()->user()->can('Manage Blogs')  || auth()->user()->super_admin)
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ isset($active['blogs']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-columns-gap"></i>
                </span>
                <span class="menu-title">{{ __('Blogs') }}</span>
                <span class="menu-arrow"></span>
            </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['categories']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['categories']) ? 'active' : '' }}"
                   href="{{ route('admin.blogs.categories.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('Categories') }}</span>
                </a>
            </div>
        </div>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['posts']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['posts']) ? 'active' : '' }}"
                   href="{{ route('admin.blogs.posts.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('Posts') }}</span>
                </a>
            </div>
        </div>
    </div>
@endif


@if(auth()->user()->can('Manage Pages') || auth()->user()->super_admin)
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ isset($active['pages']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="bi bi-calendar4-range"></i>
                </span>
                <span class="menu-title">{{ __('Pages') }}</span>
                <span class="menu-arrow"></span>
            </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['pages']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['custom_pages']) ? 'active' : '' }}"
                   href="{{ route('admin.pages.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('General Pages') }}</span>
                </a>
            </div>
        </div>
    </div>
@endif


@if(auth()->user()->can('Manage Testimonials') || auth()->user()->super_admin)
    <div class="menu-item">
        <a class="menu-link {{ isset($active['testimonials']) ? 'active' : '' }}"
           href="{{ route('admin.testimonials.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-chat-left-quote-fill"></i>
                </span>
            <span class="menu-title">{{ __('Testimonials') }}</span>
        </a>
    </div>
@endif

@if(auth()->user()->can('Manage FAQs') || auth()->user()->super_admin)
    <div class="menu-item">
        <a class="menu-link {{ isset($active['faqs']) ? 'active' : '' }}" href="{{ route('admin.faqs.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-patch-question"></i>
                </span>
            <span class="menu-title">{{ __('FAQs') }}</span>
        </a>
    </div>
@endif

{{--@if(auth()->user()->can('Manage Teams') || auth()->user()->super_admin)--}}
{{--    <div class="menu-item">--}}
{{--        <a class="menu-link {{ isset($active['teams']) ? 'active' : '' }}"--}}
{{--           href="{{ route('admin.teams.index') }}">--}}
{{--                <span class="menu-icon">--}}
{{--                    <i class="bi bi-microsoft-teams"></i>--}}
{{--                </span>--}}
{{--            <span class="menu-title">{{ __('Our Team') }}</span>--}}
{{--        </a>--}}
{{--    </div>--}}
{{--@endif--}}

@if(auth()->user()->can('Manage FileManager') || auth()->user()->super_admin)
    <div class="menu-item">
        <a class="menu-link {{ isset($active['FileManager']) ? 'active' : '' }}"
           href="{{ route('admin.filemanager.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-cloud-arrow-down"></i>
                </span>
            <span class="menu-title">{{ __('File Manager') }}</span>
        </a>
    </div>
@endif


@if(auth()->user()->can('Manage Newsletters') || auth()->user()->super_admin)
    <div class="menu-item">
        <a class="menu-link {{ isset($active['newsletters']) ? 'active' : '' }}"
           href="{{ route('admin.newsletters.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-mailbox"></i>
                </span>
            <span class="menu-title">{{ __('Newsletters') }}</span>
        </a>
    </div>
@endif

@if(auth()->user()->can('Manage Subscribers') || auth()->user()->super_admin)
    <div class="menu-item">
        <a class="menu-link {{ isset($active['subscribers']) ? 'active' : '' }}"
           href="{{ route('admin.subscribers.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-envelope-open-heart"></i>
                </span>
            <span class="menu-title">{{ __('Subscribers') }}</span>
        </a>
    </div>
@endif


@if(auth()->user()->can('Manage Contacts') || auth()->user()->super_admin)
    <div class="menu-item">
        <a class="menu-link {{ isset($active['contacts']) ? 'active' : '' }}"
           href="{{ route('admin.contacts.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-envelope-check"></i>
                </span>
            <span class="menu-title">{{ __('Contacts') }}</span>
        </a>
    </div>
@endif

@if(auth()->user()->can('Manage Roles') || auth()->user()->super_admin)
    <div class="menu-item">
        <a class="menu-link {{ isset($active['roles']) ? 'active' : '' }}" href="{{ route('admin.roles.index') }}">
                <span class="menu-icon">
                    <i class="bi bi-shield-lock"></i>
                </span>
            <span class="menu-title">{{ __('Roles') }}</span>
        </a>
    </div>
@endif


@if(auth()->user()->can('Manage Users & Admins') || auth()->user()->super_admin)
    <div data-kt-menu-trigger="click"
         class="menu-item menu-accordion {{ isset($active['users lists']) ? 'show hover' : '' }}">
            <span class="menu-link">
                <span class="menu-icon">
                    <!--begin::Svg Icon | path: icons/duotune/communication/com013.svg-->
                    <i class="bi bi-people"></i>
                    <!--end::Svg Icon-->
                </span>
                <span class="menu-title">{{ __('Users') }}</span>
                <span class="menu-arrow"></span>
            </span>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['admins']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['admins']) ? 'active' : '' }}"
                   href="{{ route('admin.admins.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('Admins') }}</span>
                </a>
            </div>
        </div>
        <div class="menu-sub menu-sub-accordion menu-active-bg {{ isset($active['users']) ? 'show' : '' }}">
            <div class="menu-item">
                <a class="menu-link {{ isset($active['users']) ? 'active' : '' }}"
                   href="{{ route('admin.users.index') }}">
                        <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                        </span>
                    <span class="menu-title">{{ __('Users') }}</span>
                </a>
            </div>
        </div>


    </div>
@endif

<div class="menu-item">
    <div class="menu-content">
        <div class="separator mx-1 my-4"></div>
    </div>
</div>
<div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">
    <a href="{{route('admin.docs')}}"
       class="btn btn-flex flex-center btn-custom btn-primary overflow-hidden text-nowrap px-0 h-40px w-100"
       data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss-="click"
       data-bs-original-title="200+ in-house components and 3rd-party plugins" data-kt-initialized="1">

        <span class="btn-label">
            {{__('Tips & Docs')}}
        </span>

        <i class="ki-duotone ki-document btn-icon fs-2 m-0"><span class="path1"></span><span class="path2"></span></i>
    </a>
</div>
