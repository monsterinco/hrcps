<?php
namespace App\Http\Livewire;

use App\Models\Salarygrade;
use App\Models\Step;

use Livewire\Component;
class Dropdowns extends Component
{
    public $salary_id;
    public $Salarydropdown;
    public $steps=[];
 
    public function render()
    {
        if(!empty($this->salary_id)) {
            $this->steps = Step::where('sg_id', $this->salary_id)->get();
        }
    
        return view('livewire.dropdowns')
            ->withSalarydropdown(Salarygrade::orderBy('id')->get());
    }
}