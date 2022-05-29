<?php

namespace App\Mail;

use App\Models\Cart;
use App\Models\Parts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SellMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($part, $user)
    {
        $this->part = $part;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $part = $this->part;
        $buyer = $this->user;
        // $sellerId = $part->name;
        // $part = $part[0];

        return $this->markdown('emails.sell', compact('part', 'buyer'));
    }
}
