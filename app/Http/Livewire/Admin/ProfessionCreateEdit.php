<?php

namespace App\Http\Livewire\Admin;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\Component;
use App\Models\Profession;
class ProfessionCreateEdit extends Component
{
    public $profession,$profession_name,$edit_id;
    use AlertMessage;
    public $isEdit = false;
    protected $rules = [
        'profession_name' => 'required|unique:professions',
    ];

    public function mount($profession = null) {
        if($profession){            
            $this->isEdit = true;
            $this->edit_id = $profession['id'];
            $this->profession_name = $profession['profession_name'];
        }
    }

    public function saveOrUpdate() {
        if($this->isEdit) {
            $ProfessionDetails = Profession::where(['id'=>$this->edit_id])->first();
            $pname = $ProfessionDetails['profession_name'];
            if($pname != $this->profession_name) {
                $this->validate();
                Profession::where('id',$this->edit_id)->update(
                    [
                        'profession_name'=>$this->profession_name
                    ]
                );
            }
        } else {
            $this->validate();
            Profession::create(['profession_name'=>$this->profession_name]);
        }       
        $msgAction = 'Profession was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('professions.index');
    }
    public function render()
    {
        return view('livewire.admin.profession-create-edit');
    }
}
