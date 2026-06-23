<?php
namespace App\Http\Livewire\Results;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Result;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'tailwind';

    public function render()
    {
        $results = Result::with('user')->orderBy('created_at','desc')->paginate(10);
        return view('livewire.results.index', ['results' => $results]);
    }
}
