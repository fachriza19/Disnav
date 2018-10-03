<div class="page-wrapper">
  <div class="container-fluid">



    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Kelola Data Sarana & Prasarana </h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Menu Admin</li>
          <li class="breadcrumb-item active">Kelola Data Sarana & Prasarana</li>
        </ol>
      </div>
    </div>



    <div class="row">
      <div class="col-lg-12 align-self-center">
        <div class="card">
          <div class="card-body">
            <div class="row">
            <div class="col-lg-12">
            <h2 class="card-title text-center">Data</h2>

            <a href="#form" data-toggle="modal" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</a>

            <table id="table1" class=" table table-bordered table-responsive nowrap table-hover" style="width: 100%;">
              <thead>
                <tr>
                  <th class="all">ID</th>
                  <th class="all" style="width: 500px;">NAMA</th>
                  <th class="all">KELOMPOK</th>
                  <th class="all" style="width: 250px;">LATITUDE</th>
                  <th class="all" style="width: 250px;">LONGTITUDE</th>
                  <th class="all">LOKASI</th>
                  <th class="all">LUAS AREA</th>
                  <th class="all">Nomor DSI</th>
                  <th class="" style="width: 300px;">PENANGGUNG JAWAB :</th>
                  <th class="all" style="width: 50;">AKSI</th>
                  <th class="">JUMLAH SDM : </th>
                  <th class="">WAKTU JAGA OPERASIONAL : </th>
                  <th class="">PERANGKAT YANG TERPASANG : </th>
                  <th class="">LAMPU : </th>
                  <th class="">SOLAR CELL : </th>
                  <th class="">BATTERY : </th>
                </tr>
              </thead>

              <tbody id="target">



                <!-- <script type="text/javascript">
                getData();
                function getData(){
                  $.ajax({
                    type:'POST',
                    url:'<?php //echo base_url("adminmenu/ambildata") ?>',
                    dataType:'json',
                    success: function(data){
                      // console.log(data)
                      var baris='';
                      for(var i=0;i<data.length;i++){
                        baris += '<tr>'+
                        '<td>'+ data[i].id +' </td>'+
                        '<td>'+ data[i].nama +'  </td>'+
                        '<td>'+ data[i].kelompok +'  </td>'+
                        '<td>'+ data[i].latitude +'  </td>'+
                        '<td>'+ data[i].longtitude +'  </td>'+
                        '<td>'+ data[i].lokasi +'  </td>'+

                        '<td>'+ data[i].luas_area +'  </td>'+
                        '<td>'+ data[i].nomordsi +'  </td>'+
                        '<td>'+ data[i].penanggung_jawab +'  </td>'+
                        '<td>'+ data[i].jml_sdm +'  </td>'+
                        '<td>'+ data[i].wktjagaopl +'  </td>'+
                        '<td>'+ data[i].perangkat +'  </td>'+
                        '<td>'+ data[i].lampu +'  </td>'+
                        '<td>'+ data[i].solar_cell +'  </td>'+
                        '<td>'+ data[i].battery +'  </td>'+
                        '</tr>'
                      }
                      $('#target').html(baris);
                    }
                  });
                }
                </script> -->

                <?php
                  foreach ($data as $r){ ?>
                <tr>
                  <td><?= $r->id; ?></td>
                  <td><?= $r->nama; ?></td>
                  <td><?= $r->kelompok; ?></td>
                  <td><?= $r->latitude; ?></td>
                  <td><?= $r->longtitude; ?></td>
                  <td><?= $r->lokasi; ?></td>
                  <td><?= $r->luas_area; ?></td>
                  <td><?= $r->nomordsi; ?></td>
                  <td><?= $r->penanggung_jawab; ?></td>
                  <td> <a href="#form" data-toggle="modal" class="btn btn-primary" onclick="submit('$r->id')">Edit</a>
                       <a href="#form" data-toggle="modal" class="btn btn-danger">Delete</a>
                  </td>
                  <td><?= $r->jml_sdm; ?></td>
                  <td><?= $r->wktjagaopl; ?></td>
                  <td><?= $r->perangkat; ?></td>
                  <td><?= $r->lampu; ?></td>
                  <td><?= $r->solar_cell; ?></td>
                  <td><?= $r->battery; ?></td>
                </tr>
              <?php } ?>

              </tbody>
            </table>


            <div class="modal fade" id="form" role="dialog">
              <div class="modal-dialog">


                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title">Input data baru</h4>
                  </div>
                  <center><font color="red"><p id="pesan"></p> </center> </font>
                  <div class="modal-body">

                    <table>
                    <form>
                      <div class="form-group">
                        <input type="text" name="nama" placeholder="Nama" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="kelompok" placeholder="Kelompok" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="latitude" placeholder="Latitude" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="longtitude" placeholder="Longtitude" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="lokasi" placeholder="Lokasi" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="luasarea" placeholder="Luasarea" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="nomordsi" placeholder="Nomor DSI" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="penanggungjwb" placeholder="Penanggung Jawab" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="jmlsdm" placeholder="Jumlah SDM" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="wktjagaopl" placeholder="Waktu Jaga Operasional" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="perangkat" placeholder="Perangkat yang terpasang" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="lampu" placeholder="Lampu" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="solarcell" placeholder="Solarcell" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="text" name="battery" placeholder="Battery" class="form-control">
                      </div>

                    </form>
                  </table>

                  </div>
                  <div class="modal-footer">
                    <!-- <button type="modal-reset" class="btn waves-effect waves-light btn-outline-secondary">Reset</button> -->
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger waves-effect waves-light" onclick="tambahdata()" id="btn-tambah">Tambah</button>
                  </div>


                  <script type="text/javascript">


                    function tambahdata(){
                      var nama=$("[name='nama']").val();
                      var kelompok=$("[name='kelompok']").val();
                      var latitude=$("[name='latitude']").val();
                      var longtitude=$("[name='longtitude']").val();
                      var lokasi=$("[name='lokasi']").val();
                      var luas_area=$("[name='luasarea']").val();
                      var nomordsi=$("[name='nomordsi']").val();
                      var penanggung_jawab=$("[name='penanggungjwb']").val();
                      var jml_sdm=$("[name='jmlsdm']").val();
                      var wktjagaopl=$("[name='wktjagaopl']").val();
                      var perangkat=$("[name='perangkat']").val();
                      var lampu=$("[name='lampu']").val();
                      var solar_cell=$("[name='solarcell']").val();
                      var battery=$("[name='battery']").val();

                      $.ajax({
                        type:'POST',
                        data: 'nama='+nama+'&kelompok='+kelompok+'&latitude='+latitude+'&longtitude='+longtitude+'&lokasi='+lokasi+'&luas_area='+luas_area+'&nomordsi='+nomordsi+'&penanggung_jawab='+penanggung_jawab+'&jml_sdm='+jml_sdm+'&wktjagaopl='+wktjagaopl+'&perangkat='+perangkat+'&lampu='+lampu+'&solar_cell='+solar_cell+'&battery='+battery,
                        url: '<?php echo base_url().'adminmenu/tambahdata' ?>',
                        dataType: 'json',
                        success: function(hasil){
                          // console.log(hasil);
                          $("#pesan").html(hasil.pesan);

                          if (hasil.pesan=='') {
                            $("#form").modal('hide');
                            location.reload();
                          }
                        }
                      });
                    }




                  </script>






                </div>


              </div>

             </div> <!-- end modal -->

          </div>
          </div>

          </div>
        </div>
      </div>
    </div>



  </div>
</div>
