<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Support\Collection;
use Livewire\Component;

class PostListing extends Component
{
    public Collection $posts;

    public int $pageNumber = 1;

    public bool $hasMorePages;

    public function render()
    {
        return view('livewire.post-listing')->layout('layouts.app');
    }

    public function mount()
    {
        $this->posts = new Collection();
        $this->loadPosts();
    }

    public function loadPosts()
    {
        $posts = Post::paginate(12, ['*'], 'page', $this->pageNumber);
        $this->pageNumber += 1;
        $this->hasMorePages = $posts->hasMorePages();
        $this->posts->push(...$posts->items());
    }
}
