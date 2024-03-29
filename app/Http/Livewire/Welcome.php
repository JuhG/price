<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public string $url = 'https://www.ikea.com/hu/hu/p/pakostad-illatgyertya-taroloban-grapefruit-kek-00507966/';
    public string $selector = '.range-revamp-price__integer';
    public $price = '';

    public function check()
    {
        try {
            $this->price = getPrice($this->url, $this->selector);
        } catch (\Exception $e) {
            $this->price = '';
            $this->addError('price', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.welcome')->layout('layouts.guest');
    }
}
