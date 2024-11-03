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

		<?php if (session()->getFlashdata('alert') == 'tambah_akses'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil ditambahkan
        </div>
    <?php elseif (session()->getFlashdata('alert') == 'update_akses'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil diupdate
        </div>
    <?php elseif (session()->getFlashdata('alert') == 'hapus_akses'): ?>
        <div style="position:absolute;width:100%;" class="alert alert-danger alert-dismissible animated fadeInDown" id="feedback" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            Data berhasil dihapus
        </div>
    <?php endif; ?>


			<div class="card-header">
				<h1 style="text-align: center">Data Karyawan</h1>
				<button type="button" class="btn btn-primary btn-bg-gradient-x-purple-blue box-shadow-2"
						data-toggle="modal" data-target="#bootstrap">
					<i class="ft-plus-circle"></i> Tambah data Karyawan
				</button>
			</div>
			<hr>
			<div class="card-body">
				<table style="width:100%" class="table table-responsive table-bordered zero-configuration">
					<thead>
					<tr>
						<th>NO</th>
						<th>Foto</th>
						<th>NIK</th>
						<th>Nama Lengkap</th>
						<!-- <th>No Telp</th>
						<th>Email</th>
						<th>USERNAME</th> -->
						<!-- <th>PASSWORD</th> -->
						<th>Level</th>
						<th>Details</th>
						<th style="text-align: center"><i class="ft-settings spinner"></i></th>
					</tr>
					</thead>

					<tbody>
						<?php $no=1; foreach($akses as $value){?>

						<tr>
							<td><?= $no;?></td>
							<td><img src="<?= base_url('img_karyawan/' . $value['foto']) ?>" width="30px" height="30px"></td>
							<td><?= $value['nik']?></td>
							<td><?= $value['nama_lengkap']?></td>
							<!-- <td><?= $value['telp']?></td>
							<td><?= $value['email']?></td>
							<td><?= $value['username']?></td> -->
							<!-- <td><?= $value['password']?></td> -->
							<td><?= $value['level']?></td>
							<td>
							<a href="<?= base_url('admin/details_karyawan/' . $value['id_akses']);?>" title="lihat detail" class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2"><i class="ft-eye"></i></a>
							
							</td>
								<td>

								<?php if($value['id_akses']==1){?>
								
									<button
										class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"
										data-toggle="modal" data-target="#ubah<?=$value['id_akses']?>" value=""
										title="Update data akses"><i class="ft-edit"></i></button>									
								
								<?php }else{?>

								<button
										class="btn btn-success btn-sm  btn-bg-gradient-x-blue-green box-shadow-2"
										data-toggle="modal" data-target="#ubah<?=$value['id_akses']?>" value=""
										title="Update data akses"><i class="ft-edit"></i></button>

									<button
										class="btn btn-danger btn-sm  btn-bg-gradient-x-red-pink box-shadow-2 produk-hapus"
										data-toggle="modal" data-target="#hapus<?= $value['id_akses']?>" value=""
										title="Hapus data"><i class="ft-trash"></i></button>
									
										<?php }?>
									
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
				<h3 class="modal-title" id="myModalLabel35"> Tambah Data Karyawan</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/tambah_akses')?>" enctype="multipart/form-data">
                        <div class="modal-body">
                          
                          <div class="form-group">
                            <label>NIK/No KTP </label>
                            <input type="text" class="form-control" name="nik" placeholder="NIK/No KTP">
                          </div>
						  <div class="form-group">
                            <label>Nama Lengkap </label>
                            <input type="text" class="form-control" name="namaLengkap" placeholder="Nama Lengkap">
                          </div>
						  <div class="form-group">
                            <label>No Telp </label>
                            <input type="number" class="form-control" name="telp" placeholder="No Telp">
                          </div>
						  <div class="form-group">
                            <label>Email </label>
                            <input type="email" class="form-control" name="email" placeholder="Email">
                          </div>
						  <div class="form-group">
                            <label>USERNAME </label>
                            <input type="text" class="form-control" name="username" placeholder="Username">
                          </div>
                          <div class="form-group">
                            <label>PASSWORD</label>
                            <input type="text" class="form-control" name="password" placeholder="Password">
                          </div>
                          <div class="form-group">
						  <label>Level</label>
                          <select class="form-control col-5" name="level" >
						    <option value="owner">Owner</option>
                            <option value="karyawan">Karyawan</option>
                          </select>
                          </div>

						  <div class="form-group">
                            <label>Foto </label>
                            <input type="file" class="form-control" name="photo">
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

<?php foreach($akses as $data){?>

<!-- Modal update -->
<div class="modal fade text-left" id="ubah<?= $data['id_akses']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Update Data Akses</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="post" action="<?= base_url('admin/update_akses')?>" enctype="multipart/form-data">
                      <div class="modal-body">
                        <input name="id" value="<?= $data['id_akses']?>"  hidden />

						<div class="form-group">
                            <label>NIK/No KTP </label>
                            <input type="text" class="form-control" name="nik" value="<?= $data['nik']?>" required>
                          </div>
						  <div class="form-group">
                            <label>Nama Lengkap </label>
                            <input type="text" class="form-control" name="namaLengkap" value="<?= $data['nama_lengkap']?>" required>
                          </div>
						  <div class="form-group">
                            <label>No Telp </label>
                            <input type="number" class="form-control" name="telp" value="<?= $data['telp']?>" required>
                          </div>
						  <div class="form-group">
                            <label>Email </label>
                            <input type="email" class="form-control" name="email" value="<?= $data['email']?>" required>
                          </div>

                        <div class="form-group">
                          <label>USERNAME</label>
                            <input class="form-control" type="text" name="username" value="<?= $data['username']?>" required=""/>
                        </div>

                        <div class="form-group">
                          <label>PASSWORD</label>
                              <input class="form-control" type="text" name="password"/>
							  <span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
                        </div>						

						<select class="form-control col-5" name="level" >
						<?php if($data['level']=="owner"){?>
							<option value="owner">Owner</option>
							<option value="karyawan">Karyawan</option>
							  <?php }else if($data['level']=="karyawan"){?>
								<option value="karyawan">Karyawan</option>
								<option value="owner">Owner</option>
								<?php }?>
                          </select>
						
                        <div class="form-group">
                            <label>Foto </label>
                            <input type="file" class="form-control" name="photo">
							<span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
                          </div>

                        </div>
                         
						<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
					   value="Tutup">
				<input type="submit" class="btn btn-primary btn-bg-gradient-x-blue-cyan" value="Update">
			</div>
                      </div>
					  
			
                    </form>
			
		</div>
	</div>
</div>

<!-- Modal hapus -->
<div class="modal fade text-left" id="hapus<?= $data['id_akses']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
		<input name="id" value="<?= $data['id_akses']?>"  hidden />
			<div class="modal-header">
				<h3 class="modal-title" id="myModalLabel35"> Hapus Data Petugas ?</h3>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-footer">
				<input type="reset" class="btn btn-secondary btn-bg-gradient-x-blue-cyan" data-dismiss="modal" value="Tutup">
				<div id="">
					<a href="<?= base_url('admin/hapus/'.$data['id_akses']);?>" class="btn btn-danger btn-bg-gradient-x-red-pink">Hapus</a>
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

</body>
</html>
