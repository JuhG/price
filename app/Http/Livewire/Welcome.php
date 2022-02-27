<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Welcome extends Component
{
    public string $url = '';
    public string $selector = '';
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
