
<style type="text/css">
	.tengah {
		text-align: center;
	}

	.kotak {
		border: 1px solid rgba(0, 0, 0, 0.1);
		padding: 5px;
	}

	@media print {
		body * {
			visibility: hidden;
		}

		.kotak, .kotak * {
			visibility: visible;
		}

		.kotak {
			position: absolute;
			width: 100%;
			margin-top: 300px;
			transform: scale(2);
			left: 0;
			top: 0;
		}
	}
</style>


<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
            <div class="card box-shadow-2">
            <!--START-->

            
        
            <div class="card-header">
				<h1 style="text-align: center">Profile</h1>
			</div>
            <div class="">
                                 <button style="margin-left: 20px;"
											class="btn btn-success btn-sm  btn-bg-gradient-x-purple-blue box-shadow-2"
											data-toggle="modal" data-target="#slip<?= $karyawan['id_akses']?>" value=""
											title="Cetak Data Karyawan"><i class="ft-printer"></i></button>
            </div>
			<hr>


            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <form action="<?= base_url('admin/changeFotoKaryawan')?>" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4 class="card-title">Foto Profil</h4>
                            </div>
                            <div class="card-body text-center">
                                
                                <img src="<?= base_url('img_karyawan/' . $karyawan['foto']) ?>" alt="Foto Profil" class="d-fluid w-75">
                              
                            </div>
                            <div class="card-footer">
                                <div class="custom-file mb-3">
                                    <input type="hidden" name="id" value="">
                                    <input type="file" name="photo" class="custom-file-input" id="input-foto" aria-describedby="input-foto" accept="image/*">
                                    <label class="custom-file-label" for="input-foto">Pilih Gambar</label>
                                </div>

                                <button type="submit" style="color:white" class="btn btn-bg-gradient-x-purple-blue btn-block mt-2">Simpan <i class="fa fa-save"></i></button>
                            </div>
                        </form>
                        
                    </div>
                </div>
                <div class="col-12 col-md-8">
                
                    <div class="card">
                        <form action="<?= base_url('admin/details_karyawan/' . $karyawan['id_akses'])?>">
                            <div class="card-body py-0 my-3">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="nik">NIk : </label>
                                            <input type="hidden" name="id_user" value="">
                                            <input type="text" name="nik" id="nik" value="<?= $karyawan['nik']?>" class="form-control" disabled required="reuqired" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap : </label>
                                            <input type="text" name="nama" id="nama" value="<?= $karyawan['nama_lengkap']?>" class="form-control" placeholder="Masukana Nama Lengkap Karyawan" disabled required="reuqired" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="telp">No. Telp : </label>
                                            <input type="tel" name="telp" id="telp" value="<?= $karyawan['telp']?>" class="form-control" placeholder="Masukan No. Telp" disabled required="reuqired" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">E-mail : </label>
                                            <input type="email" name="email" id="email" value="<?= $karyawan['email']?>" class="form-control" placeholder="Masukan Email" disabled required="reuqired" />
                                        </div>
                                    </div>
                                    
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="divisi">Sebagai : </label>
                                                <input class="form-control" type="text" name="" value="<?= $karyawan['level']?>" disabled>
                                            </div>
                                        </div>

                                        
                                    
                                </div>

                                

                            </div>
                            
                            <div class="card-body border-top py-0 my-3">
                                <h4 class="text-muted my-3">Akun</h4>
                                <div class="row">
                                    <input type="hidden" name="id" value="">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="Masukan Username" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" name="password" id="password" class="form-control" placeholder="********" />
                                            <span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row w-100">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                        <button type="submit" style="color: white;" class="btn btn-bg-gradient-x-purple-blue btn-block">Simpan <i class="fa fa-save"></i></button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>

                        

                        <div class="modal fade text-left" id="slip<?= $karyawan['id_akses']?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel35"
                        aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header d-print-none">
                                    <h3 class="modal-title" id="myModalLabel35"> Details Karyawan</h3>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body ">
                                    <div class="kotak d-print-block">
                                        <div class="row">
                                            <div class="col-6">
                                                <img style="text-align: center;" src="<?= base_url('img_karyawan/' . $karyawan['foto']) ?>" alt="Foto Profil" width="120" height="120">
                                            </div>
                                            <div class="col-12">
                                                <hr>
                                                <div class="tengah"><b><u>DATA KARYAWAN</u></b></div>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <table>
                                                    <tr>
                                                        <td>NIK</td>
                                                        <td>:</td>
                                                        <td><span class="slip-nama"> <?= $karyawan['nik']?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama</td>
                                                        <td>:</td>
                                                        <td><span id="slip-jabatan"> <?= $karyawan['nama_lengkap']?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>No Telp</td>
                                                        <td>:</td>
                                                        <td><span id="slip-nohp"> <?= $karyawan['telp']?></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-6">
                                                <table>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td>:</td>
                                                        <td><span class="slip-bulan"> <?= $karyawan['email']?></span></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Jabatan</td>
                                                        <td>:</td>
                                                        <td><span id="slip-hari"> <?= $karyawan['level']?></span></td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="col-6">
                                                <hr>
                                                <p>Bandung, <?= date_indo(date('Y-m-d')) ?></p>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="modal-footer d-print-none">
                                    <input type="reset" class="btn btn-secondary btn-bg-gradient-x-red-pink" data-dismiss="modal"
                                        value="Tutup">
                                    <button onclick="window.print()" class="btn btn-primary btn-bg-gradient-x-purple-blue"><i
                                            class="fa fa-print"></i> Cetak
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>


                    </div>
                </div>
            </div>

            
        

            </div>
        </div>
    </div>
</div>
