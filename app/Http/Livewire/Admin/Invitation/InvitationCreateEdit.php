<?php

namespace App\Http\Livewire\Admin\Invitation;

use App\Models\User;
use App\Models\ChatDetails;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\AlertMessage;


class InvitationCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $blankArr,$inviter_id,$invited_id,$invitation;
    public $address;
    public $isEdit = false;
    public $statusList = [];

    public $users = [];

    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($invitation = null)
    {
        if ($invitation) {
            $this->invitation = $invitation;
            $this->fill($this->invitation);
            $this->isEdit = true;
        } else
            $this->invitation = new ChatDetails;

            $this->users = User::role('CLIENT')->get();

            $this->blankArr = [
                "value"=> "", "text"=> "== Select One =="
            ];

        $this->statusList = [
            ['value' => 0, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];
        
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'receiver_id' => ['required'],
              

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
               
                'receiver_id' => ['required'],
            ];
    }

    protected $messages = [


        'receiver_id.required'=>'Invited name is required.',
    ];

    public function saveOrUpdate()
    {
        
        $this->isEdit ? $this->invitation->sender_id = auth()->user()->id : $this->invitation->sender_id = auth()->user()->id;

        $this->invitation->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Invitation is '. ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('invitation.index');
    }
 
    public function render()
    {
        return view('livewire.admin.invitation.invitation-create-edit');
    }
}
