<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="Name" required />
            <x-admin.input type="text" wire:model.defer="profession_name" placeholder="Name"  class="{{ $errors->has('profession_name') ? 'is-invalid' :'' }}" />
            <x-admin.input-error for="profession_name" />
        </x-admin.form-group>

        </div>
        <br/>
    </x-slot>

    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('professions.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>
