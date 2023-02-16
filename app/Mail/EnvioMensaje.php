<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioMensaje extends Mailable
{
    use Queueable, SerializesModels;


    public $subject = "MENSAJE RECIBIDO";
    public $email;
    public $texto;
    public $telefono;
    public $nombre;

    public function __construct($email, $nombre, $texto, $telefono)
    {
        $this->$email = $email;
        $this->texto = $texto;
        $this->telefono = $telefono;
        $this->nombre = $nombre;
    }

    public function build()
    {
        return $this->view('email.mensaje');
    }
}