<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
                    <x-admin.form-group>
                        <x-admin.lable value="Industry Name" required />
                        <x-admin.input type="text" wire:model.defer="industry_name" placeholder="Industry Name"  class="{{ $errors->has('industry_name') ? 'is-invalid' :'' }}" />
                        <x-admin.input-error for="industry_name" />
                    </x-admin.form-group>

                    <x-admin.form-group class="col-lg-12">
                        <x-admin.lable value="Industry Details" required />
                        <x-admin.textarea type="text" wire:model.defer="industry_description" placeholder="Industry Details..."  class="{{ $errors->has('industry_description') ? 'is-invalid' :'' }}" rows='8' />
                        <x-admin.input-error for="industry_description" />
                    </x-admin.form-group>
            </div>
            <br>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('industry.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>