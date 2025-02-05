<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 px-4 sm:px-6 lg:px-8">
                    <div class="sm:flex sm:items-center">
                        <div class="sm:flex-auto">
                            <h1 class="text-base font-semibold leading-6 text-gray-900">Articles</h1>
                            <p class="mt-2 text-sm text-gray-700">
                                A list of all the articles in your account </p>
                        </div>
                        <div class="mt-4 sm:ml-16 sm:mt-0 sm:flex-none">
                            <a href="{{ route('admin.articles.create') }}">
                                <button type="button"
                                    class="block px-3 py-2 text-sm font-semibold text-center text-white bg-indigo-600 rounded-md shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                                    Create Article
                                </button>
                            </a>
                        </div>
                    </div>
                    <div class="flow-root mt-8">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                                <div class="overflow-hidden shadow ring-1 ring-black ring-opacity-5 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-300">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Image</th>
                                                <th scope="col"
                                                    class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-6">
                                                    Title</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                    Slug</th>
                                                <th scope="col"
                                                    class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900 ">
                                                    Content</th>

                                                <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
                                                    <span class="sr-only">Edit</span>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200">
                                            @foreach ($articles as $article)
                                                <tr>
                                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        @if ($article->image_url)
                                                            <img src="{{ $article->getImage() }}"
                                                                alt="{{ $article->title }}"
                                                                class="w-10 h-10 rounded-full ">
                                                        @endif
                                                    </td>
                                                    <td
                                                        class="py-4 pl-4 pr-3 text-sm font-medium text-gray-900 whitespace-nowrap sm:pl-6">
                                                        {{ $article->title }}</td>
                                                    <td class="px-3 py-4 text-sm text-gray-500 whitespace-nowrap">
                                                        {{ $article->slug }}
                                                    </td>
                                                    <td class="px-3 py-4 mb-4 text-sm text-gray-500 line-clamp-1 ">
                                                        {!! $article->content !!}
                                                    </td>

                                                    <td
                                                        class="relative py-4 pl-3 pr-4 text-sm font-medium text-right whitespace-nowrap sm:pr-6">
                                                        <a href="{{ route('admin.articles.edit', $article->id) }}"
                                                            class="text-indigo-600 hover:text-indigo-900">
                                                            Edit
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                                <div class="py-6">
                                    {{ $articles->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
