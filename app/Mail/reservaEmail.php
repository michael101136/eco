<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class reservaEmail extends Mailable
{
    use Queueable, SerializesModels;
     public $content;
     public $nameTours;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$nameTours)
    {
              $this->content = $content;
              $this->nameTours=$nameTours;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       
        return $this->markdown('emails.contacto.reserva')
            ->with(['detalle' => $this->content,'nameTour' => $this->nameTours,'tour'])->subject('INFORMACIÓN DE TOURS (Formulario de contacto)');
    }
}
