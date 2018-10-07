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

              <h4 class="card-title text-center">Map</h4>
            <div id="map" style="width:100%;height:380px;"></div>

            <!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key="></script>   API V3 -->
            <script src="https://maps.googleapis.com/maps/api/js?libraries=places&key="></script>  <!-- API V2 -->

            <!-- AARTsJoe7L_kJ1kK-_nCE_l4PN3rHDHNNg&amp  API KEY-->




            <script type="text/javascript">
            function initialize() {

              var mapOptions = {
                zoom: 6,  //zoom 17
                center: new google.maps.LatLng(-6.1194908, 106.8624483),
                // disableDefaultUI: true
              };

              var mapElement = document.getElementById('map');

              var map = new google.maps.Map(mapElement, mapOptions);

              var officeLocations = [
                <?php
                $data = file_get_contents('http://localhost/Disnav/Adminmenu/getdata');
                $no=1;
                if(json_decode($data,true)){
                  $obj = json_decode($data);
                  foreach($obj->results as $item){
                    ?>
                    [<?php echo $item->id ?>,'<?php echo $item->nama ?>','<?php echo $item->kelompok ?>',<?php echo $item->latitude ?>,<?php echo $item->longtitude ?>,'<?php echo $item->penanggung_jawab ?>'],
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
                '<h6 id="firstHeading"> Kelompok : '+ office[2] + '</h6>'+
                '<h6 id="firstHeading"> Koordinat : '+ office[3] + ' , '+ office[4] + '</h6>'+
                '<h6 id="firstHeading"> Penanggung Jawab : '+ office[5] + ' </h6>'+
                '<div id="bodyContent" align="center">'+
                '<a href=<?php echo base_url('adminmenu/detailpeta/') ?>'+office[0]+'>Info Detail</a>'+
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



</div>
</div>
