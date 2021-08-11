<?php

namespace App\Http\Livewire\Admin\Industry;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Industry;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class IndustryList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


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
    public function getRandomColor()
    {
        $arrIndex = array_rand($this->badgeColors);
        return $this->badgeColors[$arrIndex];
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
        $industryQuery = Industry::query();
        if ($this->searchIndustry)
            $industryQuery->where('industry_name', 'like', '%' . $this->searchIndustry . '%');
        if ($this->searchIndustryDescription)
            $industryQuery->where('industry_description', 'like', '%' . $this->searchIndustryDescription . '%');
        if ($this->searchStatus >= 0)
            $industryQuery->orWhere('active', $this->searchStatus);
        return view('livewire.admin.industry.industry-list', [
            'industries' => $industryQuery
                ->orderBy($this->sortBy, $this->sortDirection) 
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Industry::destroy($id);
        $this->showModal('success', 'Success', 'Industry is deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to delete this?", 'Yes, Delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id) 
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Industry $industry)
    {
        $industry->fill(['active' => ($industry->active == 1) ? 0 : 1])->save();
     
        $this->showModal('success', 'Success', 'Industry status is changed successfully');
    }
}


