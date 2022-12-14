<?php

namespace App\Http\Livewire\Admin;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Industry;
use App\Models\Profession;
use Livewire\Component;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use Spatie\MediaLibrary\Models\Media;

class UserCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $first_name,$user_name,$blankArr,$looking_for,$message, $last_name,$profession_id,$industry_id, $email, $password,$offering, $phone, $active, $password_confirmation, $user, $model_id;
    public $address,$available_to,$available_from;
    public $isEdit = false;
    public $statusList = [];
    public $statusType = [];
    public $photo;
    public $photos = [];
    public $professions = [];
    public $industries = [];
    public $model_image, $imgId, $model_documents;
    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($user = null)
    {
        if ($user) {
            $this->user = $user;
            $this->fill($this->user);
            $this->isEdit = true;
        } else
            $this->user = new User;

            $this->industries = Industry::get();
            $this->professions = Profession::get();
            $this->blankArr = [
                "value"=> "", "text"=> "== Select One =="
            ];

        $this->statusList = [
            ['value' => 0, 'text' => "Choose User"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        $this->statusType = [
            ['value' => 0, 'text' => "Choose Type"],
            ['value' => 1, 'text' => "Yes"],
            ['value' => 0, 'text' => "No"]
        ];

        $this->model_image = Media::where(['model_id' => $this->user->id, 'collection_name' => 'images'])->first();
        if (!$this->model_image == null) {
            $this->imgId = $this->model_image->id;
        }
        $this->model_documents = Media::where(['model_id' => $this->user->id, 'collection_name' => 'documents'])->get();
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'password' => ['required', 'max:255', 'min:6', 'confirmed'],
                'password_confirmation' => ['required', 'max:255', 'min:6'],
                'first_name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
                'last_name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
                'user_name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
                'active' => ['required'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users'), 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'phone' => ['required', Rule::unique('users'), 'min:8', 'max:13', 'regex:/^([0-9\s+\(\)]*)$/'],
                'address' => ['nullable'],               
                'industry_id' => ['required'],
                'message' => ['required'],
            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
                'first_name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
                'last_name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
                'user_name' => ['required', 'max:255', 'regex:/^[a-zA-Z]+$/u'],
                'active' => ['required'],
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($this->user->id), 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
                'phone' => ['required', Rule::unique('users')->ignore($this->user->id), 'regex:/^([0-9\s+\(\)]*)$/', 'min:8', 'max:13'],
                'address' => ['nullable'],               
                'industry_id' => ['required'],
                'message' => ['required'],

            ];
    }

    

    public function saveOrUpdate()
    {
        $this->user->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        if ($this->photo) {
            if ($this->imgId) {
                $item = Media::find($this->imgId);
                $item->delete(); // delete previous image in the database

                $this->user->addMedia($this->photo->getRealPath())
                    ->usingName($this->photo->getClientOriginalName())
                    ->toMediaCollection('images');
            } else {
                $this->user->addMedia($this->photo->getRealPath())
                    ->usingName($this->photo->getClientOriginalName())
                    ->toMediaCollection('images');
            }
        }
        if ($this->photos) {
            foreach ($this->photos as $photo) {
                $this->user->addMedia($photo->getRealPath())
                    ->usingName($photo->getClientOriginalName())
                    ->toMediaCollection('documents');
            }
        }
        if (!$this->isEdit)
            $this->user->assignRole('CLIENT');
        $msgAction = 'User was ' . ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success", $msgAction);

        return redirect()->route('users.index');
    }
    public function deletedocuments($id)
    {
        $item = Media::find($id);
        $item->delete(); // delete previous image in the database
        $this->showModal('success', 'Success', 'Document deleted successfully');
        $this->emit('refreshProducts');
    }
    public function render()
    {
        return view('livewire.admin.user-create-edit');
    }
}
