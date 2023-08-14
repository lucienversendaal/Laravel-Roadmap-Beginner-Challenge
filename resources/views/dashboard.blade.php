<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="flex justify-between p-6 text-gray-900">
                    {{ __('Articles') }}
                    <button onclick="window.location.href='{{ route('article.create') }}'"
                        class="px-3 py-2 text-white bg-green-400 rounded-md shadow-md hover:bg-green-500 hover:shadow-inner">
                        Create article +
                    </button>
                </div>
                @foreach ($articles as $article)
                    <div class="relative flex items-center w-full h-full px-4 py-8 transition group hover:bg-gray-100">
                        <div class="w-full py-10 space-y-20 border-b border-b-gray-200 lg:space-y-20">
                            <article class="relative flex flex-col gap-8 isolate lg:flex-row ">
                                <div
                                    class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                                    @if ($article->image_url)
                                        <img src="{{ $article->image_url }}" alt=""
                                            class="absolute inset-0 object-cover w-full h-full rounded-2xl bg-gray-50">
                                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10">
                                        </div>
                                    @else
                                        <span>No image found!</span>
                                    @endif
                                </div>
                                <div>
                                    <div class="flex items-center text-xs gap-x-4">
                                        <time datetime="{{ $article->created_at->format('Y-m-d') }}"
                                            class="text-gray-500">{{ $article->created_at->diffForHumans() }}</time>
                                        <a href="#"
                                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">{{ $article->category->name }}</a>
                                    </div>
                                    <div class="relative max-w-xl group">
                                        <div class="flex justify-between w-full">
                                            <h3
                                                class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                                <a href="#">
                                                    <span class="absolute inset-0"></span>
                                                    {{ $article->title }}
                                                </a>
                                            </h3>
                                        </div>
                                        <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-2">
                                            {{ $article->content }}
                                        </p>
                                    </div>
                                    <div class="flex pt-6 mt-6 border-t border-gray-900/5">
                                        <div class="relative flex items-center gap-x-4">
                                            <img src="https://images.unsplash.com/photo-1519244703995-f4e0f30006d5?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                alt="" class="w-10 h-10 rounded-full bg-gray-50">
                                            <div class="text-sm leading-6">
                                                <p class="font-semibold text-gray-900">
                                                    <a href="#">
                                                        <span class="absolute inset-0"></span>
                                                        {{ $article->user->name }}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                        <a href="{{ $article->route() }}" alt="{{ $article->title }}"
                            class="absolute inset-0 z-10 w-full h-full">
                            <span class="sr-only">{{ $article->title }}</span>
                        </a>
                    </div>
                @endforeach
                <div class="p-6 bg-white border-b border-gray-200">
                    {{ $articles->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
