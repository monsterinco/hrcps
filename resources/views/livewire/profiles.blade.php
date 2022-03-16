<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        HRCPS Profile Management
    </h2>
</x-slot>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            @if (session()->has('message'))
                <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md my-3" role="alert">
                  <div class="flex">
                    <div>
                      <p class="text-sm">{{ session('message') }}</p>
                    </div>
                  </div>
                </div>
            @endif
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Profile</button>
            @if($isOpen)
                @include('livewire.create_profile')
            @endif

             @if($isOpenAdditional)
                @include('livewire.create_add_salary')
            @endif

            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">ID.</th>
                        <th class="px-4 py-2">Employee ID</th>
                        <th class="px-4 py-2">First Name</th>
                        <th class="px-4 py-2">Last Name</th>
                        <th class="px-4 py-2">Middle Name</th>
                        <th class="px-4 py-2">Gender</th>
                        <th class="px-4 py-2">Position</th>
                        {{-- <th class="px-4 py-2">section_program</th>
                        <th class="px-4 py-2">division</th>
                        <th class="px-4 py-2">salary_grade</th>
                        <th class="px-4 py-2">salary_amount</th>
                        <th class="px-4 py-2">entrance_to_duty</th>
                        <th class="px-4 py-2">tin_number</th>
                        <th class="px-4 py-2">phic_number</th>
                        <th class="px-4 py-2">gsis_bp_number</th>
                        <th class="px-4 py-2">remarks</th> --}}
                        <th class="px-4 py-2">Action</th>
                        <th class="px-4 py-2">Additionals</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="border px-4 py-2">{{ $row->id }}</td>
                        <td class="border px-4 py-2">{{ $row->employee_id }}</td>
                        <td class="border px-4 py-2">{{ $row->first_name }}</td>
                        <td class="border px-4 py-2">{{ $row->last_name }}</td>
                        <td class="border px-4 py-2">{{ $row->middle_name }}</td>
                        <td class="border px-4 py-2">{{ $row->gender->gender_name }}</td>
                        <td class="border px-4 py-2">{{  $row->position->position_name }}</td>
                        {{-- <td class="border px-4 py-2">{{ $row->section_program }}</td>
                        <td class="border px-4 py-2">{{ $row->division }}</td>
                        <td class="border px-4 py-2">{{ $row->salary_grade }}</td>
                        <td class="border px-4 py-2">{{ $row->salary_amount }}</td>
                        <td class="border px-4 py-2">{{ $row->entrance_to_duty }}</td>
                        <td class="border px-4 py-2">{{ $row->tin_number }}</td>
                        <td class="border px-4 py-2">{{ $row->phic_number }}</td>
                        <td class="border px-4 py-2">{{ $row->gsis_bp_number }}</td> --}}
                        {{-- <td class="border px-4 py-2">{{ $row->remarks }}</td> --}}
                        <td class="border px-4 py-2">
                            <button wire:click="edit({{ $row->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                        
                        <td class="border px-4 py-2">
                            <button wire:click="editAdditional({{ $row->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Manage Additional</button>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                        <td>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{ $data->links() }}
            {{-- {{ $data->links('custom-pagination-links-view') }} --}}
        </div>
    </div>
</div>