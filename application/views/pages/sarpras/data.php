<div class="page-wrapper">
	<div class="container-fluid">

    <div class="row page-titles">
          <div class="col-md-5 col-8 align-self-center">
            <h3 class="text-themecolor">Sarana & Prasarana</h3>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
              <li class="breadcrumb-item active">Petakenavigasian</li>
              <li class="breadcrumb-item active">Data</li>
            </ol>
          </div>
        </div>

<div class="card">
  <div class="card-body">



      <div class="tab-pane active" id="home" role="tabpanel" aria-expanded="true">
        <div class="p-20">

          <div class="row">
            <div class="col-lg-12">
              <h2 class="card-title text-center">Data</h2>



              <table id="table3" class=" table table-bordered table-responsive nowrap table-hover" style="width: 100%;">
                <thead>
                  <tr>
                    <th class="all">ID</th>
                    <th class="all" style="width: 250px;">NAMA</th>
                    <th class="all">KELOMPOK</th>
                    <th class="all" style="width: 250px;">LATITUDE</th>
                    <th class="all" style="width: 250px;">LONGTITUDE</th>
                    <th class="all">LOKASI</th>
                    <th class="all">LUAS AREA</th>
                    <th class="">Nomor DSI :</th>
                    <th class="" style="width: 300px;">PENANGGUNG JAWAB :</th>
                    <th class="">JUMLAH SDM : </th>
                    <th class="">WAKTU JAGA OPERASIONAL : </th>
                    <th class="">PERANGKAT YANG TERPASANG : </th>
                    <th class="">LAMPU : </th>
                    <th class="">SOLAR CELL : </th>
                    <th class="">BATTERY : </th>
                  </tr>
                </thead>

                <tbody id="target">



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


                                <!-- ===== MODAL EDIT DATA ===== -->
          <!-- <?php
          // foreach($data->result_array() as $i):
          //     $dataid=$i['id'];
          //     $datanama=$i['nama'];
          //     $datakelompok=$i['kelompok'];
          //     $datalatitude=$i['latitude'];
          //     $datalongtitude=$i['longtitude'];
          //     $datalokasi=$i['lokasi'];
          //     $dataluas_area=$i['luas_area'];
          //     $datanomordsi=$i['nomordsi'];
          //     $datapenanggung_jawab=$i['penanggung_jawab'];
          //     $datajml_sdm=$i['jml_sdm'];
          //     $datawktjagaopl=$i['wktjagaopl'];
          //     $dataperangkat=$i['perangkat'];
          //     $datalampu=$i['lampu'];
          //     $datasolar_cell=$i['solar_cell'];
          //     $databattery=$i['battery'];
           ?>
           <div class="modal fade" id="modal_edit<?php //echo $dataid;?>" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
             <div class="modal-dialog">
               <div class="modal-content">
                 <div class="modal-header">
                   <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                   <h3 class="modal-title" id="myModalLabel">Edit Data</h3>
                 </div>

                 <form class="form-horizontal" method="post" action="<?php //echo base_url().'index.php/barang/edit_barang'?>">
                                 <div class="modal-body">

                                     <div class="form-group">
                                         <label class="control-label col-xs-3" >Kode Barang</label>
                                         <div class="col-xs-8">
                                             <input name="kode_barang" value="<?php //echo $barang_id;?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
                                         </div>
                                     </div>

                                     <div class="form-group">
                                         <label class="control-label col-xs-3" >Nama Barang</label>
                                         <div class="col-xs-8">
                                             <input name="nama_barang" value="<?php //echo $barang_nama;?>" class="form-control" type="text" placeholder="Nama Barang..." required>
                                         </div>
                                     </div>


               </div>
             </div>
           </div>
         <?php //endforeach;?> -->
             <!--END MODAL EDIT DATA-->



  </div>
</div> <!-- END DIV CLASS ROW -->


</div>
</div>




</div> <!-- END CARD BODY -->
</div> <!-- END CARD -->


</div>
</div>
