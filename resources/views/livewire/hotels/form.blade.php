<div class="mt-6">
    <div class="mb-4 px-4 py-3 leading-normal text-blue-700 bg-blue-100 rounded-lg" role="alert">
        Edit Hotel
    </div>
    <form class="bordrer-b-2 pd-10">
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="name">
                Name
            </label>
            <input wire:model.defer="hotel.name" name="name"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required />
            @error('hotel.name') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mt-4">
            <label class="block font-medium text-sm text-gray-700" for="address">
                Address
            </label>
            <input wire:model.defer="hotel.address" name="address"
                class="mt-2 text-sm sm:text-base pl-2 pr-4 rounded-lg border border-gray-400 w-full py-2 focus:outline-none focus:border-blue-400"
                required />
            @error('hotel.address') <span class="text-red-500">{{ $message }}</span>@enderror
        </div>
        <div class="mt-4">
            <span class="flex rounded-md shadow-sm sm:ml-3">
                <button wire:click.prevent="update()" type="button"
                    class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-bold text-white shadow-sm hover:bg-red-700 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Update
                </button>
            </span>
            <span class="mt-3 flex rounded-md shadow-sm sm:mt-0">
                <button wire:click="closeModal()" type="button"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-white text-base leading-6 font-bold text-gray-700 shadow-sm hover:text-gray-700 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                    Close
                </button>
            </span>
        </div>
    </form>
</div>
