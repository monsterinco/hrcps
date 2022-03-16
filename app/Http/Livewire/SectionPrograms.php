<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Section_Program;
use Livewire\WithPagination;
use DB;

class SectionPrograms extends Component
{
    public $section_program_name, $section_program_id, $division_id, $remarks, $value;
    public $isOpen = 0;

    use WithPagination;
    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // return view('livewire.genders');

        // return view('livewire.genders', [
        //     'data' => Gender::where('gender_name', 'like', '%'.$this->search.'%')->paginate(10),
        // ]);
        return view('livewire.section-programs', [
            'data' => Section_Program::where('section_program_name', 'like', '%'.$this->search.'%')->paginate(10),
            'division' => DB::table('division')->get(),
        ]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->section_program_name = '';
        $this->division_id = '';
        $this->remarks = '';
    }

    public function store()
    {
        $this->validate([
            'section_program_name' => 'required',
            'division_id' => 'required',
            'remarks' => 'required'
        ]);
   
        Section_Program::updateOrCreate(['id' => $this->section_program_id], [
            
            'section_program_name' => $this->section_program_name,
            'division_id' => $this->division_id,
            'remarks' => $this->remarks
        ]);
  
        session()->flash('message', 
            $this->section_program_id ? 'Section/Program Updated Successfully.' : 'Section/Program Created Successfully.');
  
        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $gender = Section_Program::findOrFail($id);
        $this->section_program_id = $id;

        
        $this->section_program_name = $gender->section_program_name;
        $this->division_id = $gender->division_id;
        $this->remarks = $gender->remarks;
    
        $this->openModal();
    }

    public function delete($id)
    {
        Section_Program::find($id)->delete();
        session()->flash('message', 'Gender Deleted Successfully.');
    }

    public function value($id)
    {
        return ($this->id );
    }
}
