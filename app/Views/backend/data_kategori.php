<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    
<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body"><!-- Revenue, Hit Rate & Deals -->
        <!--START-->
        
		<div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">

		<?php if (session()->getFlashdata('alert') == 'tambah_kategori'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil ditambahkan
        </div>
    <?php elseif (session()->getFlashdata('alert') == 'update_kategori'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil diupdate
        </div>
    <?php elseif (session()->getFlashdata('alert') == 'hapus_kategori'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil dihapus
        </div>
    <?php endif; ?>


			<div class="card-header">
				<h1 style="text-align: center">Data Kategori</h1>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
						data-toggle="modal" data-target="#bootstrap">
					<i class="ft-plus-circle"></i> Tambah data kategori
				</button>
			</div>
			<hr>
			<div class="card-body">
				<table style="width:100%" class="table table-bordered zero-configuration">
					<thead>
					<tr>
						<th width="30">NO</th>
						<th>Nama Kategori</th>
						<th>Gambar</th>
						<th width="100" style="text-align: center"><i class="ft-settings spinner"></i></th>
					</tr>
					</thead>

					<tbody>
					<?php $no=1; foreach($kategori as $value){?>
					
						<tr>
							<td><?= $no; ?></td>
							<td><?= $value['nm_kategori'];?></td>
							<td><img src="<?= base_url('img_kategori/' . $value['img_kategori'])?>" width="30px" height="30px"></td>
							<td>
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"
									data-toggle="modal" data-target="#ubah" value=""
									title="Update data kategori"><i class="ft-edit"></i></button>

								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 produk-hapus"
									data-toggle="modal" data-target="#hapus" value=""
									title="Hapus data"><i class="ft-trash"></i></button>

									<!-- <a href="hapus_kategori.php?id=" class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="ft-trash"></i></a></td> -->

							</td>

						</tr>
						<?php $no++;}?>
					</tbody>

				</table>
			</div>
		</div>
	</div>
</div>

<!-- Modal tambah -->
<div class="modal fade text-left" id="bootstrap" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Kategori</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/tambah_kategori')?>" enctype="multipart/form-data">
                        <div class="modal-body">
                          
                          <div class="form-group">
                            <label>Nama Kategori </label>
                            <input type="text" class="form-control" name="nm_kategori">
                          </div>
						  <div class="form-group">
                            <label>Gambar Kategori</label>
                            <input type="file" class="form-control" name="img_kategori">
                          </div>
						  
                          </div>
						  <div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" value="Simpan">
			</div>
                      </form>
			
		</div>
	</div>
</div>



<!-- Modal update -->
<div class="modal fade text-left" id="ubah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Kategori</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="" enctype="multipart/form-data">
                      <div class="modal-body">
                        <input name="id" value=""  hidden />

                        <div class="form-group">
                            <label>Nama Kategori </label>
                            <input type="text" class="form-control" name="nm_kategori" value="">
                          </div>
						  <div class="form-group">
                            <label>Gambar Kategori</label>
                            <input class="form-control" type="file" name="pic" value="">
                          </div>

                        </div>  
						<div class="modal-footer">
							<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
							<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" value="Update">
					</div>
                      </div>
					  
			
                    </form>
			
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade text-left" id="hapus" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<input name="id" value=""  hidden />
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Kategori ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="">
					<a href="" class="btn btn-danger btn-bg-gradient-x-red-pink">Hapus</a>
				</div>
			</div>
			
		</div>
	</div>
</div>




        <!--END-->
        </div>
    </div>
</div>

</body>
</html>
