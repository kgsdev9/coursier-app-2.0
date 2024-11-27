<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewCommandeNotification extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $commande;

    /**
     * Create a new message instance.
     *
     * @param array $commande
     */
    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle commande reçue')
                    ->view('emails.new-commande')
                    ->with('commande', $this->commande);
    }
}
