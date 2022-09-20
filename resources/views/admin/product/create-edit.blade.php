<x-admin-layout title="Product Details Management">
    <x-slot name="subHeader">
            <x-admin.sub-header headerTitle="{{ $product ? 'Edit' : 'Add' }} Product Details">
				<x-admin.breadcrumbs>
						<x-admin.breadcrumbs-item  value="Dashboard" href="{{ route('admin.dashboard') }}" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item href="{{ route('products.index') }}" value="Product Details List" />
						<x-admin.breadcrumbs-separator />
						<x-admin.breadcrumbs-item  value="{{ $product ? 'Edit' : 'Add' }} Product Details" />

				</x-admin.breadcrumbs>
				<x-slot name="toolbar">	
				</x-slot>
			</x-admin.sub-header>
	</x-slot>
	<livewire:admin.product.product-create-edit :product="$product"/>
</x-admin-layout>