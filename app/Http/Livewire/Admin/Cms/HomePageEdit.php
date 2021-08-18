<?php

namespace App\Http\Livewire\Admin\Cms;

use Livewire\Component;

class HomePageEdit extends Component
{
    public $banner_heading,$banner_sub_heading;
    public function mount($details = null){
        if($details) {
            $details = $details->toArray();
            $this->homepagedetails = $details['home'];
            $this->fill($this->homepagedetails);
            $this->isEdit = true;            
        }        
    }
    public function render()
    {
        return view('livewire.admin.cms.home-page-edit');
    }
}
