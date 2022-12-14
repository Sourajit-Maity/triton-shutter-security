<x-admin-layout title="Product Details Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="Product Details List">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item href="{{ route('admin.dashboard') }}" value="Dashboard" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('products.index') }}" value="Product Details List" />
				</x-admin.breadcrumbs>

			    <x-slot name="toolbar" >
				@if(auth()->user()->id == 1)
					<a href="{{route('products.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
						<i class="la la-plus"></i>
						Add New Product Details
					</a>
				@endif
				</x-slot>
			</x-admin.sub-header>
    </x-slot>
	

    <livewire:admin.product.product-list/>
</x-admin-layout>