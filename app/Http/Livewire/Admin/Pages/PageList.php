<?php

namespace App\Http\Livewire\Admin\Pages;

use App\Http\Livewire\Traits\AlertMessage;
use Livewire\Component;
use App\Models\Cms;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
class PageList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];  
    protected $paginationTheme = 'bootstrap';

    public $searchIndustry,$searchIndustryDescription, $searchStatus = -1, $searchDelete = -1, $perPage = 5;
    protected $listeners = ['deleteConfirm', 'changeStatus'];

    public function mount()
    {
        $this->perPageList = [
            ['value' => 5, 'text' => "5"],
            ['value' => 10, 'text' => "10"],
            ['value' => 20, 'text' => "20"],
            ['value' => 50, 'text' => "50"],
            ['value' => 100, 'text' => "100"]
        ];
    }

    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function search()
    {
        $this->resetPage();
    }
    public function resetSearch()
    {
        $this->searchIndustry = "";
        $this->searchIndustryDescription = "";
        $this->searchStatus = -1;
    }
    public function render()
    {
        $CmsQuery = Cms::query();
        
        return view('livewire.admin.pages.page-list',
            [
                'pages' => $CmsQuery
                ->orderBy($this->sortBy, $this->sortDirection) 
                ->paginate($this->perPage)
            ]
        );
    }
}
