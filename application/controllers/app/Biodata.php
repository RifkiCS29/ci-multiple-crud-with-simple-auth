<?php  
defined('BASEPATH') OR exit('no direct script access allowed');

class Biodata extends MY_App
{

    private $redirect = 'app/biodata';
    private $redirect_create = 'app/biodata/create';

    public function __construct()
    {

        parent::__construct();

        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('app/Biodata_model');

        $this->load->helper('Login');
        cek_session();
    }

    public function index()
    {

        $data = [
        'title' => 'Module Crud',
        'biodata' => $this->Biodata_model->index(),
        ];

        $this->load->view('app/biodata/index',$data);
    }

    public function create()
    {

        $data = [
        'title' => 'Create Data',
        'update' => false,
        ];

        /**
         * check if count form > 100
         */
        if ($this->input->get('form')) {

            if ($this->input->get('form') > 100) {
                $this->session->set_flashdata('validation', 'Form limited 100');
                redirect($this->redirect_create);
                exit;
            }elseif (!is_numeric($this->input->get('form'))) {
                $this->session->set_flashdata('validation', 'Error Create Form, Parameter not interger');
                redirect($this->redirect_create);
                exit;
            }
        }

        $this->load->view('app/biodata/form',$data); 

    }

    public function store()
    {

        $create = $this->Biodata_model->create_multiple();

        if ($create == TRUE) {

            $this->session->set_flashdata('create', true);
        }
        else {

            $this->session->set_flashdata('create', 'failed');
        }    

        redirect($this->redirect);
    }

    public function edit($id = false)
    {

        $data = [
        'title' => 'Edit Data',
        'update' => true,
        'biodata' => $this->Biodata_model->edit_multiple($id),
        ];

        $this->load->view('app/biodata/form',$data);
    }

    public function update()
    {

        if ($this->Biodata_model->update_multiple() == TRUE) {

            $this->session->set_flashdata('edit', true);
        }else {

            $this->session->set_flashdata('edit', 'failed');
        }     

        redirect($this->redirect);   
    }

    public function delete()
    {


        if ($this->Biodata_model->delete_batch() == TRUE) {

            $this->session->set_flashdata('delete', true);
        }else {

            $this->session->set_flashdata('delete', 'failed');
        }     

        redirect($this->redirect);
    }
}

?>
