<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistroMail extends Mailable
{
    

     public function __construct($estatus,$contra,$usuario)
    {
        $this->estatus = $estatus;
        $this->contra = $contra;
        $this->usuario = $usuario;
    }

    public function build()
    {
        return $this->subject('Solicitud de pre-registro')
        ->markdown('emails.registro')
        ->with([
            'estatus' => $this->estatus,
            'contra' => $this->contra,
            'usuario' => $this->usuario,
        ]);
    }

}