<?php
defined('BASEPATH') or exit('No direct script access allowed');

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

class Clientes_model extends CI_Model
{

    // ------------------------------------------------------------------------

    public function __construct()
    {
        parent::__construct();
    }

    // ------------------------------------------------------------------------
    public function get_pacientes($offset = false, $limite = false)
    {
        $this->db->order_by('id', 'DESC');
        $datos = $this->db->get('clientes', $limite, $offset);
        return $datos->result();
    }

    public function total_pacientes()
    {
        $ssql = $this->db->query("SELECT COUNT(*) as TOTAL from clientes");
        return $ssql->row();
    }

    // ------------------------------------------------------------------------

    public function buscacli($mail, $psw)
    {
        return $this->db->get_where('clientes', ['mail' => $mail, 'psw' => $psw]);
    }

    public function verificar($cv)
    {
        $this->db->update('clientes', array('verificado' => 1), array('mailhash' => $cv));
    }

    public function addcli($mh = '')
    {
        $datos['nombres']    = $this->input->post('nombre', TRUE);
        $datos['apellidos']  = $this->input->post('apellido', TRUE);
        $datos['dni']        = $this->input->post('dni', TRUE);
        $datos['mail']       = $this->input->post('mail', TRUE);
        $datos['psw']        = md5($this->input->post('psw', TRUE));
        $datos['dir']        = $this->input->post('direccion', TRUE);
        $datos['cp']         = $this->input->post('cp', TRUE);
        $datos['localidad']  = $this->input->post('localidad', TRUE);
        $datos['provincia']  = $this->input->post('provincia', TRUE);
        $datos['tel1']       = $this->input->post('tel1', TRUE);
        $datos['tel2']       = $this->input->post('tel2', TRUE);
        $datos['mailhash']   = $mh;

        if (isset($_POST['comentario'])) $datos['comentario'] = $this->input->post('comentario', TRUE);

        $this->db->insert('clientes', $datos);
    }

    public function existe($campo, $valor)
    {
        $res = $this->db->get_where('clientes', array($campo => $valor));
        $fila = $res->row();
        return (isset($fila)) ? true : false;
    }

    public function ficha($id)
    {
        $row = $this->db->get_where('todohistorias', ['id' => $id]);
        return $row->result();
    }

    public function editFicha($id)
    {
        $datos['nombres']    = $this->input->post('nombre', TRUE);
        $datos['apellidos']  = $this->input->post('apellido', TRUE);
        $datos['dni']        = $this->input->post('dni', TRUE);
        $datos['mail']       = $this->input->post('mail', TRUE);
        $datos['dir']        = $this->input->post('direccion', TRUE);
        $datos['cp']         = $this->input->post('cp', TRUE);
        $datos['localidad']  = $this->input->post('localidad', TRUE);
        $datos['provincia']  = $this->input->post('provincia', TRUE);
        $datos['tel1']       = $this->input->post('tel1', TRUE);
        $datos['tel2']       = $this->input->post('tel2', TRUE);
        $datos['comentario'] = $this->input->post('comentario', TRUE);
        $datos['verificado'] = isset($_POST['verificado']) ? 1 : 0;

        $this->db->update('clientes', $datos, ['id' => $id]);
    }

    public function del_ficha($id)
    {
        return $this->db->delete('clientes', ['id' => $id]);
    }

    public function find_paciente()
    {
        $busqueda = $this->input->post('buscar_paciente',true);

        $this->db->or_like('nombres', $busqueda);
        $this->db->or_like('apellidos', $busqueda);
        $this->db->or_like('dni', $busqueda);
        $datos = $this->db->get('clientes');
        
        return $datos->result();
    }
    // ------------------------------------------------------------------------

}

/* End of file Clientes_model.php */
/* Location: ./application/models/Clientes_model.php */
