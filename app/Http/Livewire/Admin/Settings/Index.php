<?php
namespace App\Http\Livewire\Admin\Settings;

use Livewire\Component;
use App\Models\Setting;

class Index extends Component
{
    public $items = [];

    public function mount()
    {
        $this->items = Setting::pluck('value','key')->toArray();
    }

    public function save()
    {
        foreach ($this->items as $k=>$v) {
            Setting::updateOrCreate(['key'=>$k], ['value'=>$v]);
        }
        session()->flash('message','Settings saved.');
    }

    public function render()
    {
        return view('livewire.admin.settings.index');
    }
}
