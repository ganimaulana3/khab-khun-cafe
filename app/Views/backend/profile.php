<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>

<div style="position:relative;bottom:80vh;" class="app-content content">
	<div class="content-wrapper">
		<div class="content-body">
            <div class="card box-shadow-2">
            <!--START-->

            <?php if (session()->getFlashdata('alert') == 'update_foto'): ?>
                <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Foto berhasil diupdate
                </div>
            <?php elseif (session()->getFlashdata('alert') == 'update'): ?>
                <div style="position:absolute;width:100%;" class="alert alert-success alert-dismissible animated fadeInDown" id="feedback" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    Data berhasil diupdate
                </div>
            <?php endif; ?>
        
            <div class="card-header">
				<h1 style="text-align: center">Profile</h1>
			</div>
			<hr>


            <div class="row">
                <div class="col-12 col-md-4">
                    <div class="card">
                        <form action="<?= base_url('admin/changeFoto')?>" method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <h4 class="card-title">Foto Profil</h4>
                            </div>
                            <div class="card-body text-center">
                                <img src="<?= base_url('img_karyawan/' . $_SESSION['foto']) ?>" alt="Foto Profil" class="d-fluid w-75">
                            </div>
                            <div class="card-footer">
                                <div class="custom-file mb-3">
                                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
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
                        <form action="<?= base_url('admin/updateAkun')?>" method="post">
                            <div class="card-body py-0 my-3">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="nik">NIk : </label>
                                            <input type="hidden" name="id_user" value="">
                                            <input type="text" name="nik" id="nik" value="<?= $_SESSION['nik']?>" class="form-control" disabled required="reuqired" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="nama">Nama Lengkap : </label>
                                            <input type="text" name="nama" id="nama" value="<?= $_SESSION['nama_lengkap']?>" class="form-control" placeholder="Masukana Nama Lengkap Karyawan" disabled required="reuqired" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="telp">No. Telp : </label>
                                            <input type="tel" name="telp" id="telp" value="<?= $_SESSION['telp']?>" class="form-control" placeholder="Masukan No. Telp" disabled required="reuqired" />
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="email">E-mail : </label>
                                            <input type="email" name="email" id="email" value="<?= $_SESSION['email']?>" class="form-control" placeholder="Masukan Email" disabled required="reuqired" />
                                        </div>
                                    </div>
                                    
                                        <div class="col-xs-12 col-sm-12 col-md-4">
                                            <div class="form-group">
                                                <label for="divisi">Divisi : </label>
                                                <input class="form-control" type="text" name="" value="<?= $_SESSION['level']?>" disabled>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                            <div class="card-body border-top py-0 my-3">
                                <h4 class="text-muted my-3">Akun</h4>
                                <div class="row">
                                    <input type="hidden" name="id" value="<?= $_SESSION['id'] ?>">
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" name="username" id="username" value="<?= $_SESSION['username']?>" class="form-control" placeholder="Masukan Username" required="reuqired" />
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
                    </div>
                </div>
            </div>
        

            </div>
        </div>
    </div>
</div>
    
</body>
</html>