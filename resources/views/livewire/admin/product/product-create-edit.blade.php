<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">
        <x-admin.form-group>
            <x-admin.lable value="User Name" required/>
                <x-admin.dropdown  wire:model.defer="sender_id" placeHolderText="Please select one" autocomplete="off" class="state {{ $errors->has('sender_id') ? 'is-invalid' :'' }}">
                        <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                        @foreach ($users as $user)
                            <x-admin.dropdown-item  :value="$user['id']" :text="$user['first_name']"/>                      
                        @endforeach
                </x-admin.dropdown>
            <x-admin.input-error for="sender_id" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Product Name" required />
                        <x-admin.input type="text" wire:model.defer="product_name" placeholder="Product Name" autocomplete="off" class="{{ $errors->has('product_name') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="product_name" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Product Token" required />
                        <x-admin.input type="text" wire:model.defer="product_token" placeholder="Product Token" autocomplete="off" class="{{ $errors->has('product_token') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="product_token" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Location Name" required />
                        <x-admin.input type="text" wire:model.defer="location" placeholder="Location Name" autocomplete="off" class="{{ $errors->has('location') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="location" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Location Area" required />
                        <x-admin.input type="text" wire:model.defer="location_area" placeholder="Location Area" autocomplete="off" class="{{ $errors->has('location_area') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="location_area" />
        </x-admin.form-group>

        <x-admin.form-group>
                        <x-admin.lable value="Sim Number" required />
                        <x-admin.input type="text" wire:model.defer="sim_number" placeholder="Sim Number" autocomplete="off" class="{{ $errors->has('sim_number') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="sim_number" />
        </x-admin.form-group>
        <x-admin.form-group>
                        <x-admin.lable value="Validity" required />
                        <x-admin.input type="text" wire:model.defer="validity" placeholder="Validity" autocomplete="off" class="{{ $errors->has('validity') ? 'is-invalid' :'' }}"/>
                        <x-admin.input-error for="validity" />
        </x-admin.form-group>
        
        <x-admin.form-group>
            <x-admin.lable value="Device Status" required/>
                <x-admin.dropdown  wire:model.defer="accept" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('accept') ? 'is-invalid' :'' }}">
                        @foreach ($statusListOne as $status)
                            <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>                          
                        @endforeach
                </x-admin.dropdown>
            <x-admin.input-error for="accept" />
        </x-admin.form-group>
        <x-admin.form-group>
            <x-admin.lable value="Status" required/>
                <x-admin.dropdown  wire:model.defer="active" placeHolderText="Please select one" autocomplete="off" class="{{ $errors->has('active') ? 'is-invalid' :'' }}">
                        @foreach ($statusList as $status)
                            <x-admin.dropdown-item  :value="$status['value']" :text="$status['text']"/>                          
                        @endforeach
                </x-admin.dropdown>
            <x-admin.input-error for="active" />
        </x-admin.form-group>

            </div>
            <br>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('products.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>