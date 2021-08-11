<?php

namespace App\Http\Livewire\Admin\Industry;

use Livewire\Component;
use Illuminate\Validation\Rule;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Industry;


class IndustryCreateEdit extends Component
{
    use AlertMessage;
    public $industry_name, $industry_description, $industry;
    public $isEdit=false;

    public function mount($industry = null)
    {
        if ($industry) {
            $this->industry = $industry;
            $this->fill($this->industry);
            $this->isEdit=true;
        }
        else
            $this->industry=new Industry;

    }

    public function validationRuleForSave(): array
    {
        return
            [
                'industry_name' => ['required', 'max:255', Rule::unique('industries')],
                'industry_description' => ['required'],
            ];
    }

    public function validationRuleForUpdate(): array
    {
        return
            [   
                'industry_name' => ['required', 'max:255', Rule::unique('industries')->ignore($this->industry->id)],
                'industry_description' => ['required'],
            ];
    }

    public function saveOrUpdate()
    {
        $this->industry->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Industry is '. ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('industry.index');
    }

    public function render()
    {
        return view('livewire.admin.industry.industry-create-edit');
    }
}

