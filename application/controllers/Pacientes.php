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
    private $page       = [];       // Arreglo con las secciones de la Página web
    private $data       = [];       // Arreglo con los datos a mostrar en la web
    private $tipoVista  = 0;        // 0-> Listado, 1-> Ficha, 2-> Form Alta, 3-> Form Edicion
    private $datos      = null;     // Los datos que se envian a la vista 


    public function __construct()
    {
        parent::__construct();
        // Cargamos Modelos
        $this->load->model('Clientes_model');
        // Comprabamos si hay Session
        if (!$this->session->logged || $this->session->nivel==2) redirect('Inicio');
        // Cargamos Librerias
        $this->load->library('pagination');
    }

    public function index($offset = 0)
    {
        // Empezamos con el paginador
        // Variables y Arreglos de configuracion del Paginador
        $limite = 10;                                                    // Cantidad de registros a mostrar
        $totalreg = $this->Clientes_model->total_pacientes();       // Nos devuelve el total de registros

        $config['base_url']    = base_url('Pacientes/index/');        // La funcion que llamara el paginador
        $config['total_rows']  = $totalreg->TOTAL;                      // Total de registros de la consulta
        $config['per_page']    = $limite;                               // Numero de registros a mostrar por pagina
        $config['uri_segment'] = 3;
        $config['num_links']   = 2;                                     // Numero de links a mostrar antes y despues de la pagina actual

        // Fin de la configuracion
        // La configuracion del paginador esta en application/config/pagination.php
        // Inicializamos el paginador
        $this->pagination->initialize($config);
        // fin del paginador

        // Preparamos las propiedades de la vista (arreglo $this->data)
        // Cargamos todos los pasientes para pasarlos a la vista
        $listado = $this->Clientes_model->get_pacientes($offset, $limite);

        // Si no hay Datos en la tabla no creamos la variable datos
        if (($listado || $this->datos)) $this->data['datos'] = ($this->datos) ? $this->datos : $listado;

        // Seleccionamos el tipo de cuerpo de la vista
        switch ($this->tipoVista){
            case 0:     // Listado
                $plantilla = 'pacientes/view_cuerpo';
                break;
            case 1:     // Ficha
                $plantilla = 'pacientes/view_Ficha';
                break;
            case 2:     // Alta
            case 3:     // Edicion
                $plantilla = 'pacientes/view_AltaEdita';
        }

        $this->data['tipoVista'] = $this->tipoVista;

        $this->vista($plantilla);
    }

    public function vista($template)
    {
        $this->page['menu']         = $this->load->view('view_menu','',true);
        $this->page['header']       = ''; // $this->load->view('view_header','',true);
        $this->page['ingreso']      = '';
        $this->page['servicios']    = '';
        $this->page['acordeon']     = '';
        $this->page['email']        = $this->load->view($template, $this->data,true);
        $this->page['contacto']     = '';
        $this->page['calendario']   = '';
        $this->page['calenjs']      = '';
        $this->page['mensaje']      = '';
        $this->page['footer']       = $this->load->view('view_footer','',true);
        
        $this->load->view('view_inicio',$this->page);
    }

    // EDICION tipoVista -> 3 ------------------------------------------------------
    public function editar($id){
        $this->tipoVista    = 3;
        $this->datos        = $this->Clientes_model->ficha($id);

        $this->index();
    }

    public function modifica(){
        $id = $_POST['id'];
        $this->Clientes_model->editFicha($id);
        $this->index();
    }
    // -----------------------------------------------------------------

    // ALTA tipoVista -> 2
    public function formAlta(){
        $this->tipoVista = 2;
        $this->index();
    }

    // FICHA tipoVista -> 1
    public function ficha($id){
        $this->tipoVista = 1;

        $this->index();
    }

}


/* End of file Pacientes.php */
/* Location: ./application/controllers/Pacientes.php */
