<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Calendar_model
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

class Calendar_model extends CI_Model {

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------
    public function listar()  {
        // 
        return $this->db->get('citas');
    }

    public function insert(){
        // Leemos los campos a insertar
        $data['title']       = $this->input->post('title',TRUE);
        $data['start']       = $this->input->post('start',TRUE);
        $data['end']         = $this->input->post('end',TRUE);
        $data['descripcion'] = $this->input->post('description',TRUE);
        $data['idcliente']   = $this->input->post('idcliente',TRUE);
        // Añadimos a la tabla citas los datos
        $this->db->insert('citas',$data);
    }

    public function delete(){
        $data['id'] = $this->input->post('id',true);
        $this->db->delete('citas', $data);
    }

    public function editar(){
        // Leemos los campos a insertar
        $data['title']       = $this->input->post('title',TRUE);
        $data['start']       = $this->input->post('start',TRUE);
        $data['end']         = $this->input->post('end',TRUE);
        $data['descripcion'] = $this->input->post('description',TRUE);
        $data['idcliente']   = $this->input->post('idcliente',TRUE); 
        $id = $this->input->post('id',TRUE);  
        
        $this->db->update('citas', $data, array('id' => $id));

    }

    // ------------------------------------------------------------------------

}

/* End of file Calendar_model.php */
/* Location: ./application/models/Calendar_model.php */