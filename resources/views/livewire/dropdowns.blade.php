<div>
    <div class="mb-8">
        <label class="inline-block w-32 font-bold">tesssst:</label>
        <select name="salary" wire:model="salary_id"   class="border shadow p-2 bg-white">
            <option value=''>Choose a salary</option>

             @foreach ($salarydropdown as $item)
                    <option value="{{ $item->id }}">{{ $item->salarygrade_name }}</option>
             @endforeach
          
        </select>
    </div>
    @if(count($salarydropdown) > 0)
        <div class="mb-8">
            <label class="inline-block w-32 font-bold">City:</label>
            <select name="city"  
                class="p-2 px-4 py-2 pr-8 leading-tight bg-white border border-gray-400 rounded shadow appearance-none hover:border-gray-500 focus:outline-none focus:shadow-outline">
                <option value=''>Choose a grade</option>
                 @foreach ($steps as $item)
                    <option value="{{ $item->id }}">{{ $item->step_name }}</option>
                    @endforeach
            </select>
        </div>
    @endif
</div>