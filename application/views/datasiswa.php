
<div class="content-wrapper">
    <h4> <b>Staff</b> <small class="text-muted">/ Data</small>
    </h4>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                <p class="card-description">
                <a href="?page=staff&act=add" class="btn btn-info text-white pull-right"><i class="fa fa-plus"></i> Tambah</a> <br>
                </p>
                <h4 class="card-title">Data Staff</h4>
                    <div class="table-responsive">
                        <table class="table table-condensed table-striped table-hover" id="data">
                        <thead>
                        <tr>
                        <th>No.</th>
                        <th>Nama Staff</th>
						<th>Email</th>
						<th>Kontak</th>
						<th>Jabatan</th>
                        <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $no=1;
                        $sql = mysqli_query($con,"SELECT * FROM staff");
                        foreach ($sql as $d) { ?>
                        <tr>
                            <td width="50"><b><?=$no++; ?>.</b> </td>
							<td><?=$d['nama']?> </td>
							<td><?=$d['email']?> </td>
                            <td><?=$d['kontak']?> </td>
							<td><?=$d['jabatan']?> </td>
                            <td>
                                <a href="?page=staff&act=edit&id=<?=$d['id']?>" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit</a>
                                <a href="?page=staff&act=del&id=<?=$d['id']; ?>" onclick="return confirm('Yakin Hapus Data ?')" class="btn btn-dark btn-sm text-danger"><i class="fa fa-trash"></i> Hapus </a>
                            </td>
                        </tr>
                        <?php } ?>
                        </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>