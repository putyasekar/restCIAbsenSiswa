<?php

require APPPATH . 'libraries/REST_Controller.php';

class Person extends REST_Controller{

  // construct
  public function __construct(){
    parent::__construct();
    $this->load->model('PersonM');
  }

  // method index untuk menampilkan semua data product menggunakan method get
  public function index_get(){
    $response = $this->PersonM->all_product();
    $this->response($response);
  }

  // untuk menambah product menaggunakan method post
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

  // update data product menggunakan method put
  public function update_put(){
    $response = $this->PersonM->update_product(
        $this->put('id'),
        $this->put('nama'),
        $this->put('kelas'),
        // $this->put('image'),
        $this->put('pelajaran'),
        $this->put('keterangan_masuk'),
        $this->put('tanggal')
      );
    $this->response($response);
  }

  // hapus data product menggunakan method delete
  public function delete_delete(){
    $response = $this->PersonM->delete_product(
        $this->delete('id')
      );
    $this->response($response);
  }

}

?>
