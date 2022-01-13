<?php

namespace App\Http\Livewire\Admin\ReportUser;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\UserBlockList;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class ReportUserList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchBlockedUser,$searchMessageTime,$searchMessage,$searchUser,$searchAccept, $searchStatus = -1, $searchDelete = -1, $perPage = 5;
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
        $this->searchBlockedUser = "";
        $this->searchUser = "";
        $this->searchMessage = "";
        $this->searchMessageTime = "";
        $this->searchStatus = -1;
        $this->searchAccept = "";
    }

    public function render()
    {
        $Query = UserBlockList::query()->with(['userId','blockUserId']);
        if ($this->searchBlockedUser) {
            $invited_name = User::WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->searchBlockedUser . "%' ")->get();
            
            foreach ($invited_name as $value) {
                $Query->orWhere('block_user_id', $value->id);
             }
         }
    if ($this->searchUser) {

        $inviter_name = User::WhereRaw(
            "concat(first_name,' ', last_name) like '%" . $this->searchUser . "%' ")->get();
    
            foreach ($inviter_name as $value) {
                $Query->orWhere('user_id', $value->id);
             }
         }
        if($this->searchMessage){
            $Query = $Query->Where('report_message', 'like', '%' . $this->searchMessage . '%');
            }
        if($this->searchMessageTime){
                $Query = $Query->Where('report_message_time', 'like', '%' . $this->searchMessageTime . '%');
                }
        return view('livewire.admin.report-user.report-user-list', [
            'reportusers' => $Query
                ->where('report_message','!=',NULL)
                ->orderBy($this->sortBy, $this->sortDirection) 
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        UserBlockList::destroy($id);
        $this->showModal('success', 'Success', 'Invitation is deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to delete this?", 'Yes, Delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id) 
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(UserBlockList $invitation)
    {
        $invitation->fill(['active' => ($invitation->active == 1) ? 0 : 1])->save();
     
        $this->showModal('success', 'Success', 'Invitation status is changed successfully');
    }
}
    
