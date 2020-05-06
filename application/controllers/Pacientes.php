<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Pacientes
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

class Pacientes extends CI_Controller
{
    // Propiedades
    private $page           = [];


    public function __construct()
    {
        parent::__construct();
        // Cargamos Modelos
        $this->load->model('Clientes_model');
        // Comprabamos si hay Session
        if (!$this->session->logged || $this->session->nivel==2) redirect('Inicio');
    }

    public function index()
    {
        // preparamos la vista principal
        $this->page['menu']         = $this->load->view('view_menu','',true);
        $this->page['header']       = ''; // $this->load->view('view_header','',true);
        $this->page['ingreso']      = '';
        $this->page['servicios']    = '';
        $this->page['acordeon']     = '';
        $this->page['email']        = $this->load->view('pacientes/view_cuerpo','',true);;
        $this->page['contacto']     = '';
        $this->page['calendario']   = '';
        $this->page['calenjs']      = '';
        $this->page['mensaje']      = '';
        $this->page['footer']       = $this->load->view('view_footer','',true);
        $this->vista();
    }

    public function vista()
    {
        $this->load->view('view_inicio',$this->page);
    }
}


/* End of file Pacientes.php */
/* Location: ./application/controllers/Pacientes.php */
