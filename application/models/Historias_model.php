<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

class Historias_model extends CI_Model {

  // ------------------------------------------------------------------------

  public function __construct()
  {
    parent::__construct();
  }

  // ------------------------------------------------------------------------


  // ------------------------------------------------------------------------
  public function index()
  {
    // 
  }

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



  // ------------------------------------------------------------------------

}

/* End of file Historias_model.php */
/* Location: ./application/models/Historias_model.php */