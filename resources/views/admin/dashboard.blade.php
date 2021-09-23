<x-admin-layout title="Dashboard">
    <x-slot name="subHeader">
        <x-admin.sub-header headerTitle="Dashboard">
            {{-- <x-admin.breadcrumbs>
                    <x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
            </x-admin.breadcrumbs> --}}
            <x-slot name="toolbar">
            </x-slot>
        </x-admin.sub-header>
</x-slot>

<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total users" description="Total user available in this system" :count="$count['userCount']" href="{{ route('users.index') }}" />
                    <!-- <x-admin.dashboard-count-widget-item title="Total blocked users" description="Total blocked user available in this system" :count="$count['blockedUserCount'] " href="{{ route('users.index') }}" /> -->
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total active users" description="Total active user available in this system" :count="$count['activeUserCount'] " href="{{ route('users.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
        </div>
    </div>
</div>


<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Industry" description="Total industry available in this system" :count="$count['industryCount']" href="{{ route('industry.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total active Industry" description="Total active industry available in this system" :count="$count['activeIndustryCount'] " href="{{ route('industry.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
        </div>
    </div>
</div>


<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total Profession" description="Total profession available in this system" :count="$count['professionCount']" href="{{ route('professions.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total active Profession" description="Total active profession available in this system" :count="$count['activeProfessionCount'] " href="{{ route('professions.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
            
        </div>
    </div>
</div>
<div class="kt-portlet">
    <div class="kt-portlet__body kt-portlet__body--fit">
        <div class="row row-no-padding row-col-separator-xl">
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                <x-admin.dashboard-count-widget-item title="Total City" description="Total city available in this system" :count="$count['cityCount']" href="{{ route('city.index') }}" />
                    <!-- <x-admin.dashboard-count-widget-item title="Total Country" description="Total country available in this system" :count="$count['countryCount']" href="{{ route('country.index') }}" /> -->
                </x-admin.dashboard-count-widget>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-6">
                <x-admin.dashboard-count-widget>
                    <x-admin.dashboard-count-widget-item title="Total State" description="Total state available in this system" :count="$count['stateCount']" href="{{ route('state.index') }}" />
                </x-admin.dashboard-count-widget>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-6">
        <div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    New Users
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="tab-content">
                <div class="tab-pane active" id="kt_widget4_tab1_content">
                        <div class="kt-widget4">
                            @foreach ($users as $user)
                            <div class="kt-widget4__item">
                                <div class="kt-widget4__pic kt-widget4__pic--pic">
                                    <span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold">{{substr(ucfirst($user->first_name), 0, 1)}}</span>
                                </div>
                                <div class="kt-widget4__info">
                                    <a href="#" class="kt-widget4__username">
                                        {{ $user->full_name }}
                                    </a>
                                    <p class="kt-widget4__text">
                                        {{$user->created_at->diffForHumans()}}
                                    </p>
                                </div>
                                <a href="{{ route('users.index') }}" class="btn btn-sm btn-label-brand btn-bold">View</a>
                            </div>
                            @endforeach

                        </div>
                        {{-- <a href="{{ route('users.index') }}" class="btn btn-sm btn-label-brand btn-bold mt-3">View All</a> --}}
                </div>
            </div>

        </div>
    </div>
</div>
</x-admin-layout>