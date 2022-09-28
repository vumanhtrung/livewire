<div class="container p-4 mx-auto">
    <h1 class="font-semibold text-2xl font-bold text-gray-800">All Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-4">
        @foreach($posts as $post)
            <a href="#" class="block p-4 bg-white rounded shadow-sm hover:shadow overflow-hidden">
                <h2 class="truncate font-semibold text-lg text-gray-800">
                    {{ $post['title'] }}
                </h2>

                <p class="mt-2 text-gray-800">
                    {{ $post['body'] }}
                </p>
            </a>
        @endforeach
    </div>

    @if ($hasMorePages)
        <div class="flex items-center justify-center mt-4">
            <button class="px-4 py-3 text-lg font-semibold text-white rounded-xl bg-green-500 hover:bg-green-400"
                wire:click="loadPosts" wire:loading.attr="disabled">
                Load More
            </button>
        </div>
    @endif
</div>