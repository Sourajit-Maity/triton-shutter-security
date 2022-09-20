<?php

namespace App\Http\Livewire\Admin\Product;

use App\Http\Livewire\Traits\AlertMessage;
use App\Models\User;
use App\Models\Product;
use App\Models\Profession;
use Livewire\Component;
use Livewire\WithPagination;
use App\Http\Livewire\Traits\WithSorting;

class ProductList extends Component
{
    use WithPagination;
    use WithSorting;
    use AlertMessage;
    public $perPageList = [];
    public $badgeColors = ['info', 'success', 'brand', 'dark', 'primary', 'warning'];


    protected $paginationTheme = 'bootstrap';

    public $searchInvited,$searchProductDetails,$searchAccept, $searchStatus = -1, $searchDelete = -1, $perPage = 5;
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
        $this->searchProductDetails = "";
        $this->searchStatus = -1;
        $this->searchAccept = "";
    }

    public function render()
    {
        $dataQuery = Product::query()->with(['senderProductRequestId','productRequestId']);
        if ($this->searchInvited) {
            $invited_name = User::WhereRaw(
                "concat(first_name,' ', last_name) like '%" . $this->searchInvited . "%' ")->get();
            
            foreach ($invited_name as $value) {
                $dataQuery->orWhere('sender_id', $value->id);
             }
         }
    if ($this->searchProductDetails) {

        $inviter_name = User::WhereRaw(
            "concat(profession_name,' ',) like '%" . $this->searchProductDetails . "%' ")->get();
    
            foreach ($inviter_name as $value) {
                $dataQuery->orWhere('profession_id', $value->id);
             }
         }
        if ($this->searchStatus >= 0)
            $dataQuery->orWhere('active', $this->searchStatus);
        if($this->searchAccept){
                $dataQuery = $dataQuery->Where('accept', 'like', '%' . $this->searchAccept . '%');
            }
        return view('livewire.admin.product.product-list', [
            'productdetails' => $dataQuery
                ->orderBy($this->sortBy, $this->sortDirection) 
                ->paginate($this->perPage)
        ]);
    }
    public function deleteConfirm($id)
    {
        Product::destroy($id);
        $this->showModal('success', 'Success', 'Product Details is deleted successfully');
    }
    public function deleteAttempt($id)
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to delete this?", 'Yes, Delete!', 'deleteConfirm', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatusConfirm($id) 
    {
        $this->showConfirmation("warning", 'Are you sure?', "Do you want to change this status?", 'Yes, Change!', 'changeStatus', ['id' => $id]); //($type,$title,$text,$confirmText,$method)
    }

    public function changeStatus(Product $data)
    {
        $data->fill(['active' => ($data->active == 1) ? 0 : 1])->save();
     
        $this->showModal('success', 'Success', 'Details status is changed successfully');
    }
}

