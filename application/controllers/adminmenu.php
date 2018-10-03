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
                }else{
                   redirect('adminmenu/kelolaberita');
                }
          }

          function daftarberita(){
            $x['data']=$this->m_berita->get_all_berita();
            $this->load->view('templates/header');
            $this->load->view('pages/berita/list',$x);
            $this->load->view('templates/footer');
          }

          function tampilanberita(){
            $kode=$this->uri->segment(3);
            $x['data']=$this->m_berita->get_berita_by_kode($kode);
            $this->load->view('templates/header');
            $this->load->view('pages/berita/tampilanberita',$x);
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
            $file = [
                  'upload_path' => './assets/images/Upload',
                  'allowed_types' => '*',
                  'overwrite' => TRUE,
                  'encrypt_name' => TRUE
            ];
            $this->load->library('upload', $file);
            $files= $_FILES['filefoto']['name'];
            if (!$this->upload->do_upload('filefoto')) {
                  $this->upload->display_errors();
            } else {
                  // $this->upload->do_upload('file'.$i);
                  $a = $this->upload->data();
            }

            $berita_id=$this->input->post('id_berita');
            $berita_judul=$this->input->post('judul');
            $berita_isi=$this->input->post('berita');
            $berita_image=$a['file_name'];
            $this->m_kelolaberita->edit_berita($berita_id,$berita_judul,$berita_isi,$berita_image);
            redirect('kelolaberita');
      }

      function hapusberita($berita_id)
      {
            $del = $this->m_kelolaberita->hapusberita($berita_id);
            if ($del>0) {
                  $this->session->set_flashdata('success', 'true');
                  redirect('kelolaberita');
            }
      }




      function Keldatasarpras()
      {
        $data['data'] = $this->m_sarpras->ambildata()->result();
        $this->load->view('templates/header');
        $this->load->view('pages/sarpras/keldata',$data);
        $this->load->view('templates/footer');
        // var_dump($data);
      }


      function getdata()
      {
        $data['results'] = $this->m_sarpras->ambildata()->result_array();
        echo json_encode($data);
      }

      function getdata_id()
      {
        $data['results'] = $this->m_sarpras->ambildata()->result_array();
        echo json_encode($data);
      }

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
        $luas=$this->input->post('luas_area');
        $nomor=$this->input->post('nomordsi');
        $penanggung_jawab=$this->input->post('penanggung_jawab');
        $jml_sdm=$this->input->post('jml_sdm');
        $wktjagaopl=$this->input->post('wktjagaopl');
        $perangkat=$this->input->post('perangkat');
        $lampu=$this->input->post('lampu');
        $solar_cell=$this->input->post('solar_cell');
        $battery=$this->input->post('battery');

        if($nama==''){
          $result['pesan']="Nama harus diisi";
        }elseif($kelompok==''){
          $result['pesan']="Kelompok harus di isi";
        }elseif($latitude==''){
          $result['pesan']="Latitude harus di isi";
        }elseif($longtitude==''){
          $result['pesan']="Longtitude harus di isi";
        }elseif($lokasi==''){
          $result['pesan']="Lokasi harus di isi";
        }elseif($luas==''){
          $result['pesan']="Luas harus di isi";
        }elseif($nomor==''){
          $result['pesan']="Nomor DSI harus di isi";
        }elseif($penanggung_jawab==''){
          $result['pesan']="Penanggung jawab harus di isi";
        }elseif($jml_sdm==''){
          $result['pesan']="Jumlah SDM harus di isi";
        }elseif($wktjagaopl==''){
          $result['pesan']="Waktu Jaga Operasional harus di isi";
        }elseif($perangkat==''){
          $result['pesan']="Perangkat harus di isi";
        }elseif($lampu==''){
          $result['pesan']="Lampu harus di isi";
        }elseif($solar_cell==''){
          $result['pesan']="Solar Cell harus di isi";
        }elseif($battery==''){
          $result['pesan']="Battery harus di isi";
        }else{
          $result['pesan']="";

          $data=array(
            'nama'=>$nama,
            'kelompok'=>$kelompok,
            'latitude'=>$latitude,
            'longtitude'=>$longtitude,
            'lokasi'=>$lokasi,
            'luas_area'=>$luas,
            'nomordsi'=>$nomor,
            'penanggung_jawab'=>$penanggung_jawab,
            'jml_sdm'=>$jml_sdm,
            'wktjagaopl'=>$wktjagaopl,
            'perangkat'=>$perangkat,
            'lampu'=>$lampu,
            'solar_cell'=>$solar_cell,
            'battery'=>$battery
          );

          $this->m_sarpras->tambahdata($data,'data');
        }

        echo json_encode($result);



      }













} //END CONTROLLER




?>
