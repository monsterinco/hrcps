<div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>

      
    
      <!-- This element is to trick the browser into centering the modal contents. -->
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
      
      <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal"></button>​
    
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <form>
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <div class="">

  

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Employee ID:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter employee_id" wire:model="employee_id">
                    @error('employee_id') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">First Name:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter first_name" wire:model="first_name">
                    @error('first_name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Last Name:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter last_name" wire:model="last_name">
                    @error('last_name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Middle Name:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter middle_name" wire:model="middle_name">
                    @error('middle_name') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                {{-- <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Gender:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter gender" wire:model="gender_id">
                    @error('gender_id') <span class="text-red-500">{{ $message }}</span>@enderror
                </div> --}}

                 <div class="mb-4">
                  <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Select Position</label>
                  <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter position" wire:model="position_id">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($position as $item)
                    <option value="{{ $item->id }}">{{ $item->position_name }}</option>
                    @endforeach
                  </select>
                </div>

                {{-- <div class="mb-4">
                  <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Select Section Program</label>
                  <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter position" wire:model="section_program_id">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($section_program as $item)
                    <option value="{{ $item->id }}">{{ $item->section_program_name }}</option>
                    @endforeach
                  </select>
                </div> --}}

                {{-- <div class="mb-4">
                  <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Select Division</label>
                  <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter position" wire:model="division_id">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($division as $item)
                    <option value="{{ $item->id }}">{{ $item->division_name }}</option>
                    @endforeach
                  </select>
                </div> --}}




                

                {{-- <div class="mb-4">
                  <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Select Salary Grade</label>
                  <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Salary Grade" wire:model="salary_grade_id">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($salarygrade as $item)
                    <option value="{{ $item->id }}">{{ $item->salarygrade_name }}</option>
                    @endforeach
                  </select>
                </div> --}}

                {{-- <div class="mb-4">
                  <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Select Step</label>
                  <select type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter Salary Grade" wire:model="step_id">
                    <option value="" selected disabled>Please select</option>
                    @foreach ($step as $item)
                    <option value="{{ $item->id }}">{{ $item->step_name }}</option>
                    @endforeach
                  </select>
                </div> --}}


                  <div class="flex flex-col justify-around h-full">
                      @livewire('dropdowns')
                  </div>





             
                <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Salary Amount:</label>
                    <input disabled type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter salary_amount" wire:model="salary_amount">
                    @error('salary_amount') <span class="text-red-500">{{ $message }}</span>@enderror
                </div>

                {{-- <div class="mb-4">
                    <label for="exampleFormControlInput1" class="block text-gray-700 text-sm font-bold mb-2">Entrance to Duty:</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput1" placeholder="Enter entrance_to_duty" wire:model="entrance_to_duty">
                    @error('entrance_to_duty') <span class="text-red-500">{{ $message }}</span>@enderror
                </div> --}}

                {{-- <div class="mb-4">
                    <label for="exampleFormControlInput2" class="block text-gray-700 text-sm font-bold mb-2">Body:</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="exampleFormControlInput2" wire:model="body" placeholder="Enter Body"></textarea>
                    @error('body') <span class="text-red-500">{{ $message }}</span>@enderror
                </div> --}}
          </div>
        </div>
    
        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
          <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">

            <input type="hidden" wire:model="profile_id">
            <button wire:click.prevent="store()" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Save
            </button>
          </span>
          <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
              
            <button wire:click="closeModalAdditional" type="button" class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
              Cancel
            </button>
          </span>
          </form>
        </div>
          
      </div>
    </div>
  </div>