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
        
    public function __construct()
    { 
        parent::__construct();
        $this->load->model('Clientes_model');
        $sesdata['inicio'] = true;
        $this->session->set_userdata($sesdata);
    }

    public function index()
    {
        // preparamos la vista principal
        $page['menu']       = $this->load->view('view_menu','',true);
        $page['header']     = $this->load->view('view_header','',true);

        if ( $this->session->logged && $this->session->verificado ) {
            $page['ingreso'] = '';
        }else{
            $page['ingreso'] = $this->load->view('view_ingreso','',true);
        };
        
        $page['servicios']  = $this->load->view('view_servicios','',true);
        $page['acordeon']   = $this->load->view('view_acordeon','',true);
        $page['email']      = $this->load->view('view_email','',true);
        $page['contacto']   = $this->load->view('view_contacto','',true);
        $page['footer']     = $this->load->view('view_footer','',true);
        $page['calendario'] = '';
        $page['calenjs']    = '';
        $page['mensaje']    =  $this->session->alerta ? "<script> alert('Se le enviara un mail de verificacion'); </script>" : '';
        $this->session->set_userdata('alerta',0);
        
        $this->load->view('view_inicio',$page);
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
            $sesdata['inicio']      = false;
            $sesdata['mail_existe'] = false;

            $this->session->set_userdata($sesdata);

            if ($verificado){
                redirect('Agenda');
            }else{
                $this->index();
            }
        }else{ // Si no existe mostramos mensaje de error y ofrecemos darse de alta o que vuelva a ingresar los datos
            $sesdata['inicio'] = false;
            $this->session->set_userdata($sesdata);
        }
        $this->index();
    }

    public function salir()
    {
        $this->session->sess_destroy();
        redirect('Inicio/index');
    }


}


/* End of file Inicio.php */
/* Location: ./application/controllers/Inicio.php */