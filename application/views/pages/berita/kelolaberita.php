<div class="page-wrapper">
	<div class="container-fluid">

		<div class="row page-titles">
			<div class="col-lg-12 align-self-center">
				<h3 class="text-themecolor">Berita</h3>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
					<li class="breadcrumb-item active">Berita</li>
					<li class="breadcrumb-item active">Kelola Berita</li>
				</ol>
			</div>
		</div>

		<div class="row">
			<!-- Column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<div class="row">
							<div class="col-lg-12">
								<?php if ($this->session->flashdata('success')): ?>
                                    <div class="alert alert-icon alert-success border-success alert-dismissible fade show" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                        </button>Data Berhasil Dihapus
                                    </div>
                                <?php endif; ?>
								<table id="example2" class="table table-striped table-bordered" style="width:100%">
									<thead>
										<tr>
											<th>ID Berita</th>
											<th>Judul Berita</th>
											<!-- <th>Isi Berita</th> -->
											<th>Gambar Berita</th>
											<th style="width: 150px;">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php

										foreach ($data->result_array() as $i) :
											$id=$i['berita_id'];
											$judul=$i['berita_judul'];
											// $isi=$i['berita_isi'];
											$image=$i['berita_image'];
										?>

											<tr>
												<td><?php echo $id;?> </td>
												<td><?php echo $judul;?> </td>
												<!-- <td><?php echo $isi;?> </td> -->
												<td width="400px"><img src="<?php echo base_url('assets/images/Upload/'.$image) ?>" class="img-fluid img-thumbnail col-sm-5"></td>
												<td><a class="btn btn-xs btn-info" href="<?php echo base_url('adminmenu/updateberita/'.$id) ?>"> Edit</a>
													<a class="btn btn-xs btn-info" href="<?php echo base_url('adminmenu/hapusberita/'.$id) ?>" onclick="return confirm('Data Akan Dihapus');">Hapus</a>
												</td>
											</tr>
										<?php endforeach;?>
									</tbody>
								<!-- 	<tfoot>
										<tr>
											<th>ID Berita</th>
											<th>Judul Berita</th>
											<th>Isi Berita</th>
											<th>Gambar Berita</th>
											<th>Action</th>
										</tr>
									</tfoot> -->
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
<form>
