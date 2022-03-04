<?php

namespace App\Models;

use App\Mail\PriceDropped;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class Watcher extends Model
{
    protected $guarded = [];

    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function check()
    {
        try {
            retry([1000, 2000, 3000, 4000], function () {
                $price = getPrice($this->url, $this->selector);
                if ($price < $this->price) {
                    Mail::to($this->user->email)->send(new PriceDropped($this, $price));
                    Log::info('Mail sent: ' . $this->id);
                }
            });
        } catch (\Exception $e) {
            Log::error('Check failed: ' . $this->id);
            Log::error($e->getMessage());
        }
    }
}
