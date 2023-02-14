<div class="container-fluid">
    <h3>Halaman Tambah Data</h3>
    <hr><br>
    <form method="post" action="<?php echo base_url('Home/proses_tambah_data'); ?>">
        <div class="row mb-3">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nama">
            </div>
        </div>
        <div class="row mb-3">
            <label for="nisn" class="col-sm-2 col-form-label">NISN</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="nisn">
            </div>
        </div>
        <div class="row mb-3">
            <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="tempat_lahir">
            </div>
        </div>
        <div class="row mb-3">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
            <div class="col-sm-5">
                <input type="date" class="form-control" name="tanggal_lahir">
            </div>
        </div>
        <div class="row mb-3">
            <label for="foto" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-5">
                <input type="file" class="form-control" name="foto">
            </div>
        </div>
        <div class="row mb-3">
            <label for="tambah" class="col-sm-2 col-form-label"></label>
            <div class="col-sm-5">
                <button type="submit" class="btn btn-primary">Tambah</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </div>
    </form>
</div>