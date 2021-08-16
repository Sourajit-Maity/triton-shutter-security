<x-admin.form-section submit="saveOrUpdate">
    <x-slot name="form">


                    <x-admin.form-group>
                        <x-admin.lable value="Invited Name" required/>
                        <x-admin.dropdown  wire:model.defer="invited_id" placeHolderText="Please select one" autocomplete="off" class="state {{ $errors->has('invited_id') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                @foreach ($users as $user)
                                    <x-admin.dropdown-item  :value="$user['id']" :text="$user['first_name']"/>                      
                                @endforeach
                        </x-admin.dropdown>
                        <x-admin.input-error for="invited_id" />
                    </x-admin.form-group>

                    <x-admin.form-group>
                        <x-admin.lable value="Profession" required/>
                        <x-admin.dropdown  wire:model.defer="profession_id" placeHolderText="Please select one" autocomplete="off" class="state {{ $errors->has('profession_id') ? 'is-invalid' :'' }}">
                                <x-admin.dropdown-item  :value="$blankArr['value']" :text="$blankArr['text']"/> 
                                @foreach ($professions as $profession)
                                    <x-admin.dropdown-item  :value="$profession['id']" :text="$profession['profession_name']"/>                      
                                @endforeach
                        </x-admin.dropdown>
                        <x-admin.input-error for="profession_id" />
                    </x-admin.form-group>
            </div>
            <br>
    </x-slot>
    <x-slot name="actions">
        <x-admin.button type="submit" color="success" wire:loading.attr="disabled">Save</x-admin.button>
        <x-admin.link :href="route('invitation.index')" color="secondary">Cancel</x-admin.link>
    </x-slot>
</x-form-section>