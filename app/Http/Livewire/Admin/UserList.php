<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Industry;
use App\Models\Profession;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class UserList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchName, $searchIndustry,$searchUsername, $searchProfession, $searchEmail, $searchPhone, $searchStatus = -1, $perPage = 5;
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
        $this->searchName = "";
        $this->searchEmail = "";
        $this->searchPhone = "";
        $this->searchProfession = "";
        $this->searchIndustry = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $userQuery = User::query()->with(['industries','professions']);
        if ($this->searchName)
            $userQuery->WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->searchName . "%' "
            );
        if ($this->searchEmail)
            $userQuery->orWhere('email', 'like', '%' . $this->searchEmail . '%');
        if ($this->searchUsername)
            $userQuery->orWhere('user_name', 'like', '%' . $this->searchUsername . '%');
        if ($this->searchPhone)
            $userQuery->orWhere('phone', 'like', '%' . $this->searchPhone . '%');
        if ($this->searchStatus >= 0)
            $userQuery->orWhere('active', $this->searchStatus);
        if ($this->searchProfession) {
                $profession_name = Profession::Where('profession_name', 'like', '%' . $this->searchProfession . '%')->get();
                foreach ($profession_name as $value) {
                    $userQuery->orWhere('profession_id', $value->id);
                 }
             }
        if ($this->searchIndustry) {
                $industry_name = Industry::Where('industry_name', 'like', '%' . $this->searchIndustry . '%')->get();
                foreach ($industry_name as $value) {
                    $userQuery->orWhere('industry_id', $value->id);
                 }
             }
          
        return view('livewire.admin.user-list', [
            'users' => $userQuery
                ->orderBy($this->sortBy, $this->sortDirection)
                ->role('CLIENT')
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        User::destroy($id);
        $this->showModal('success', 'Success', 'User has been deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "You won't be able to recover this user!", 'Yes, delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(User $user)
    {
        $user->fill(['active' => ($user->active == 1) ? 0 : 1])->save();
        if ($user->active != 1) {
            $user->tokens->each(function ($token, $key) {
                $token->delete();
            });
        }
        $this->showModal('success', 'Success', 'User status has been changed successfully');
    }
}
