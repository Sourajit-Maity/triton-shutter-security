<x-admin-layout title="Profession Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Profession List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('professions.index') }}" value="Profession List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
					<a href="{{route('professions.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Profession
					</a>
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	

    <livewire:admin.profession-list/>
</x-admin-layout>