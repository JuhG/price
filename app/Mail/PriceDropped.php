<?php

namespace App\Mail;

use App\Models\Watcher;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PriceDropped extends Mailable
{
    use Queueable, SerializesModels;

    public $watcher;
    public $price;

    public function __construct(Watcher $watcher, float $price)
    {
        $this->watcher = $watcher;
        $this->price = $price;
    }

    public function build()
    {
        return $this->markdown('emails.price-dropped');
    }
}
