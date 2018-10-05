<?php

if (! defined('BASEPATH') ) exit('No direct script access allowed');

        class daftarberita extends CI_Controller {
          public function __construct()
          {
            parent::__construct();
            $this->load->model('m_berita');
          }
          function Index()
          {
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
      }
