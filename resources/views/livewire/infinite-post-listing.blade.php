<div class="container p-4 mx-auto">
    <h1 class="font-semibold text-2xl font-bold text-gray-800">Infinite Load Posts</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8 mt-4">
        @foreach($posts as $post)
            <a href="#" class="block p-4 bg-white rounded shadow-sm hover:shadow overflow-hidden" :key="$post['id']">
                <h2 class="truncate font-semibold text-lg text-gray-800">
                    {{ $post['title'] }}
                </h2>

                <p class="mt-2 text-gray-800">
                    {{ $post['body'] }}
                </p>
            </a>
        @endforeach
    </div>

    @if($hasMorePages)
        <div
            x-data
            x-intersect="@this.call('loadPosts')"
            class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-4"
        >
            @foreach(range(1, 4) as $x)
                @include('partials.skeleton')
            @endforeach
        </div>
    @endif
</div>

@push('styles')
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
@endpush

@push('scripts')
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
