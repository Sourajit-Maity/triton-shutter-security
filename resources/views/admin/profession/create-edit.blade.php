<x-admin-layout title="Profession Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $profession ? 'Edit' : 'Add' }} profession">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('professions.index') }}" value="profession List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $profession ? 'Edit' : 'Add' }} profession" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.profession-create-edit :profession="$profession"/>
</x-admin-layout>