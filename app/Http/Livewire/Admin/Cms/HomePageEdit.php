<?php

namespace App\Http\Livewire\Admin\Cms;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Http\Livewire\Traits\AlertMessage;
use App\Models\Cms;
use App\Models\HomePage;

class HomePageEdit extends Component
{
    use AlertMessage;
    use WithFileUploads;
    public $banner_heading,$banner_sub_heading,$banner_description,$banner_image = "",$details;

    public function mount($details = null){
        if($details) {
            $details = $details->toArray();
            $this->homepagedetails = $details['home'];
            $this->fill($this->homepagedetails);
            $this->isEdit = true;            
        }        
    }


    public function validationRuleForUpdate(): array
    {
        return
            [
                'banner_heading' => ['required', 'max:255'],
                'banner_sub_heading' => ['required', 'max:255'],
                'banner_description' => ['required'],
               //  'banner_image' => ['sometimes','image', 'max:20000'],
            ];
    }

    protected $messages = [
        'banner_image.mimes' => 'Only Jpg, Jpeg, Png format are allowed.',
        'banner_image.max' => 'Image size should be within 20mb.',
    ];

    public function saveOrUpdate()
    {
        
        if ($this->details->home) {
            $validatedData = $this->validate($this->validationRuleForUpdate());
            if (!is_string($this->banner_image)) {
                $this->validate([
                    'banner_image' => ['mimes:jpg,jpeg,png', 'max:20000']
                ]);
                File::delete(public_path() . '/storage/' . $this->banner_image);
                $name = md5($this->banner_image . microtime()) . '.' . $this->banner_image->extension();
                $this->banner_image->storeAs("cms_images", $name, "public");
                $validatedData['banner_image'] = "cms_images/" . $name;
            }
            
        
            
            $this->details->home->update($validatedData);
            $msgAction = $this->details->name . ' Page has been updated';
            $this->showToastr("success", $msgAction);
            return redirect()->route('pages.index');
        }
        $this->showToastr("error", "No record to update!!");
        return redirect()->route('pages.index');
    }

    public function render()
    {
        return view('livewire.admin.cms.home-page-edit');
    }
}
