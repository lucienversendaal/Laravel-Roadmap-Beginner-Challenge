<x-main-layout>
    <x-slot name="header">
        <div class="px-6 py-24 bg-white lg:px-8">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Blog center</h2>
                <p class="mt-6 text-lg leading-8 text-gray-600">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ullamcorper metus nec metus interdum
                    sodales. Quisque scelerisque sapien non enim placerat, ac dapibus arcu aliquet. Aliquam facilisis
                    condimentum dolor suscipit vehicula.
                </p>
            </div>
        </div>

    </x-slot>

    <div class="py-10 bg-white">
        <div class="relative w-full h-full px-6 mx-auto max-w-7xl lg:px-8">
            <h1 class="mb-1 text-4xl font-extrabold leading-none text-gray-900 lg:text-5xl xl:text-6xl sm:mb-3">
                From the blog.
            </h1>
            <div class="grid max-w-2xl grid-cols-1 mx-auto mt-16 gap-x-8 gap-y-20 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @foreach ($articles as $article)
                    <article class="relative flex flex-col items-start justify-between group">
                        <div class="w-full">
                            <div
                                class="relative flex flex-col items-start justify-end h-full col-span-12 overflow-hidden rounded-xl group md:col-span-6 xl:col-span-4">
                                <div class="block w-full transition duration-300 ease-in-out transform bg-center bg-cover h-96 group-hover:scale-110"
                                    style="background-image:url('{{ $article->getImage() }}')">
                                </div>
                            </div>
                        </div>
                        <div class="max-w-xl">
                            <div class="flex items-center mt-8 text-xs gap-x-4">
                                <time datetime="2020-03-16"
                                    class="text-gray-500">{{ $article->created_at->diffForHumans() }}</time>
                                @foreach ($article->tags as $tag)
                                    @php
                                        $tags = explode(', ', $tag);
                                    @endphp
                                    @foreach ($tags as $tag)
                                        <div href="#"
                                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                            {{ $tag }}</div>
                                    @endforeach
                                @endforeach
                            </div>
                            <div class="relative group">
                                <h3
                                    class="mt-3 text-lg font-semibold leading-6 text-gray-900 group-hover:text-gray-600">
                                    <a href="{{ $article->route() }}">
                                        <span class="absolute inset-0"></span>
                                        {{ $article->title }}
                                    </a>
                                </h3>
                                <p class="mt-5 text-sm leading-6 text-gray-600 line-clamp-1">
                                    {{ $article->content }}
                                </p>
                            </div>
                            <div class="relative flex items-center mt-8 gap-x-4">
                                <img src="{{ $article->getImage() }}" alt=""
                                    class="w-10 h-10 bg-gray-100 rounded-full">
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
                        <a href="{{ $article->route() }}" alt="{{ $article->title }}" class="absolute inset-0 z-10 ">
                            <span class="sr-only">{{ $article->title }}</span>
                        </a>
                    </article>
                @endforeach
            </div>
            <div class="pt-12">
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-main-layout>
