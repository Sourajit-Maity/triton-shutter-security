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
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 22%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Blocked User Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('block_user_id')"></i>
            </th>
          <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 22%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">User Name <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('user_id')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 22%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Message <i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('report_message')"></i>
            </th>
            <th tabindex="0" aria-controls="kt_table_1" rowspan="1" colspan="1" style="width: 22%;"
                aria-sort="ascending" aria-label="Agent: activate to sort column descending">Message Time<i
                    class="fa fa-fw fa-sort pull-right" style="cursor: pointer;" wire:click="sortBy('report_message_time')"></i>
            </th>
           
           
            <!-- <th class="align-center" rowspan="1" colspan="1" style="width: 20%;" aria-label="Actions">Actions</th> -->
        </tr>

        <tr class="filter">
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchBlockedUser" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>
           <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchUser" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchMessage" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>
            <th>
                <!-- <x-admin.input type="search" wire:model.defer="searchMessageTime" placeholder="" autocomplete="off"
                    class="form-control-sm form-filter" /> -->
            </th>
            
           
 
            <!-- <th>
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
            </th> -->
        </tr>
    </x-slot>

    <x-slot name="tbody">
        @forelse($reportusers as $reportuser)
            <tr role="row" class="odd">
             
                <td class="sorting_1" tabindex="0">
                    <div class="kt-user-card-v2">
                        <div class="kt-user-card-v2__pic">
                            <div class="kt-badge kt-badge--xl kt-badge--{{ $this->getRandomColor() }}">
                                <span>{{ substr($reportuser->blockUserId->first_name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="kt-user-card-v2__details">
                            <span class="kt-user-card-v2__name">{{ $reportuser->blockUserId->full_name }}</span>
                            <a href="#" class="kt-user-card-v2__email kt-link">Blocked since
                                {{ $reportuser->created_at->diffForHumans(null, true) . ' ' }}</a>
                        </div>
                    </div>
                </td>
                <td class="sorting_1" tabindex="0">
                    <div class="kt-user-card-v2">
                        <div class="kt-user-card-v2__pic">
                            <div class="kt-badge kt-badge--xl kt-badge--{{ $this->getRandomColor() }}">
                                <span>{{ substr($reportuser->userId->first_name, 0, 1) }}</span>
                            </div>
                        </div>
                        <div class="kt-user-card-v2__details">
                            <span class="kt-user-card-v2__name">{{ $reportuser->userId->full_name }}</span>
                            <a href="#" class="kt-user-card-v2__email kt-link">Blocked since
                                {{ $reportuser->created_at->diffForHumans(null, true) . ' ' }}</a>
                        </div>
                    </div>
                </td>       
               
                <td class="sorting_1" tabindex="0">{{ $reportuser->report_message }}</td>
               
                <td class="sorting_1" tabindex="0">{{ $reportuser->report_message_time }}</td>
            
            </tr>
        @empty 
            <tr>
                <td colspan="5" class="align-center">No records available</td>
            </tr>
        @endforelse
    </x-slot>
    <x-slot name="pagination">
        {{ $reportusers->links() }}
    </x-slot>
    <x-slot name="showingEntries">
        Showing {{ $reportusers->firstitem() }} to {{ $reportusers->lastitem() }} of {{ $reportusers->total() }} entries
    </x-slot>
</x-admin.table>
