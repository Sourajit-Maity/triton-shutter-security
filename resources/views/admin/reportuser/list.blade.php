<x-admin-layout title="Report User Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Report User List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('report-users.index') }}" value="Report User List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	<livewire:admin.report-user.report-user-list/>
</x-admin-layout>