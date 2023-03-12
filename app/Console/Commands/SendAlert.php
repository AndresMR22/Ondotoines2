<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Cita;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Mensaje;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use App\Mail\EnvioMensaje;
use Illuminate\Support\Facades\Mail;
use DateTime;

class SendAlert extends Command
{
 
    protected $signature = 'command:alertacita';
 
    protected $description = 'Comando para enviar alertas a los usuarios con citas proximas';
    
    public function handle()
    {
        //formato fecha carbon: 2023-02-06 00:00:00
        $citas = Cita::all();
        foreach($citas as $cita)
        {
            if($cita->mensaje_id==null || $cita->mensaje_id=="")
            {
                //Datos paciente
                $paciente_id = $cita->paciente_id;
                $paciente = Paciente::find($paciente_id);
    
                $fechaInicio = $cita->fecha_inicio;
                $hoy = new Carbon('now');
                $horaInicio = substr($fechaInicio,11,-3);
                $fecha1 = new DateTime();
                $date1 = strtotime($hoy);
                $date2 = strtotime($horaInicio);
                $diff = $fecha1->diff($horaInicio);

                $fechaInicio = date("Y-m-d h:i:s",strtotime ( '-1 day' , strtotime ( $fechaInicio ) ) );
                Storage::append('file.txt',$fechaInicio.'----'.$hoy);
                $mensajeAlerta = "El paciente ".$paciente->nombre." tiene una cita el día de mañana.";
                if($hoy >= $fechaInicio)
                {
                    $mensaje = Mensaje::create([
                        "nombre"=>"Paciente: ".$paciente->nombre." ".$paciente->apellido,
                        "email"=>$paciente->correo,
                        "telefono"=>$paciente->telefono,
                        "asunto"=>$cita->asunto,
                        "mensaje"=>$mensajeAlerta,
                        "cita_id"=>$cita->id,
                        "notificado"=>"SI",
                        "hora" => $horaInicio,
                        "horasFaltantes"=>$diff
                       ]);

                    Cita::make_order_notification($mensaje);

                    $cita->update([
                        "mensaje_id"=>$mensaje->id
                    ]);

                    $email = $paciente->correo;
                    // Mail::to($email)->send(new EnvioMensaje($email, $paciente->nombre, $mensajeAlerta, $paciente->telefono, $cita->especialidad));
                    Storage::append('file.txt',$email);

                   


                }
                
            }
            
            
          
        }
    }
}
