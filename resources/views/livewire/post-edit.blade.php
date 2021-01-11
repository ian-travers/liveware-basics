<div class="my-2">
    @if(session('success_message'))
        <div class="bg-green-50 p-4 mt-4 rounded-md">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm leading-5 font-medium text-green-800">
                        {{ session('success_message') }}
                    </p>
                </div>
            </div>
        </div>
    @endif
    <form wire:submit.prevent="submitForm" enctype="multipart/form-data">
        @csrf
        <div class="mt-6 sm:mt-5">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="title" class="block font-semibold leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Title
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg sm:max-w-xs">
                        <input
                            wire:model="title"
                            id="title"
                            name="title"
                            class="form-input border rounded-md block w-full p-2"
                            value="{{ $post->title }}"
                        >
                        @error('title')
                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

            <div
                class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label
                    for="content"
                    class="block font-semibold leading-5 text-gray-700 sm:pt-2"
                >
                    Content
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex">
                                <textarea
                                    wire:model="content"
                                    id="content"
                                    name="content"
                                    rows="5"
                                    class="form-textarea border rounded-md block w-full p-2">{{ $post->content }}</textarea>
                    </div>
                    @error('content')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div
                class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label
                    for="photo"
                    class="block leading-5 font-semibold text-gray-700 sm:mt-px sm:pt-2"
                >
                    Cover Photo
                </label>
                <div
                    class="mt-2 sm:mt-0 sm:col-span-2"
                >
                    <input
                        type="file"
                        name="photo"
                    >
                    @error('photo')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <div class="mt-4">
                        @if($post->photo)
                            <img src="{{ Storage::url($post->photo) }}" alt="cover">
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                        <span class="ml-3 inline-flex rounded-md shadow-sm">
                            <button
                                type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out"
                            >
                                Update
                            </button>
                        </span>
            </div>
        </div>
    </form>
</div>
