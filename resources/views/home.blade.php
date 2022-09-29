@extends('layouts.app')

@section('content')
<section class="mx-auto max-w-6xl py-12">
    <div class="flex flex-col">
        <div class="flex flex-col md:flex-row justify-center items-center">
            <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
            <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
            <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center"></div>
        </div>
        <div class="flex flex-col md:flex-row justify-center items-center">

            <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center mr-0 md:mr-2">
                <div slot="bottom-left" class="max-w-xs">
                    <div class="p-5 shadow-md m-2 mt-4"><img class="object-scale-down h-30" src="https://laravelnews.imgix.net/images/laravel-livewire.png" alt="step3">
                        <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2"></div>
                        <div class="text-xl font-bold mb-2"><a href="{{ route('posts.load-more-button') }}">Posts with load more button</a></div>
                        <div class="truncate"></div>
                    </div>
                </div>
            </div>
            <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center mx-0 md:mx-4">
                <div slot="bottom-center" class="max-w-xs">
                    <div class="p-5 shadow-md m-2 mt-4"><img class="object-scale-down h-30" src="https://laravelnews.imgix.net/images/laravel-livewire.png" alt="step3">
                        <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2"></div>
                        <div class="text-xl font-bold mb-2 truncate"><a href="{{ route('posts.infinite-pagination') }}">Posts with infinite pagination</a></div>
                        <div class="truncate"></div>
                    </div>
                </div>
            </div>
            <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center mx-0 md:mx-2">
                <div slot="bottom-center" class="max-w-xs">
                    <div class="p-5 shadow-md m-2 mt-4"><img class="object-scale-down h-30" src="https://laravelnews.imgix.net/images/laravel-livewire.png" alt="step3">
                        <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2"></div>
                        <div class="text-xl font-bold mb-2 truncate"><a href="{{ route('multi-level-select') }}">Multi level select</a></div>
                        <div class="truncate"></div>
                    </div>
                </div>
            </div>
            <div class="transition-all ease-in-out duration-1000 flex flex-col justify-center mr-0 md:mr-4">
                <div slot="bottom-left" class="max-w-xs">
                    <div class="p-5 shadow-md m-2 mt-4"><img class="object-scale-down h-30" src="https://laravelnews.imgix.net/images/laravel-livewire.png" alt="step3">
                        <div class="text-xs font-bold uppercase text-teal-700 mt-1 mb-2"></div>
                        <div class="text-xl font-bold mb-2"><a href="{{ route('posts.popular') }}">Popular Posts component</a></div>
                        <div class="truncate"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
    <link href="https://unpkg.com/tailwindcss@1.3.4/dist/tailwind.min.css" rel="stylesheet">
@endpush
