<?php

namespace App\Http\Livewire\Admin\Invitation;

use App\Models\User;
use App\Models\Invitation;
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
            $this->invitation = new Invitation;

            $this->user = User::get();
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
                'invited_id' => ['required'],
              

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
               
                'invited_id' => ['required'],
            ];
    }

    protected $messages = [


        'invited_id.required'=>'Invited name is required.',
    ];

    public function saveOrUpdate()
    {
        $this->invitation->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Invitation is '. ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('invitation.index');
    }
 
    public function render()
    {
        return view('livewire.admin.invitation-create-edit');
    }
}
