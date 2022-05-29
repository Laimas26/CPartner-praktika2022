<?php

namespace App\Mail;

use App\Models\Cart;
use App\Models\Parts;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PurchaseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = auth()->user();
        $totalPrice = 0;
        $userId = $user->id;
        $vehicleParts = Parts::all();

        $carts = Cart::where('user_id', $userId)->get();
        foreach($carts as $cart)
        {
            foreach(Parts::where('id', $cart->part_id)->get() as $part)
            {
                $totalPrice += $part->price;
            } 
        }

        return $this->markdown('emails.purchase', compact('user', 'carts', 'totalPrice', 'vehicleParts'));
    }
}
