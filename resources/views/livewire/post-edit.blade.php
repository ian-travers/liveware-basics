<div class="my-2">
    @if($successMessage)
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
                        {{ $successMessage }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" wire:click="$set('successMessage', null)"
                                class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none focus:bg-green-100 transition ease-in-out duration-150"
                                aria-label="Dismiss">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                      clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    <form wire:submit.prevent="submitForm" action="#" method="post" enctype="multipart/form-data">
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
                    class="mt-2 sm:mt-0 sm:col-span-2 relative"
                >
                    <input
                        wire:model="photo"
                        type="file"
                        name="photo"
                    >
                    @error('photo')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    <div class="absolute top-0 -left-5">
                        <svg
                            wire:loading
                            wire:target="photo"
                            class="animate-spin -ml-1 mr-3 h-5 w-5 text-gray-600"
                            fill="none"
                            viewBox="0 0 24 24"
                        >
                            <circle
                                class="opacity-25" cx="12" cy="12" r="10"
                                stroke="currentColor" stroke-width="4">

                            </circle>
                            <path
                                class="opacity-75"
                                fill="currentColor"
                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                            </path>
                        </svg>
                    </div>
                    <div class="mt-4">
                        @if($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="temp">
                        @elseif($post->photo)
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
