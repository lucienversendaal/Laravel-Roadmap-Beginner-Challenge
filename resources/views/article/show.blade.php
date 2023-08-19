<x-main-layout>
    <div class="px-6 pt-20 bg-white lg:px-8 pb-96">
        <div class="flex my-10">
            <a href="{{ route('article.index') }}"
                class="text-base font-semibold leading-7 text-blue-500 hover:text-blue-700 hover:underline"><span
                    aria-hidden="true">&larr;</span>Back to overview</a>
        </div>
        <div class="max-w-3xl mx-auto text-base leading-7 text-gray-700">
            @foreach ($article->tags as $tag)
                <p class="inline text-base font-semibold leading-7 text-blue-500">{{ $tag }}</p>
            @endforeach
            <h1 class="mt-2 text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">
                {{ $article->title }}
            </h1>
            <div class="max-w-2xl mt-10">
                {!! $article->content !!}
            </div>
        </div>
    </div>
</x-main-layout>
