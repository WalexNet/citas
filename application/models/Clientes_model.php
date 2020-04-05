<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Clientes_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Daniel Walter Pérez Corvalán  <walter@walex.net>
 * @link      www.walex.net
 * @param     ...
 * @return    ...
 *
 */

class Clientes_model extends CI_Model {

  // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------

    public function buscacli($mail, $psw)  {
        return $this->db->get_where('clientes', array('mail' => $mail, 'psw' => $psw));
    }

    public function verificar($cv){
        $this->db->update('clientes',array('verificado'=>1), array('mailhash'=>$cv));
    }

    public function addcli($mh = ''){
        $datos['nombres']    = $this->input->post('nombre',TRUE);
        $datos['apellidos']  = $this->input->post('apellido',TRUE);
        $datos['dni']        = $this->input->post('dni',TRUE);
        $datos['mail']       = $this->input->post('mail',TRUE);
        $datos['psw']        = md5($this->input->post('psw',TRUE));
        $datos['dir']        = $this->input->post('direccion',TRUE);
        $datos['cp']         = $this->input->post('cp',TRUE);
        $datos['localidad']  = $this->input->post('localidad',TRUE);
        $datos['provincia']  = $this->input->post('provincia',TRUE);
        $datos['tel1']       = $this->input->post('tel1',TRUE);
        $datos['tel2']       = $this->input->post('tel2',TRUE);
        $datos['comentario'] = $this->input->post('comentario',TRUE);
        $datos['mailhash']   = $mh;

        $this->db->insert('clientes',$datos);
    }

    public function existe($campo, $valor){
        $res = $this->db->get_where('clientes', array ($campo => $valor));
        $fila = $res->row();
        return (isset($fila)) ? true : false;
    }

    // ------------------------------------------------------------------------

}

/* End of file Clientes_model.php */
/* Location: ./application/models/Clientes_model.php */