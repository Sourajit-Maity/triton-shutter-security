<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\User;
use App\Models\Product;
use App\Models\Profession;
use Illuminate\Validation\Rule;
use Livewire\WithFileUploads;
use App\Http\Livewire\Traits\AlertMessage;

class ProductCreateEdit extends Component
{
    use WithFileUploads;
    use AlertMessage;
    public $blankArr,$sender_id,$receiver_id,$profession_id,$product_token,$active,$accept,$product;
    public $address;
    public $isEdit = false;
    public $statusList = [];
    public $statusListOne = [];

    public $users = [];

    protected $listeners = ['refreshProducts' => '$refresh'];

    public function mount($product = null)
    {
        if ($product) {
            $this->product = $product;
            $this->fill($this->product);
            $this->isEdit = true;
        } else
            $this->product = new Product;

            $this->users = User::role('CLIENT')->get();
            $this->professions = Profession::get();

            $this->blankArr = [
                "value"=> "", "text"=> "== Select One =="
            ];

        $this->statusList = [
            ['value' => 0, 'text' => "Choose Status"],
            ['value' => 1, 'text' => "Active"],
            ['value' => 0, 'text' => "Inactive"]
        ];

        

    $this->statusListOne = [
        ['value' => 0, 'text' => "Choose Device"],
        ['value' => 1, 'text' => "Request"],
        ['value' => 2, 'text' => "Accepted"],
        ['value' => 3, 'text' => "Cancel"]
    ];
        
    }

    public function validationRuleForSave(): array
    {
        return
            [
                'sender_id' => ['required'],
                'profession_id' => ['required'],
                'product_token' => ['required'],
                'accept' => ['required'],
                'active' => ['required'],
              

            ];
    }
    public function validationRuleForUpdate(): array
    {
        return
            [
               
                'sender_id' => ['required'],
                'profession_id' => ['required'],
                'product_token' => ['required'],
                'accept' => ['required'],
                'active' => ['required'],
            ];
    }

    protected $messages = [


        'sender_id.required'=>'User name is required.',
        'profession_id.required'=>'Product name is required.',
        'product_token.required'=>'Product Token is required.',
        'accept.required'=>'Device Status name is required.',
        'active.required'=>'Status is required.',
    ];

    public function saveOrUpdate()
    {
        
        $this->isEdit ? $this->product->verify_user_id = auth()->user()->id : $this->product->verify_user_id = auth()->user()->id;

        $this->product->fill($this->validate($this->isEdit ? $this->validationRuleForUpdate() : $this->validationRuleForSave()))->save();
        
        $msgAction = 'Product Details is '. ($this->isEdit ? 'updated' : 'added') . ' successfully';
        $this->showToastr("success",$msgAction);

        return redirect()->route('products.index');
    }

    public function render()
    {
        return view('livewire.admin.product.product-create-edit');
    }
}
