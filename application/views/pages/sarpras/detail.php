<?php
// $id = $_GET['id'];
// $obj = json_decode($data);
// $nama="";
// $kelompok="";
// $latitude="";
// $longtitude="";
// $lokasi="";
// $luas_area="";
// $nomordsi="";
// $penanggung_jawab="";
// $jml_sdm="";
// $wktjagaopl="";
// $perangkat="";
// $lampu="";
// $solar_cell="";
// $battery="";
// foreach($obj->results as $item){
//   $nama.=$item->nama;
//   $kelompok.=$item->kelompok;
//   $latitude.=$item->latitude;
//   $longtitude.=$item->longtitude;
//   $lokasi.=$item->lokasi;
//   $luas_area.=$item->luas_area;
//   $nomordsi.=$item->nomordsi;
//   $penanggung_jawab.=$item->penanggung_jawab;
//   $jml_sdm.=$item->jml_sdm;
//   $wktjagaopl.=$item->wktjagaopl;
//   $perangkat.=$item->perangkat;
//   $lampu.=$item->lampu;
//   $solar_cell.=$item->solar_cell;
//   $battery.=$item->battery;
// }
 ?>







<div class="page-wrapper">
  <div class="container-fluid">



    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Peta Kenavigasian</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Peta Kenavigasian</li>
        </ol>
      </div>
    </div>



    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

              <h4 class="card-title text-center">DETAIL</h4>
            <div id="map" style="width:100%;height:380px;"></div>

            <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script>   API V3 -->
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key="></script>  <!-- API V2 -->

            <!-- AARTsJoe7L_kJ1kK-_nCE_l4PN3rHDHNNg&amp  API KEY-->
            <script type="text/javascript">
            function initialize() {
              var myLatlng = new google.maps.LatLng(<?php echo $datas->latitude ?>, <?php echo $datas->longtitude ?>);
              var mapOptions = {
                zoom: 17,
                center: myLatlng  //zoom 17
                // disableDefaultUI: true
              };

              var mapElement = document.getElementById('map');

              var map = new google.maps.Map(mapElement, mapOptions);

              var officeLocations = [
                <?php
                $data = file_get_contents(site_url('adminmenu/wheredata/'.$datas->id));
                $no=1;
                if(json_decode($data,true)){
                  $obj = json_decode($data);
                  foreach($obj->results as $item){
                    ?>
                    [<?php echo $item->id ?>,'<?php echo $item->nama ?>','<?php echo $item->kelompok ?>',<?php echo $item->latitude ?>,<?php echo $item->longtitude ?>],
                    <?php
                  }
                }
                ?>
              ];
              setMarkers(map, officeLocations);
            }

            function setMarkers(map, locations)
            {
              // var globalPin = '<?php //echo base_url('assets/images/marker.png') ?>';

              for (var i = 0; i < locations.length; i++) {

                var office = locations[i];
                var myLatLng = new google.maps.LatLng(office[3], office[4]);
                var infowindow = new google.maps.InfoWindow({content: contentString});

                var contentString =
                '<div id="content">'+
                '<div id="siteNotice">'+
                '</div>'+
                '<h3 id="firstHeading" align="center">'+ office[1] + '</h3>'+
                // '<h6 id="firstHeading"> Kelompok : '+ office[2] + '</h6>'+
                // '<h6 id="firstHeading"> Koordinat : '+ office[3] + ' , '+ office[4] + '</h6>'+
                // '<h6 id="firstHeading"> Penanggung Jawab : '+ office[5] + ' </h6>'+
                '<div id="bodyContent" align="center">'+
                '</div>'+
                '</div>';

                var marker = new google.maps.Marker({
                  position: myLatLng,
                  map: map,
                  title: office[1],
                  // icon:'<?php //echo base_url('assets/images/marker.png') ?>'
                });

                google.maps.event.addListener(marker, 'click', getInfoCallback(map, contentString));
              }
            }

            function getInfoCallback(map, content) {
              var infowindow = new google.maps.InfoWindow({content: content});
              return function() {
                infowindow.setContent(content);
                infowindow.open(map, this);
              };
            }

            initialize();
          </script>






        </div>
      </div>
    </div>
  </div>



  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <h2 class="card-title text-center">INFO DETAIL </h2>
        <!-- <h6 class="card-subtitle">Create responsive tables by wrapping any <code>.table</code> in <code>.table-responsive </code></h6> -->
        <div class="table-responsive">
          <table class="table">
            <tbody><tr>
              <th><h2>Item</h2></th>
              <th><h2>Detail</h2></th>
            </tr>
            <tr>
              <td>Nama</td>
              <td><h5><?php echo $datas->nama ?></h5></td>
            </tr>
            <tr>
              <td>Kelompok</td>
              <td><h5><?php echo $datas->kelompok ?></h5></td>
            </tr>
            <tr>
              <td>Latitude</td>
              <td><h5><?php echo $datas->latitude ?></h5></td>
            </tr>
            <tr>
              <td>Longtitude</td>
              <td><h5><?php echo $datas->longtitude ?></h5></td>
            </tr>
            <tr>
              <td>Lokasi Luas Area</td>
              <td><h5><?php echo $datas->luas_area ?></h5></td>
            </tr>
            <tr>
              <td>Nomor DSI</td>
              <td><h5><?php echo $datas->nomordsi ?></h5></td>
            </tr>
            <tr>
              <td>Penanggung Jawab</td>
              <td><h5><?php echo $datas->penanggung_jawab ?></h5></td>
            </tr>
            <tr>
              <td>Jumlah SDM</td>
              <td><h5><?php echo $datas->jml_sdm ?></h5></td>
            </tr>
            <tr>
              <td>Waktu Jaga Operasional</td>
              <td><h5><?php echo $datas->wktjagaopl ?></h5></td>
            </tr>
            <tr>
              <td>Perangkat Yang Terpaang</td>
              <td><h5><?php echo $datas->perangkat ?></h5></td>
            </tr>
            <tr>
              <td>Lampu</td>
              <td><h5><?php echo $datas->lampu ?></h5></td>
            </tr>
            <tr>
              <td>Solar Cell</td>
              <td><h5><?php echo $datas->solar_cell ?></h5></td>
            </tr>
            <tr>
              <td>Battery</td>
              <td><h5><?php echo $datas->battery ?></h5></td>
            </tr>
            <tr>
            </tr>
          </tbody></table>
        </div>
      </div>
    </div>
  </div>





</div>
</div>
