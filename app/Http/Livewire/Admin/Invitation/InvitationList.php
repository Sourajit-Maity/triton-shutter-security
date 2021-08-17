<?php

namespace App\Http\Livewire\Admin\Invitation;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Invitation;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class InvitationList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchInvited,$searchInviter, $searchStatus = -1, $searchDelete = -1, $perPage = 5;
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
        $this->searchInvited = "";
        $this->searchInviter = "";
        $this->searchStatus = -1;
    }

    public function render()
    {
        $invitationQuery = Invitation::query()->with(['usersinvitation','usersinvited']);
        if ($this->searchInvited) {
            $invited_name = User::WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->searchInvited . "%' ")->get();
            
            foreach ($invited_name as $value) {
                $invitationQuery->orWhere('invited_id', $value->id);
             }
         }
    if ($this->searchInviter) {

        $inviter_name = User::WhereRaw(
            "concat(first_name,' ', last_name) like '%" . $this->searchInviter . "%' ")->get();
    
            foreach ($inviter_name as $value) {
                $invitationQuery->orWhere('inviter_id', $value->id);
             }
         }
        if ($this->searchStatus >= 0)
            $invitationQuery->orWhere('active', $this->searchStatus);
        return view('livewire.admin.invitation.invitation-list', [
            'invitations' => $invitationQuery
                ->orderBy($this->sortBy, $this->sortDirection) 
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Invitation::destroy($id);
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

    public function changeStatus(Invitation $invitation)
    {
        $invitation->fill(['active' => ($invitation->active == 1) ? 0 : 1])->save();
     
        $this->showModal('success', 'Success', 'Invitation status is changed successfully');
    }
}