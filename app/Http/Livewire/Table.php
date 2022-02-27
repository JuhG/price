<?php

namespace App\Http\Livewire;

use App\Models\Watcher;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Table extends Component
{
    public $list = [];

    public function mount()
    {
        $this->list = Auth::user()->watchers;
    }

    public function remove(int $id)
    {
        $watcher = Watcher::find($id);
        if ($watcher->user_id !== Auth::user()->id) {
            return;
        }

        $watcher->delete();
        $this->list = Auth::user()->watchers;
    }

    public function render()
    {
        return view('livewire.table');
    }
}
