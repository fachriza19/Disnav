<div class="page-wrapper">
	<div class="container-fluid">
    <div class="row page-titles">
      <div class="col-md-5 col-8 align-self-center">
        <h3 class="text-themecolor">Dashboard</h3>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>


    <div class="row">
        <div class="col-lg-8 col-md">
          <?php
            function limit_words($string, $word_limit){
              $words = explode(" ",$string);
              return implode(" ",array_splice($words,0,$word_limit));
            }
            foreach ($data->result_array() as $i) :
              $id=$i['berita_id'];
              $judul=$i['berita_judul'];
              $image=$i['berita_image'];
              $isi=$i['berita_isi'];
          ?>
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <div itemprop="text" class="entry-content">
                        <h2><?php echo $judul;?></h2><hr/>
                        <img src="<?php echo base_url().'assets/images/Upload/'.$image;?>" class="img-fluid">
                        <?php echo limit_words($isi,30);?><br><a href="<?php echo base_url().'daftarberita/tampilanberita/'.$id;?>"> Selengkapnya...</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          <?php endforeach;?>
        </div>
        <div class="col-lg-4 col-md-5">
        <div class="card">
          <div class="card-body">
            <div class="col-12">
              <form class="form-inline" action="<?php echo base_url('adminmenu/cari')?>" action="GET">
                <div class="form-group">
                <input type="text" class="form-control" id="cari" name="cari" placeholder="cari">
                </div>
                <input class="btn btn-primary" type="submit" value="Cari">
              </form><br>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
