<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Email
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

class Email extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        // $this->load->library('email');
        $this->load->model('Clientes_model');
    }

    public function mensaje($ok){
        // preparamos la vista principal
        $page['menu']       = $this->load->view('view_menu','',true);
        $page['header']     = $this->load->view('view_header','',true);

        $page['ingreso']    = $this->load->view(($ok) ? 'view_msgMailOk' : 'view_msgMailNoOk','',true);;

        $page['contacto']   = $this->load->view('view_contacto','',true);
        $page['footer']     = $this->load->view('view_footer','',true);

        $page['calendario'] = '';
        $page['calenjs']    = '';
        $page['mensaje']    = '';
        
        $page['servicios']  = '';
        $page['acordeon']   = '';
        $page['email']      = '';
        
        $this->load->view('view_inicio',$page);
    }

    public function confirmar($cv){
        // $cv = Codigo de verificacion ($mailhash)
        if ($this->Clientes_model->existe('mailhash',$cv)){
            // verificamos
            $this->Clientes_model->verificar($cv);
            // Imprimimos mensaje Verificacion OK
            $ok = true;
        }else{
            // verificacion error
            $ok = false;
        }
        $this->mensaje($ok);
    }

    public function enviar(){
        $nombre     = $this->input->post('nombre');
        $from       = $this->input->post('email');
        $message    = $this->input->post('cuerpomail');
        $to = "myriam@mail.com";

        $subject = "Consulta de: ".$nombre;
        $headers = "From:" . $from;
        mail($to,$subject,$message, $headers);
    }
}


/* End of file Email.php */
/* Location: ./application/controllers/Email.php */