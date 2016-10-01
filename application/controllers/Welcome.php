<?php defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');     
    }

    public function index()
    {
        $this->load->view('welcome_form');
    }

    public function view($id)
    {
    	$this->load->model('image_model');
    	$data['image'] = $this->image_model->get($id);

    	$this->load->view('welcome_result', $data);
    }

    public function do_upload()
    {
        $config['upload_path']   = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']      = 100;
        $config['max_width']     = 1024;
        $config['max_height']    = 768;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = $this->upload->display_errors();

            echo json_encode(array('status' => false, 'error' => $error));
        } else {
            $this->load->model('image_model');
            $upload = $this->upload->data();

            $data = array(
                'filename'   => $upload['file_name'],
                'created_at' => date("Y-m-d"),
            );

            $id = $this->image_model->insert($data);

            if ($id) {
                echo json_encode(array('status' => true, 'id' => $id));
            } else {
                echo json_encode(array('status' => false, 'error' => 'Failed insert image'));
                unlink('./uploads/'.$data['filename']);
            }
        }
    }
}

/* application/controllers/Welcome.php */