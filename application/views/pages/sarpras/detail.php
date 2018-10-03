<?php
$id = $_GET['id'];
$data = file_get_contents('http://localhost/disnavv/Adminmenu/getdata_id');
$obj = json_decode($data);
$titles="";
$ids="";
$kat="";
$hp="";
$alamat="";
$kota="";
$prov="";
$lat="";
$long="";
foreach($obj->results as $item){
  $titles.=$item->nama_service;
  $ids.=$item->id_service;
  $kat.=$item->kategori;
  $hp.=$item->no_hp;
  $alamat.=$item->alamat;
  $kota.=$item->kota;
  $prov.=$item->provinsi;
  $lat.=$item->latitude;
  $long.=$item->longitude;
}

$title = "Detail dan Lokasi : ".$titles;
 ?>

<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key="></script>

<script>

function initialize() {
  var myLatlng = new google.maps.LatLng(<?php echo $lat ?>,<?php echo $long ?>);
  var mapOptions = {
    zoom: 10,
    center: myLatlng
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

  var contentString = '<div id="content">'+
      '<div id="siteNotice">'+
      '</div>'+
      '<h1 id="firstHeading" class="firstHeading"><?php echo $titles ?></h1>'+
      '<div id="bodyContent">'+
      '<p><?php echo $alamat ?></p>'+
      '</div>'+
      '</div>';

  var infowindow = new google.maps.InfoWindow({
      content: contentString
  });

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Maps Info',
      icon:'img/marker.png'
  });
  google.maps.event.addListener(marker, 'click', function() {
    infowindow.open(map,marker);
  });
}

google.maps.event.addDomListener(window, 'load', initialize);

    </script>
      <div class="row">
      <div class="col-md-5">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Lokasi - </strong></h4>
            </div>
            <div class="panel-body">
              <div id="map-canvas" style="width:100%;height:380px;"></div>
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="panel panel-info panel-dashboard">
            <div class="panel-heading centered">
              <h2 class="panel-title"><strong> - Detail - </strong></h4>
            </div>
            <div class="panel-body">
             <table class="table">
               <tr>
                 <th>Item</th>
                 <th>Detail</th>
               </tr>
               <tr>
                 <td>Nama Service Center</td>
                 <td><h4><?php echo $titles ?></h4></td>
               </tr>
               <tr>
                 <td>Kota</td>
                 <td><h4><?php echo $kota ?></h4></td>
               </tr>
               <tr>
                 <td>Provinsi</td>
                 <td><h4><?php echo $prov ?></h4></td>
               </tr>
               <tr>
                 <td>Alamat</td>
                 <td><h4><?php echo $alamat ?></h4></td>
               </tr>
               <tr>
                 <td>No HP</td>
                 <td><h4><?php echo $hp ?></h4></td>
               </tr>
               <tr>
               </tr>
             </table>
            </div>
            </div>
          </div>


        </div>
      </div>
    </div>
