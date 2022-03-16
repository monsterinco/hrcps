<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Step Management
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
            <button wire:click="create()" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded my-3">Create New Step</button>
            @if($isOpen)
                @include('livewire.create_step')
            @endif
            <table class="table-fixed w-full">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 w-20">No.</th>
                        <th class="px-4 py-2">Tranche</th>
                        <th class="px-4 py-2">Salary Grade</th>
                        <th class="px-4 py-2">Step Name</th>
                        <th class="px-4 py-2">Step Salary Amount</th>
                        <th class="px-4 py-2">Remarks</th>
                        <th class="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $row)
                    <tr>
                        <td class="border px-4 py-2">{{ $row->id }}</td>
                        {{-- <td class="border px-4 py-2">{{ $row->tranche_id }}</td> --}}
                        <td class="border px-4 py-2">{{ $row->tranche->tranche_name }}</td>
                        {{-- <td class="border px-4 py-2">{{ $row->sg_id }}</td> --}}
                        <td class="border px-4 py-2">{{ $row->salarygrade->salarygrade_name }}</td>
                        <td class="border px-4 py-2">{{ $row->step_name }}</td>
                        <td class="border px-4 py-2">{{ $row->step_salary_amount }}</td>
                        <td class="border px-4 py-2">{{ $row->remarks }}</td>
                        <td class="border px-4 py-2">
                        <button wire:click="edit({{ $row->id }})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</button>
                            <button wire:click="delete({{ $row->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $data->links() }}
        </div>
    </div>
</div>