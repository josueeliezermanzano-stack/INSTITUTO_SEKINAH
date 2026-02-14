<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PreRegistroMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data; 
    public $urlArchivo;

     public function __construct($data, $urlArchivo = null)
    {
        $this->data = $data;
        $this->urlArchivo = $urlArchivo;
    }

    public function build()
    {
        return $this->subject('Nueva solicitud de pre-registro')
                    ->markdown('emails.preregistro')
                    ->with([
                        'data' => $this->data,
                        'urlArchivo' => $this->urlArchivo,
                    ]);
    }

}