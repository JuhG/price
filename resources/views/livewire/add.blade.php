<div class="max-w-xl mx-auto pb-32">
    <x-jet-validation-errors class="mb-4" />

    <form wire:submit.prevent="check" class="flex flex-col gap-4">
        <div>
            <label for="url" class="block text-sm font-medium text-gray-700">Website</label>
            <div class="mt-1">
                <input wire:model="url" required type="text" name="url" id="url"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                    placeholder="https://webshop.com/product/my-favorite-item">
            </div>
        </div>

        <div>
            <label for="selector" class="block text-sm font-medium text-gray-700">Selector</label>
            <div class="mt-1">
                <input wire:model="selector" required type="text" name="selector" id="selector"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"
                    placeholder="#currentPrice">
            </div>
        </div>

        <div class="pt-4 flex justify-between items-center">
            <button type="submit"
                class="bg-indigo-600 border border-transparent rounded-md shadow-sm py-2 px-4 inline-flex justify-center text-sm font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-600">Check
                price</button>
            <div wire:loading wire:target="check">
                Updating price...
            </div>
            <p wire:loading.remove wire:target="check" class="font-bold text-2xl text-green-600">{{ $price }}</p>
        </div>

        @if ($price)
        <div>
            <label for="under" class="block text-sm font-medium text-gray-700">Notify when the price goes under this
                number</label>
            <div class="mt-1">
                <input wire:model="under" required type="number" name="under" id="under"
                    class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
            </div>
        </div>

        <div class="pt-4 flex flex-col items-end gap-2">
            <x-jet-button wire:click="add" type="button">Set up watcher</x-jet-button>
        </div>
        @endif
</div>
