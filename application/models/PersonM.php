<?php

class PersonM extends CI_Model{

  public function empty_response(){
    $response['status']=502;
    $response['error']=true;
    $response['message']='Field tidak boleh kosong';
    return $response;
  }

  public function add_product($nama,$kelas,$pelajaran,$keterangan_masuk,$tanggal){

    if(empty($nama) || empty($kelas) || empty($pelajaran) || empty($keterangan_masuk) || empty($tanggal)){
      return $this->empty_response();
    }else{
      $data     = array(
        "nama"  =>$nama,
        "kelas" =>$kelas,
        "pelajaran" =>$pelajaran, 
        "keterangan_masuk"  =>$keterangan_masuk,
        "tanggal" =>$tanggal 
      );

      $insert = $this->db->insert("tb_absen", $data);

      if($insert){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Absen siswa ditambahkan.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Absen siswa gagal ditambahkan.';
        return $response;
      }
    }

  }

  public function all_product(){

    $all = $this->db->get("tb_absen")->result();
    $response = $all;
    return $response;

  }

  public function delete_product($id){

    if($id == ''){
      return $this->empty_response();
    }else{
      $where = array(
        "id"=>$id
      );

      $this->db->where($where);
      $delete = $this->db->delete("tb_absen");
      if($delete){
        $response['status']=200;
        $response['error']=false;
        $response['message']='Absen siswa dihapus.';
        return $response;
      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Absen siswa gagal dihapus.';
        return $response;
      }
    }

  }

  public function update_product($id,$nama,$kelas,$pelajaran,$keterangan_masuk,$tanggal){

    if($id == '' || empty($nama) || empty($kelas) || empty($pelajaran) || empty($keterangan_masuk) || empty($tanggal)){
      return $this->empty_response();
    }else{
      $where = array(
        "id"=>$id
      );

      $set      = array(
        "nama"  =>$nama,
        "kelas" =>$kelas,
        "pelajaran" =>$pelajaran, 
        "keterangan_masuk"  =>$keterangan_masuk,
        "tanggal" =>$tanggal 
      );

      $this->db->where($where);
      $update = $this->db->update("tb_absen",$set);
      if($update){
        $response=$where+$set;
        return $response;

      }else{
        $response['status']=502;
        $response['error']=true;
        $response['message']='Absen siswa gagal diubah.';
        return $response;
      }
    }

  }

}

?>
