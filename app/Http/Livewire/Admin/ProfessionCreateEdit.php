<?php

namespace App\Http\Livewire\Admin;
use App\Http\Livewire\Traits\AlertMessage;
use Livewire\Component;
use App\Models\Profession;
class ProfessionCreateEdit extends Component
{
    public $profession,$name;
    use AlertMessage;
    public $isEdit = false;
    protected $rules = [
        'name' => 'required|unique:professions',
    ];

    public function mount($profession = null) {
        if($profession){
            $this->isEdit = true;
        }
    }

    public function saveOrUpdate() {
        $this->validate();
        Profession::create(['name'=>$this->name]);
        $msgAction = 'Profession was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('professions.index');
    }
    public function render()
    {
        return view('livewire.admin.profession-create-edit');
    }
}
