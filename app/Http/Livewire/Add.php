<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Add extends Component
{
    public string $url = 'https://www.ikea.com/hu/hu/p/pakostad-illatgyertya-taroloban-grapefruit-kek-00507966/';
    public string $selector = '.range-revamp-price__integer';
    public float $under = 0;
    public $price = '';

    public function check()
    {
        $this->resetErrorBag();

        try {
            $this->price = getPrice($this->url, $this->selector);
        } catch (\Exception $e) {
            $this->price = '';
            $this->addError('price', $e->getMessage());
        }
        $this->under = (float) $this->price;
    }

    public function add()
    {
        Auth::user()
            ->watchers()
            ->create([
                'url' => $this->url,
                'selector' => $this->selector,
                'price' => $this->under,
            ]);

        session()->flash('flash.banner', 'Watcher successfully added!');
        $this->redirect('/dashboard');
    }

    public function render()
    {
        return view('livewire.add');
    }
}
