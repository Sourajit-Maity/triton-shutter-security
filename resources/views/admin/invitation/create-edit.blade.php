<x-admin-layout title="Invitation Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $invitation ? 'Edit' : 'Add' }} Invitation">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('invitation.index') }}" value="Invitation List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $invitation ? 'Edit' : 'Add' }} Invitation" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.invitation.invitation-create-edit :invitation="$invitation"/>
</x-admin-layout>