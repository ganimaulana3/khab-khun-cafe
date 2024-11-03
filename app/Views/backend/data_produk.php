

<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
        <div class="card box-shadow-2">
        <!--START-->
        
        <div class="row">
	<div class="col-md-12">
		<div class="card box-shadow-2">

		<?php if(session()->getFlashdata('error')): ?>
			<div class="alert alert-danger">
				<?= session()->getFlashdata('error') ?>
			</div>
		<?php endif; ?>


		<?php if (session()->getFlashdata('alert') == 'tambah_produk'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil ditambahkan
        </div>
    <?php elseif (session()->getFlashdata('alert') == 'update_produk'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil diupdate
        </div>
	<?php elseif (session()->getFlashdata('alert') == 'update_img'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Gambar berhasil diupdate
        </div>
    <?php elseif (session()->getFlashdata('alert') == 'hapus_produk'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil dihapus
        </div>
    <?php endif; ?>

			
			<div class="card-header">
				<h1 style="text-align: center">Data Produk</h1>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
						data-toggle="modal" data-target="#bootstrap">
					<i class="ft-plus-circle"></i> Tambah data produk
				</button>
			</div>
			<hr>
			<div class="card-body">
				
				<table style="width:100%;" class="table table-responsive table-bordered zero-configuration">
					<thead>

					<tr>
              				<th>NO</th>
							<th>Kode Produk</th>
							<th>Nama Produk</th>
							<th>Kategori</th>
							<th>Harga</th>
							<th>Gambar Produk</th>
							<th>Deskripsi</th>
                            <th style="text-align:center;"><i class="ft-settings spinner"></i></th>
					</tr>
					</thead>
					<tbody>
					
					<?php $no=1; foreach($produk as $value){?>

						<tr>
							<td><?= $no;?></td>
							<td><?= $value['kd_produk']?></td>
							<td><div title="" style="width:100px;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;"><?= $value['nm_produk']?></div></td>
							<td><?= $value['kategori']?></td>
							<td>Rp.<?= number_format(floatval($value['harga']), 2, ',', '.'); ?></td>
							<td style="text-align: center;">
								<a
									data-toggle="modal" data-target="#ubahgambar<?= $value['kd_produk']?>" value=""
									title="Ubah gambar produk">
								
									<img src="<?= base_url('img_produk/' . $value['img_produk']) ?>" width="30px" height="30px">
								</a>
							</td>
							<td>
							<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2"
									data-toggle="modal" data-target="#desc<?= $value['kd_produk']?>" value=""
									title="Lihat selengkapnya"><i class="ft-eye"></i></button>	
							</td>
							<td class="modal-footer">
								
								<button
									class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"
									data-toggle="modal" data-target="#ubah<?= $value['kd_produk']?>" value=""
									title="Update data produk"><i class="ft-edit"></i></button>
								<button
									class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 produk-hapus"
									data-toggle="modal" data-target="#hapus<?= $value['kd_produk']?>" value=""
									title="Hapus data"><i class="ft-trash"></i></button>

									<!-- <a href="" class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2" onClick="return confirm('Anda yakin akan menghapus data ini?')"><i class="ft-trash"></i></a> -->
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
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Produk</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/tambah_produk')?>" enctype="multipart/form-data">
                        <div class="modal-body">
                          <div class="form-group">
                            <label>Nama Produk</label>
                            <input type="text" class="form-control" name="nm_produk">
                          </div>
						 
                          <div class="form-group">
                            <label>Deskripsi</label>
							              <textarea class="form-control" rows="3" name="desc_produk"></textarea>
                          </div>
                          
                          <div class="form-group">
                            <label>Kategori </label>
							<select class="form-control" name="kategori">
                             <option value="">-- Pilih kategori --</option>
                             <option value="Minuman">Minuman</option>
							 <option value="Makanan">Makanan</option>
                             </select>
                          </div>
						  
                          <div class="form-group">
                            <label>Harga</label>
                            <input type="number" class="form-control" name="harga">
                          </div>
						  <div class="form-group">
                            <label>Gambar Produk</label>
                            <input type="file" class="form-control" name="photo">
                          </div>
                        </div>
                        <div class="modal-footer">
                          <input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal" value="Tutup">
                          <input type="submit" name="add" class="btn btn-primary btn-bg-gradient-x-blue-cyan" value="Simpan">
                        </div>
                      </form>
					  
		</div>
	</div>
</div>


<?php foreach($produk as $data){?>

<!-- Modal update -->
<div class="modal fade text-left" id="ubah<?= $data['kd_produk']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Produk</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/edit_produk')?>" enctype="multipart/form-data">
                      <div class="modal-body">
                         <input name="id" value="<?= $data['kd_produk']?>" hidden />
                        <div class="form-group">
                         <label>Nama Produk</label>
                            <input class="form-control" name="nm_produk" value="<?= $data['nm_produk']?>" />
                        </div>
						
                        <div class="form-group">
                          <label>Kategori</label>
						  <select class="form-control col-4" name="kategori">
						  	<?php if($data['kategori']=="Makanan"){?>
                             <option value="Makanan">Makanan</option>
							 <option value="Minuman">Minuman</option>
							 <?php }else if($data['kategori']=="Minuman"){?>
								<option value="Minuman">Minuman</option>
								<option value="Makanan">Makanan</option>
								<?php }?>
                            </select>
                        </div>
                           
                           <div class="form-group">
                          <label>Harga</label>
                              <input class="form-control" type="number" name="harga" value="<?= $data['harga']?>" required=""/>
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

<div class="modal fade text-left" id="ubahgambar<?= $data['kd_produk']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Gambar Produk</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/edit_img')?>" enctype="multipart/form-data">
                      <div class="modal-body">
                         <input name="id" value="<?= $data['kd_produk']?>" hidden />
                           <div class="form-group">
                          	  <label>Ubah Gambar</label>
                              <input class="form-control" type="file" name="photo" value="" />
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

<div class="modal fade text-left" id="desc<?= $data['kd_produk']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Deskripsi Produk</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/edit_desc')?>" enctype="multipart/form-data">
                      <div class="modal-body">
                         <input name="id" value="<?= $data['kd_produk']?>" hidden />

						  <div class="form-group">
                            <label>Deskripsi Produk</label>
							<textarea class="form-control" rows="10" name="desc_produk"><?= $data['deskripsi']?></textarea>
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
<div class="modal fade text-left" id="hapus<?= $data['kd_produk']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<input name="id" value="<?= $data['kd_produk']?>"  hidden />
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Produk ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="">
					<a href="<?= base_url('admin/hapus_produk/'.$data['kd_produk']);?>" class="btn btn-danger btn-bg-gradient-x-red-pink">Hapus</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }?>

        <!--END-->
            </div>
        </div>
    </div>
</div>

