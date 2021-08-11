<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Http\Livewire\Traits\AlertMessage;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;
use App\Models\Profession;
class ProfessionList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;

    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['deleteConfirm', 'changeStatus'];
    public $searchIndustry,$searchIndustryDescription, $searchStatus = -1, $searchDelete = -1, $perPage = 5;

    public $searchName;
    public function mount() {
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
        $this->searchName = "";
        $this->searchStatus = -1;
        
    }
    public function deleteConfirm($id)
    {
        Profession::destroy($id);
        $this->showModal('success', 'Success', 'Profession has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this Profession!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }
    public function render() {
        $ProfessionQuery = Profession::query();
        if ($this->searchStatus >= 0)
            $ProfessionQuery->orWhere('active', $this->searchStatus);
        if($this->searchName){
            $ProfessionQuery = $ProfessionQuery->Where('profession_name', 'like', '%' . $this->searchName . '%');
        }
        return view('livewire.admin.profession-list',
            [
                'profession'=>$ProfessionQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->paginate($this->perPage)
            ]
        );
    }

    public function changeStatusConfirm($id) 
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Profession $profession)
    {
        
        $profession->fill(['active' => ($profession->active == 1) ? 0 : 1])->save();
     
        $this->showModal('success', 'Success', 'Industry status is changed successfully');
    }
}
