<div>
    <div class="mb-4 px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
        Fill in the form. Choose the country, provinces/states, districts and wards list will be updated.
    </div>
    <form class="bordrer-b-2 pd-10">
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="name">
                Name
            </label>
            <input wire:model.debounce.500ms="search" name="name"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required />
        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="country">
                Country*
            </label>
            <select wire:model="country" name="country"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required>
                <option value="">-- choose country --</option>
                @foreach ($countries as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="province">
                Province*
            </label>
            <select wire:model="province" name="province"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required>
                <option value="">-- choose province/state --</option>
                @foreach ($provinces as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="district">
                District*
            </label>
            <select wire:model="district" name="district"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required>
                <option value="">-- choose district --</option>
                @foreach ($districts as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="ward">
                Ward*
            </label>
            <select wire:model="ward" name="ward"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400">
                <option value="">-- choose ward/state --</option>
                @foreach ($wards as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
    </form>
    <h3 class="font-bold text-xl mt-10 mb-5">Hotels</h3>
    <table class="min-w-full">
        <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Name</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 tracking-wider">Address</th>
        </tr>
        </thead>
        <tbody class="bg-white">
        @foreach ($hotels as $hotel)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $hotel->name }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5">{{ $hotel->full_address }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="mt-6">
        {{  $hotels->onEachSide(1)->links() }}
    </div>
</div>
