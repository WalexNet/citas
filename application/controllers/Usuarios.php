<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Usuarios
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Usuarios extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Clientes_model');
    }

    public function cliadd(){
        // Primero preguntamos si existe mail
        $mail = $this->input->post('mail',TRUE);
        if ($this->Clientes_model->existe('mail',$mail)){
            $this->session->set_userdata('mail_existe',1);
        }else{
            // Agrega cliente
            // llamamos al modelo para que lo agregue
            $this->session->set_userdata('mail_existe',0);
            $this->session->set_userdata('alerta',1);
            // preparamos el mailhash o codigo de verificacion
            $mailhash = md5($mail.time());
            // Añadimos el registro
            $this->Clientes_model->addcli($mailhash);
            $this->enviar($mail, $mailhash);
        };

        redirect('Inicio');
    }

    public function enviar($to, $mailhash){
        $from = "myriam@mail.com";
        // $to = "walter@walex.net";
        $subject = "Confirmación de mail";
        $headers = "From:" . $from;
        $message = "Para confirmar el mail por favor pinche en el siguiente enlace:\n";
        $message .= "\n<a href='".base_url()."Email/confirmar/".$mailhash."'></a>\n\n";
        $message .= "Si no le funciona el link, copie la URL y peguela en la barra del navegador.";
        
        mail($to,$subject,$message, $headers);
    }
    
}

/* End of file Ucuarios.php */
/* Location: ./application/controllers/Ucuarios.php */