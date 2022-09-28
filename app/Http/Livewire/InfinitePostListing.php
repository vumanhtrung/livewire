<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Pagination\Cursor;
use Illuminate\Support\Collection;
use Livewire\Component;

class InfinitePostListing extends Component
{
    public Collection $posts;

    public $nextCursor;

    public bool $hasMorePages = true;

    public function render()
    {
        return view('livewire.infinite-post-listing')->layout('layouts.app');
    }

    public function mount()
    {
        $this->posts = new Collection();
        $this->loadPosts();
    }

    public function loadPosts()
    {
        if ($this->hasMorePages !== null && !$this->hasMorePages) {
            return;
        }

        $posts = Post::cursorPaginate(12, ['*'], 'cursor', Cursor::fromEncoded($this->nextCursor));
        $this->posts->push(...$posts->items());

        if ($this->hasMorePages = $posts->hasMorePages()) {
            $this->nextCursor = $posts->nextCursor()->encode();
        }
    }
}
