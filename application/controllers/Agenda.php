<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Agenda
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

class Agenda extends CI_Controller
{
    // Propiedades
    private $page  = [];

    public function __construct()
    {
        parent::__construct();
        // Comprabamos si hay Session
        if (!$this->session->logged) redirect('Inicio');
        // Cargamos Modelos
        $this->load->model('Calendar_model');
    }

    public function index()
    {
        // preparamos la vista calenadario
        $cuerpo  = $this->load->view('view_menu', '', true);
        $cuerpo .= $this->load->view('view_header', '', true);
        $cuerpo .= $this->load->view('view_calendario', '', true);
        $cuerpo .= $this->load->view('view_contacto', '', true);
        $cuerpo .= $this->load->view('view_footer', '', true);

        $this->page['cuerpo']   = $cuerpo;
        $this->page['calenjs']  = $this->load->view('view_calscript', '', true);
        $this->page['mensaje']  = '';

        $this->vista();
    }

    public function vista()
    {
        $this->load->view('view_inicio',$this->page);
    }    

    public function load()
    {
        // Cargamos los datos de la agenda y lo enviamos como JSON
        $res = $this->Calendar_model->listar();
        foreach ($res->result() as $linea) {
            $data[] = array(
                'id'          => $linea->id,
                'idcliente'   => $linea->idcliente,
                'title'       => (($linea->title == $this->session->username) || ($this->session->username == 'admin')) ? $linea->title : 'TURNO OCUPADO',
                'description' => $linea->descripcion,
                'start'       => $linea->start,
                'end'         => $linea->end,
                'color'       => $linea->color,
                'textcolor'   => $linea->textcolor,
                'editable'    => $linea->editable ? true : false,
                'pago'        => $linea->pago
            );
        }
        echo json_encode($data);
    }

    public function insertar()
    {
        //Insertamos evento en la agenda
        // Llamamos al modelo para que inserte
        $this->Calendar_model->insert();
    }

    public function borrar()
    {
        $this->Calendar_model->delete();
    }

    public function modificar()
    {
        $this->Calendar_model->editar();
    }
}



 









/* End of file Agenda.php */
/* Location: ./application/controllers/Agenda.php */
