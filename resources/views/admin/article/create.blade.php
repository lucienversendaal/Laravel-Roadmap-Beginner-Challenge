<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Create article') }}
                </div>
                <div>
                    <form action="{{ route('admin.articles.store') }}" method="POST" class="max-w-xl mx-auto"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="title" class="block mb-2 font-bold text-gray-700">Title</label>
                            <input type="text" name="title" id="title" value="{{ old('title') }}"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">
                            @error('title')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="content" class="block mb-2 font-bold text-gray-700">Content</label>
                            <textarea name="content" id="content" rows="5"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline">{{ old('content') }}</textarea>
                            @error('content')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="tags" class="block mb-2 font-bold text-gray-700">Tags</label>
                            <input name="tags[]" id="tags" value="tag1, tag2, tag3"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                required placeholder="tag1, tag2, tag3" />
                            <span class="text-xs italic text-gray-500">Separate tags with comma</span>
                        </div>
                        <div class="mb-4">
                            <label for="category" class="block mb-2 font-bold text-gray-700">Category</label>
                            <select type="text" name="category" id="category"
                                class="w-full px-3 py-2 leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                                required>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="image" class="block mb-2 font-bold text-gray-700">Image</label>
                            <input type="file" name="image" id="selectImage">
                            @error('image')
                                <p class="text-xs italic text-red-500">{{ $message }}</p>
                            @enderror
                            <img id="preview" src="#" alt="your image" class="w-40 h-40 mt-3"
                                style="display:none;" />
                        </div>
                        <div class="flex justify-end mb-4">
                            <button type="submit"
                                class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue">
                                Create Article +
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @push('script')
        <script>
            selectImage.onchange = evt => {
                preview = document.getElementById('preview');
                preview.style.display = 'block';
                const [file] = selectImage.files
                if (file) {
                    preview.src = URL.createObjectURL(file)
                }
            }
        </script>
    @endpush
</x-app-layout>
