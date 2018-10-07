<?php
  defined ('BASEPATH') OR exit();

  class M_sarpras extends CI_Model{

      // function ambildata($table){
      //   return $this->db->get($table);
      // }

      function ambildata(){
        $this->db->select('*');
        $this->db->from('data');
        // $this->db->order_by('id','desc');

        return $this->db->get();
      }
      function wheredata($id){
        $this->db->select('*');
        $this->db->from('data');
        $this->db->where($id);

        return $this->db->get();
      }

      function tambahdata($nama,$kelompok,$latitude,$longtitude,$lokasi,$luas,$nomor,$penanggung_jawab,$jml_sdm,$wktjagaopl,$perangkat,$lampu,$solar_cell,$battery){
        $hsl=$this->db->query("INSERT INTO data (nama,kelompok,latitude,longtitude,lokasi,luas_area,nomordsi,penanggung_jawab,jml_sdm,wktjagaopl,perangkat,lampu,solar_cell,battery) VALUES ('$nama','$kelompok','$latitude','$longtitude','$lokasi','$luas','$nomor','$penanggung_jawab','$jml_sdm','$wktjagaopl','$perangkat','$lampu','$solar_cell','$battery') ");
        // ('$nama','$kelompok','$latitude','$longtitude','$lokasi','$luas','$nomor','$penanggung_jawab','$jml_sdm','$wktjagaopl','$perangkat','$lampu','$solar_cell','$battery')
        return $hsl;
      }

      function v_editdata($data_id){
        $this->db->select('*');
        $this->db->from('data');
        $this->db->where('id',$data_id);
        $where=$this->db->get();
        return $where->row();
      }

      function ambilId($table,$where){
      return  $this->db->get_where($table,$where);
      }


      function getdata_id($codeid){
      $hsl=$this->db->query("SELECT * FROM data Where id='$codeid'");
      return $hsl;
      }

      function modal_edit($id,$nama,$kelompok,$latitude,$longtitude,$lokasi,$luasarea,$nomordsi,$penanggungjwb,$jumlahsdm,$wktjagaopl,$perangkat,$lampu,$solarcell,$battery){
        $hsl=$this->db->query("UPDATE data SET nama='$nama',kelompok='$kelompok',latitude='$latitude',longtitude='$longtitude',lokasi='$lokasi',luas_area='$luasarea',nomordsi='$nomordsi',penanggung_jawab='$penanggungjwb',jml_sdm='$jumlahsdm',wktjagaopl='$wktjagaopl',perangkat='$perangkat',lampu='$lampu',solar_cell='$solarcell',battery='$battery' WHERE id='$id'");
        return $hsl;
      }
      function hapusdata($blabla){
        $this->db->where('id', $blabla);
        return $this->db->delete('data');
      }



  } //end CI_Model

 ?>
