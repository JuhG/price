<x-jet-authentication-card>
    <x-slot name="logo">
        <x-jet-authentication-card-logo />
    </x-slot>

    <div class="mx-auto py-8">
        <div class="text-center">
            <p class="text-2xl font-extrabold text-gray-900">Monitor the price of a product</p>
            <p class="mt-5 text-gray-500">Add any e-commerce website, search for the price on the page and get
                notified when it goes on sale</p>
        </div>
    </div>

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
        <div class="pt-4 flex flex-col items-end gap-2">
            <p>If the price looks ok, then it's time to register!</p>
            <a href="/register">
                <x-jet-button type="button">
                    {{ __('Register') }}
                </x-jet-button>
            </a>
        </div>
        @endif
    </form>
</x-jet-authentication-card>
