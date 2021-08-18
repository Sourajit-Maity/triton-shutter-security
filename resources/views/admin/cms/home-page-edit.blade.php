<x-admin-layout title="Content Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $details ? 'Edit' : 'Add' }} Industry">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('pages.index') }}" value="pages List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $details ? 'Edit' : 'Add' }} Edit page content" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.cms.home-page-edit :details="$details"/>
</x-admin-layout>