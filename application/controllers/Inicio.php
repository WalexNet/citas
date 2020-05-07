<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Inicio
 *
 * This controller for ...
 * 
 * He cambiado el archivo estoy en la rama desarrollo de git
 * otra prueba
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Inicio extends CI_Controller
{
    // Propiedades
    //private $okingreso = true;
    private $page           = [];
    private $errorRegistro  = false;
        
    public function __construct()
    { 
        parent::__construct();
        // Cargamos Modelos
        $this->load->model('Clientes_model');
        // Comprabamos si hay Session
    }

    public function index()
    {
        $cuerpo  = $this->load->view('view_menu','',true);
        $cuerpo .= $this->load->view('view_header','',true);

        $data['errorRegistro'] = $this->errorRegistro;
        if ( !$this->session->logged && !$this->session->verificado ) {
            $cuerpo .= $this->page['ingreso'] = $this->load->view('view_ingreso',$data,true);
        };
        
        $cuerpo .= $this->load->view('view_servicios','',true);
        $cuerpo .= $this->load->view('view_acordeon','',true);
        $cuerpo .= $this->load->view('view_email','',true);
        $cuerpo .= $this->load->view('view_contacto','',true);
        $cuerpo .= $this->load->view('view_footer','',true);
        $this->page['cuerpo']   = $cuerpo;
        $this->page['calenjs']  = '';
        $this->page['mensaje']  =  $this->session->alerta ? "<script> alert('Se le enviara un mail de verificacion'); </script>" : '';
        $this->session->set_userdata('alerta',0);

        $this->load->view('view_inicio',$this->page);
        
    }

    public function vista()
    {
        // $this->load->view('view_inicio',$this->page);
    }

    public function entrar()
    {
        // Si hay session la destruimos
        if (isset($this->session->username))
            $this->session->sess_destroy();
        // Buscamos al Cliente en la BBDD
        $mail = $this->input->post('mail',TRUE);
        $psw  = $this->input->post('psw',TRUE);
        $respuesta = $this->Clientes_model->buscacli($mail, md5($psw));
        // Verificamos la respuesta
        if (null !== $respuesta->row()){
            // Si Existe verificamos si el mail esta verificado
            $fila       = $respuesta->row();
            $nombre     = $fila->nombres;
            $email      = $fila->mail;
            $nivel      = $fila->nivel;
            $id         = $fila->id;
            $verificado = $fila->verificado;

            $sesdata['username']    = $nombre;
            $sesdata['email']       = $email;
            $sesdata['nivel']       = $nivel;
            $sesdata['id']          = $id;
            $sesdata['verificado']  = $verificado;
            $sesdata['logged']      = true;
            $sesdata['mail_existe'] = false;

            $this->session->set_userdata($sesdata);

            if ($verificado && ($nivel == 2)){
                redirect('Agenda');
            }else{
                redirect('Inicio');
                // $this->index();
            }
        }else{ // Si no existe mostramos mensaje de error y ofrecemos darse de alta o que vuelva a ingresar los datos
           $this->errorRegistro = true;
        }
        $this->index();
    }

    public function salir()
    {
        $this->session->sess_destroy();
        redirect('Inicio');
    }


}


/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */