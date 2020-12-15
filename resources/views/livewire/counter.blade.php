<div xmlns:wire="http://www.w3.org/1999/xhtml">
    <div class="mt-6 flex justify-center">
        <button
            class="py-3 px-6 mr-2 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500   transition duration-300 ease-in-out"
            wire:click="decrement">-</button>
        <button
            class="py-3 px-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 transition duration-300 ease-in-out"
            wire:click="increment">+</button>
    </div>
    <h1 class="text-2xl flex justify-center">{{ $count }}</h1>
</div>

