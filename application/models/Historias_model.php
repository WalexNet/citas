<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 * Model Historias_model
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

class Historias_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------


    // ------------------------------------------------------------------------

    public function get_historias($offset = false, $limite = false)
    {
        $this->db->order_by('fecha', 'DESC');
        $datos = $this->db->get('historias', $limite, $offset);
        return $datos->result();
    }

    public function total_historias()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from historias");
        return $ssql->row();
    }

    public function add_historia($id)
    {
        $datos['idcliente'] = $id;
        $datos['fecha']     = $this->input->post('fecha', TRUE).' '.$this->input->post('hora', TRUE);;
        $datos['notas']     = $this->input->post('notas', TRUE);
        $datos['des']       = $this->input->post('des', TRUE);

        $this->db->insert('hisnotas', $datos);
    }

    public function get_ficha($id)
    {
        $ficha = $this->db->get_where('historias', ['idhistoria' => $id]);
        return $ficha->row();
    }

    public function find($busqueda)
    {
        $this->db->or_like('dni', $busqueda);
        $this->db->or_like('nombres', $busqueda);
        $this->db->or_like('apellidos', $busqueda);
        $datos = $this->db->get('historias');
        
        return $datos->result();
    }



    // ------------------------------------------------------------------------

}

/* End of file Historias_model.php */
/* Location: ./application/models/Historias_model.php */
