<?php

require APPPATH . 'libraries/REST_Controller.php';

class Person extends REST_Controller{


  public function __construct(){
    parent::__construct();
    $this->load->model('PersonM');
  }

  public function index_get(){
    $response = $this->PersonM->all_product();
    $this->response($response);
  }

  public function add_post(){
    $response = $this->PersonM->add_product(
        $this->post('nama'),
        $this->post('kelas'),
        $this->post('pelajaran'),
        $this->post('keterangan_masuk'),
        $this->post('tanggal')
      );
    $this->response($response);
  }

  public function update_put(){
    $response = $this->PersonM->update_product(
        $this->put('id'),
        $this->put('nama'),
        $this->put('kelas'),
        $this->put('pelajaran'),
        $this->put('keterangan_masuk'),
        $this->put('tanggal')
      );
    $this->response($response);
  }

  public function delete_delete(){
    $response = $this->PersonM->delete_product(
        $this->delete('id')
      );
    $this->response($response);
  }

}

?>
