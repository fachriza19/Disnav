<div class="page-wrapper">
  <div class="container-fluid">



    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Helpdesk</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Helpdesk</li>
        </ol>
      </div>
    </div>



        <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-icon alert-success border-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>Data Berhasil Diinput
              </div>
            <?php endif; ?>
            <form action="<?php echo base_url(). 'adminmenu/simpan'; ?>" method="post">
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Anda</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="nama" id="inputEmail3" placeholder="Input Nama anda">
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-2 col-form-label">Instansi</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" name="instansi" id="inputPassword3" placeholder="Input Instansi anda">
                </div>
              </div>
              <fieldset class="form-group">
                <div class="row">
                  <label class="col-form-label col-sm-2 pt-0">Pilih Laporan</label>
                  <div class="col-sm-10">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="Menara suar">
                      <label class="form-check-label" for="gridRadios1">Menara Suar</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="Rambu suar">
                      <label class="form-check-label" for="gridRadios2">Rambu suar</label>
                    </div>
                    <div class="form-check disabled">
                      <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="pelampung suar">
                      <label class="form-check-label" for="gridRadios3">Pelampung Suar</label>
                    </div>
                  </div>
                </div>
              </fieldset>
              <div class="form-group">
                <label for="exampleFormControlTextarea1">Koordinat</label>
                <textarea class="form-control" name="koordinat" id="exampleFormControlTextarea1" placeholder="Masukkan titik Koordinat Laporan Anda, Contoh : koordinat 1derajat LS, 3 derajat LB"></textarea>
              </div>
               <div class="form-group">
                <label for="exampleFormControlTextarea1">Keterangan</label>
                <textarea class="form-control" name="keterangan" id="exampleFormControlTextarea1"></textarea>
              </div>
              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>



  </div>
</div>
