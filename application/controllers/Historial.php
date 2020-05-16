<?php
defined('BASEPATH') or exit('No direct script access allowed');


/**
 *
 * Controller Historial
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

class Historial extends CI_Controller
{
    // Propiedades
    private $page       = [];       // Arreglo con las secciones de la Página web
    private $data       = [];       // Arreglo con los datos a mostrar en la web
    private $tipoVista  = 0;        // 0-> Listado, 1-> Ficha, 2-> Form Alta, 3-> Form Edicion
    private $datos      = null;     // Los datos que se envian a la vista 

    public function __construct()
    {
        parent::__construct();
        // Cargamos Modelos
        $this->load->model('Historias_model');
        $this->load->model('Clientes_model');
        // Comprabamos si hay Session
        if (!$this->session->logged || $this->session->nivel == 2) redirect('Inicio');
        // Cargamos Librerias
        $this->load->library('pagination');
    }

    public function index($offset = 0)
    {
        // Empezamos con el paginador
        // Variables y Arreglos de configuracion del Paginador
        $limite = 10;                                           // Cantidad de registros a mostrar
        $totalreg = $this->Historias_model->total_historias();  // Nos devuelve el total de registros

        $config['base_url']    = base_url('Historial/index/');  // La funcion que llamara el paginador
        $config['total_rows']  = $totalreg->TOTAL;              // Total de registros de la consulta
        $config['per_page']    = $limite;                       // Numero de registros a mostrar por pagina
        $config['uri_segment'] = 3;
        $config['num_links']   = 2;                             // Numero de links a mostrar antes y despues de la pagina actual

        // Fin de la configuracion
        // La configuracion del paginador esta en application/config/pagination.php
        // Inicializamos el paginador
        $this->pagination->initialize($config);
        // fin del paginador

        // Preparamos las propiedades de la vista (arreglo $this->data)
        // Cargamos todos los pasientes para pasarlos a la vista
        $listado = $this->Historias_model->get_historias($offset, $limite);

        // Si no hay Datos en la tabla no creamos la variable datos
        if (($listado || $this->datos)) $this->data['datos'] = ($this->datos) ? $this->datos : $listado;

        // Seleccionamos el tipo de cuerpo de la vista
        switch ($this->tipoVista) {
            case 0:     // Listado
                $plantilla = 'historias/view_cuerpo';
                break;
            case 1:     // Ficha
                $plantilla = 'historias/view_Ficha';
                break;
            case 2:     // Alta
            case 3:     // Edicion
                $plantilla = 'historias/view_Alta';
        }

        $this->data['tipoVista'] = $this->tipoVista;

        $this->vista($plantilla);
    }

    public function vista($template)
    {

        $cuerpo  = $this->load->view('view_menu', '', true);
        $cuerpo .= $this->load->view($template, $this->data, true);
        $cuerpo .= $this->load->view('view_footer', '', true);

        $this->page['cuerpo']       = $cuerpo;
        $this->page['calenjs']      = '';
        $this->page['mensaje']      = '';

        $this->load->view('view_inicio', $this->page);
    }

    // Form Alta tipoVista = 2
    public function alta($idCliente)
    {
        $this->tipoVista = 2;
        $this->datos     = $this->Clientes_model->ficha($idCliente);
        $this->index();
    }

    public function addHistoria()
    {
        $id = $this->input->post('id', TRUE);
        // $f = $this->input->post('fecha', TRUE);
        // $h = $this->input->post('hora', TRUE);
        // echo $f.' '.$h;
        $this->Historias_model->add_historia($id);
        redirect('Pacientes/ficha/'.$id);
    }

    // Form Alta tipoVista = 1
    public function ficha($id)
    {
        $this->tipoVista = 1;
        $this->datos     = $this->Historias_model->get_ficha($id);
        // print_r($this->datos);
        $this->index();

    }

    public function buscar()
    {
        $this->tipoVista = 0;
        $busqueda       = $this->input->post('buscar', TRUE);
        $this->datos    = $this->Historias_model->find($busqueda);
        $this->index();
    }
}


/* End of file Historial.php */
/* Location: ./application/controllers/Historial.php */
