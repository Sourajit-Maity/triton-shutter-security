<x-admin.table>
    {{-- <x-slot name="search">
        <x-admin.input type="search" class="form-control form-control-sm" wire:model.debounce.500ms="search"
            aria-controls="kt_table_1" id="generalSearch" />
    </x-slot> --}}
    <x-slot name="perPage">
        <label>Show
            <x-admin.dropdown wire:model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                @foreach ($perPageList as $page)
                    <x-admin.dropdown-item :value="$page['value']" :text="$page['text']" />
                @endforeach
            </x-admin.dropdown> entries
        </label>
    </x-slot>

    <x-slot name="thead">
        <tr role="row">
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 18%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">User Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('sender_id')"></i>
            </th>
          <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Product Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('product_name')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Product Token <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('product_token')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 15%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Status <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('accept')"></i>
            </th>
            <th class="align-center" tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 12%;"
                aria-label="Status: activate to sort column ascending">Status</th>
           
            <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th>
        </tr>

        <tr class="filter">
            <th>
                <x-admin.input type="search" wire:model.defer="searchInvited" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
           <th>
                <x-admin.input type="search" wire:model.defer="searchProductDetails" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <x-admin.input type="search" wire:model.defer="searchProductToken" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" />
            </th>
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>
            
            <th>
                <select class="form-control form-control-sm form-filter kt-input" wire:model.defer="searchStatus"
                    title="Select" data-col-index="2">
                    <option value="-1">Select</option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
            </th>
 
            <th>
                <div class="row">
                    <div class="col-md-6">
                        <button class="btn btn-brand kt-btn btn-sm kt-btn--icon" wire:click="search">
                            <span>
                                <i class="la la-search"></i>
                                <span>Search</span>
                            </span>
                        </button>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-secondary kt-btn btn-sm kt-btn--icon" wire:click="resetSearch">
                            <span>
                                <i class="la la-close"></i>
                                <span>Reset</span>
                            </span>
                        </button>
                    </div>
                </div>
            </th>
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($productdetails as $productdetail)
            <tr role="row" class="odd">
             
                <td class="sorting_1" tabindex="0">
                    <div class="kt-user-card-v2">
                        <div class="kt-user-card-v2__pic">
                            <div class="kt-badge kt-badge--xl kt-badge--{{ $this->getRandomColor() }}">
                                <span>{{ substr($productdetail->senderProductRequestId->first_name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="kt-user-card-v2__details">
                            <span class="kt-user-card-v2__name">{{ $productdetail->senderProductRequestId->full_name }}</span>
                            <a href="#" class="kt-user-card-v2__email kt-link">Joined since
                                {{ $productdetail->created_at->diffForHumans(null, true) . ' ' }}</a>
                        </div>
                    </div>
                </td>
                <td class="sorting_1" tabindex="0">
                     <span>{{ $productdetail->product_name }}</span>                        
                </td>   
                <td class="sorting_1" tabindex="0">
                     <span>{{ $productdetail->product_token }}</span>                        
                </td>       
                @if($productdetail->accept == 1)
                <td class="sorting_1" tabindex="0">Requested</td>
                @else
                <td class="sorting_1" tabindex="0">Accepted</td>
                @endif
                <td class="align-center"><span
                        class="kt-badge  kt-badge--{{ $productdetail->active == 1 ? 'success' : 'warning' }} kt-badge--inline kt-badge--pill cursor-pointer"
                        wire:click="changeStatusConfirm({{ $productdetail->id }})">{{ $productdetail->active == 1 ? 'Active' : 'Inactive' }}</span>
                </td>
                <x-admin.td-action>
                @if(auth()->user()->id == 1)
                    <a class="dropdown-item" href="{{ route('products.edit', ['product' => $productdetail->id]) }}"><i
                            class="la la-edit"></i> Edit</a>
                    <button href="#" class="dropdown-item" wire:click="deleteAttempt({{ $productdetail->id }})"><i
                            class="fa fa-trash"></i> Delete</button>
                @endif
                </x-admin.td-action>
            </tr>
        @empty 
            <tr>
                <td colspan="5" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $productdetails->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $productdetails->firstitem() }} to {{ $productdetails->lastitem() }} of {{ $productdetails->total() }} entries
    </x-slot>
</x-admin.table>
