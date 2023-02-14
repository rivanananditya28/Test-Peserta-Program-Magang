                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">DataTables Siswa
                            <a href="<?php echo base_url('Home/tambah_data')?>" class="btn btn-primary btn-sm float-right">Tambah Data</a></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <td align="center">No</td>
                                            <td align="center">Nama</td>
                                            <td align="center">NISN</td>
                                            <td align="center">Tempat Lahir</td>
                                            <td align="center">Tanggal Lahir</td>
                                            <td align="center">Foto</td>
                                            <td align="center" colspan="2">Setting</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($siswa as $sis) : ?>
                                            <tr>
                                                <td align="center"><?php echo $no++; ?></td>
                                                <td><?php echo $sis['nama']; ?></td>
                                                <td><?php echo $sis['nisn']; ?></td>
                                                <td><?php echo $sis['tempat_lahir']; ?></td>
                                                <td><?php echo $sis['tanggal_lahir']; ?></td>
                                                <td><?php echo $sis['foto']; ?></td>
                                                <td align="center">
                                                    <a href="<?php echo base_url() ?>Home/edit_data/<?php echo $sis['id'];?>" class="badge badge-primary">Edit</a>
                                                    <a href="<?php echo base_url() ?>Home/hapus_data/<?php echo $sis['id'];?>" class="badge badge-danger">Hapus</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.container-fluid -->
                        </div>
                    </div>
                </div>
                <!-- End of Main Content -->