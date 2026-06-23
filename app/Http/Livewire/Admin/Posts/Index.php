<?php
namespace App\Http\Livewire\Admin\Posts;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Post;

class Index extends Component
{
    use WithPagination;
    public $search = '';
    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $q = Post::query();
        if ($this->search) $q->where('title','like','%'.$this->search.'%');
        $posts = $q->orderBy('id','desc')->paginate(10);
        return view('livewire.admin.posts.index', ['posts'=>$posts]);
    }
}
