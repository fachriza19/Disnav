<?php
  defined ('BASEPATH') OR exit();

  class M_sarpras extends CI_Model{

      // function ambildata($table){
      //   return $this->db->get($table);
      // }

      function ambildata()
      {
        $this->db->select('*');
        $this->db->from('data');

        return $this->db->get();
      }

      function tambahdata($data,$table)
      {
        $this->db->insert($table,$data);
      }

      function v_editdata($data_id)
      {
        $this->db->select('*');
        $this->db->from('data');
        $this->db->where('id',$data_id);
        $where=$this->db->get();
        return $where->row();
      }

      function ambilId($table,$where){
      return  $this->db->get_where($table,$where);
      }


  } //end CI_Model

 ?>
