<?php

if (! defined('BASEPATH') ) exit('No direct script access allowed');

        class adminmenu extends CI_Controller {
          public function __construct()
          {
            parent::__construct();
            $this->load->library('upload');
          }
          function Index()
          {
            $this->load->view('templates/header');
            $this->load->view('pages/berita/berita');
            $this->load->view('templates/footer');
          }

          function simpan_berita()
          {
              $config['upload_path'] = './assets/images/Upload/'; //path folder
              $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
              $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

              $this->upload->initialize($config);
              if(!empty($_FILES['filefoto']['name'])){
                if ($this->upload->do_upload('filefoto')){
                  $gbr = $this->upload->data();
                  //Compress Image
                  $config['image_library']='gd2';
                  $config['source_image']='./assets/image/Upload/'.$gbr['file_name'];
                  $config['create_thumb']= FALSE;
                  $config['maintain_ratio']= FALSE;
                  $config['quality']= '60%';
                  $config['width']= 710;
                  $config['height']= 420;
                  $config['new_image']= './assets/image/Upload/'.$gbr['file_name'];
                  $this->load->library('image_lib', $config);
                  $this->image_lib->resize();

                  $gambar=$gbr['file_name'];
                  $jdl=$this->input->post('judul');
                  $berita=$this->input->post('berita');

                  $this->m_berita->simpan_berita($jdl,$berita,$gambar);
                  redirect('adminmenu/kelolaberita');
                }else{
                   redirect('adminmenu/kelolaberita');
                     }
                }
          }

          function daftarberita(){
            $x['data']=$this->m_berita->get_all_berita();
            $this->load->view('templates/header');
            $this->load->view('pages/berita/list',$x);
            $this->load->view('templates/footer');
          }
          function cari() {
            $data2['cari'] = $this->m_berita->cari();
            $this->load->view('Templates/header');
            $this->load->view('pages/berita/search', $data2);
            $this->load->view('Templates/footer');

            }
          function helpdesk()
          {
            $this->load->view('templates/header');
            $this->load->view('pages/helpdesk');
            $this->load->view('templates/footer');
          }

          function simpan()
          {
                  $nama = $this->input->post('nama');
                  $instansi = $this->input->post('instansi');
                  $inti = $this->input->post('gridRadios');
                  $kordinat = $this->input->post('koordinat');
                  $keterangan = $this->input->post('keterangan');

                  $this->m_helpdesk->simpan_helpdesk($nama,$instansi,$inti,$kordinat,$keterangan);
                  $this->session->set_flashdata('success', 'true');
                  redirect('adminmenu/helpdesk');
          }
           function kelolahelpdesk()
        {
            $x['data']=$this->m_helpdesk->show_laporan();
          $this->load->view('Templates/header');
          $this->load->view('pages/sarpras/kelolahelpdesk',$x);
          $this->load->view('Templates/footer');
        }

        function hapuslaporan($laporan_id)
        {
            $del = $this->m_helpdesk->hapuslaporan($laporan_id);
            if ($del>0) {
                  $this->session->set_flashdata('success', 'true');
                  redirect('adminmenu/kelolahelpdesk');
            }
      }
        function kelolaberita(){
            $x['data']=$this->m_kelolaberita->show_berita();
            $this->load->view('templates/header');
            $this->load->view('pages/berita/kelolaberita',$x);
            $this->load->view('templates/footer');
      }

      function updateberita($berita_id){
            $x['bebas']=$this->m_kelolaberita->v_editberita($berita_id);
            // die(print_r($x));
            $this->load->view('templates/header');
            $this->load->view('pages/berita/updateberita',$x);
            $this->load->view('templates/footer');
      }
      function edit_berita(){
        $config['upload_path'] = './assets/images/Upload/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['encrypt_name'] = TRUE; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if(!empty($_FILES['filefoto']['name'])){
          if ($this->upload->do_upload('filefoto')){
            $gbr = $this->upload->data();
            //Compress Image
            $config['image_library']='gd2';
            $config['source_image']='./assets/image/Upload/'.$gbr['file_name'];
            $config['create_thumb']= FALSE;
            $config['maintain_ratio']= FALSE;
            $config['quality']= '60%';
            $config['width']= 710;
            $config['height']= 420;
            $config['new_image']= './assets/image/Upload/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $berita_id=$this->input->post('id_berita');
            $berita_judul=$this->input->post('judul');
            $berita_isi=$this->input->post('berita');
            $berita_image=$gbr['file_name'];
            $this->m_kelolaberita->edit_berita($berita_id,$berita_judul,$berita_isi,$berita_image);
            redirect('adminmenu/kelolaberita');
          }
        }
      }

      function hapusberita($berita_id)
      {
            $del = $this->m_kelolaberita->hapusberita($berita_id);
            if ($del>0) {
                  $this->session->set_flashdata('success', 'true');
                  redirect('adminmenu/kelolaberita');
            }
      }



      // ===== CONTROLLER SARPRAS =====


      function Keldatasarpras()
      {
        $data['data'] = $this->m_sarpras->ambildata()->result();
        $this->load->view('templates/header');
        $this->load->view('pages/sarpras/keldata',$data);
        $this->load->view('templates/footer');
        // var_dump($data);
      }


      function getdata(){
        $data['results'] = $this->m_sarpras->ambildata()->result_array();
        echo json_encode($data);
      }
      function wheredata($id)
      {
        $where = array('id' => $id);
        $data['results'] = $this->m_sarpras->wheredata($where)->result_array();
        echo json_encode($data);
      }

      function detailpeta($codeid){
        $data['datas'] = $this->m_sarpras->getdata_id($codeid)->row();
        $this->load->view('templates/header');
        $this->load->view('pages/sarpras/detail',$data);
        $this->load->view('templates/footer');
      }


      // function getdata_id(){
      //   $data['results'] = $this->m_sarpras->getdata_id()->result_array();
      //   echo json_encode($data);
      // }

      // function ambildata()
      // {
      //   $dataTempat = $this->m->get_all_data();
      // }


      // function ambildata()
      // {
      //   $dataTempat = $this->m->ambildata('data')->result();
      //   // return $dataTempat;
      //   // die(print_r($dataTempat));
      //   echo json_encode($dataTempat);
      // }


      function tambahdata()
      {
        $nama=$this->input->post('nama');
        $kelompok=$this->input->post('kelompok');
        $latitude=$this->input->post('latitude');
        $longtitude=$this->input->post('longtitude');
        $lokasi=$this->input->post('lokasi');
        $luas=$this->input->post('luasarea');
        $nomor=$this->input->post('nomordsi');
        $penanggung_jawab=$this->input->post('penanggungjwb');
        $jml_sdm=$this->input->post('jmlsdm');
        $wktjagaopl=$this->input->post('wktjagaopl');
        $perangkat=$this->input->post('perangkat');
        $lampu=$this->input->post('lampu');
        $solar_cell=$this->input->post('solarcell');
        $battery=$this->input->post('battery');

          $this->m_sarpras->tambahdata($nama,$kelompok,$latitude,$longtitude,$lokasi,$luas,$nomor,$penanggung_jawab,$jml_sdm,$wktjagaopl,$perangkat,$lampu,$solar_cell,$battery);
          redirect('adminmenu/Keldatasarpras');
        }







      function editdata($data_id)
      {
        $x[dataid]=$this->M_sarpras->v_editdata($data_id);
      }

      function ambilId()
      {
        $id=$this->input->post('id');
        $where=array('id'=>$id);
        $datatmpt = $this->M_sarpras->ambilId('data',$where)->result();

        echo json_encode($datatmpt);
      }


      function modal_edit(){
        $id = $this->input->post('idmodal');
        $nama = $this->input->post('nama');
        $kelompok = $this->input->post('kelompok');
        $latitude = $this->input->post('latitude');
        $longtitude = $this->input->post('longtitude');
        $lokasi = $this->input->post('lokasi');
        $luasarea = $this->input->post('luasarea');
        $nomordsi = $this->input->post('nomordsi');
        $penanggungjwb = $this->input->post('penanggungjwb');
        $jumlahsdm = $this->input->post('jumlahsdm');
        $wktjagaopl = $this->input->post('wktjagaopl');
        $perangkat = $this->input->post('perangkat');
        $lampu = $this->input->post('lampu');
        $solarcell = $this->input->post('solarcell');
        $battery = $this->input->post('battery');

        $this->m_sarpras->modal_edit($id,$nama,$kelompok,$latitude,$longtitude,$lokasi,$luasarea,$nomordsi,$penanggungjwb,$jumlahsdm,$wktjagaopl,$perangkat,$lampu,$solarcell,$battery);
        redirect('adminmenu/Keldatasarpras');
      }

      function hapusdata($blabla){
        $delete = $this->m_sarpras->hapusdata($blabla);
        if ($delete>0) {
          $this->session->set_flashdata('sucess','true');
          redirect('adminmenu/keldatasarpras');
        }
      }




} //END CONTROLLER




?>
