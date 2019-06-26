<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailCompra extends Mailable
{
    use Queueable, SerializesModels;
     public $content;
     public $adelanto;
     public $nombreCompleto;
     public $card;
     public $numeroTrans;
     
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($content,$adelanto,$nombreCompleto,$card,$numeroTrans)
    {
            $this->content = $content;
            $this->adelanto = $adelanto;
            $this->nombreCompleto = $nombreCompleto;
            $this->card=$card;
            $this->numeroTrans=$numeroTrans;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->markdown('emails.contacto.EmailCompra')
            ->with(['detalle' => $this->content,'totalPrice'=>$this->adelanto,'nombreCompleto'=>$this->nombreCompleto,'card'=>$this->card,'numeroTrans'=>$this->numeroTrans])->subject('MACHUPICCHU GOLDEN - DETALLES DE COMPRA');
            
        
    }
}
