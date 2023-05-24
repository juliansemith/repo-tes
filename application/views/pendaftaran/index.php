<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lihat Data Pemeriksaan</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <?php if ($this->session->flashdata('flash')) : ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Data<strong> berhasil</strong> <?= $this->session->flashdata('flash'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>


        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <!-- <h3 class="card-title">Halaman Lihat Data Pemeriksaan</h3> -->
                <div class="btn-group float-left">
                    <button type="button" class="btn float-right btn-xs btn btn-primary" data-toggle="modal" data-target="#FormModal"><i class="fas fa-plus-circle mr-1"></i>Tambah Data Pemeriksaaan</button>
                </div>
                <div class="btn-group float-right">
                    <a href="<?= base_url('cetak'); ?>" name="print" class="btn float-right btn-xs btn btn-success mr-2 pl-2 pr-3"><i class="fas fa-print mr-1"></i>Print</a>
                </div>
            </div>
            <div class="card-body">
                <?php if (empty($pendaftaran)) : ?>
                    <div class="alert alert-danger" role="alert">
                        Data tidak ditemukan!
                    </div>
                <?php endif; ?>

                <div class="table-responsive">
                    <!-- Table -->
                    <table class="table table-bordered table-hover table-stripped">
                        <thead>
                            <tr>
                                <th style="width: 10px;">No</th>
                                <th>Nomor Registrasi</th>
                                <th>Nama Customer</th>
                                <th>Alamat Customer</th>
                                <th>Tanggal Registrasi</th>
                                <th>Operator Penerima</th>
                                <th>Parameter</th>
                                <th>QTY</th>
                                <th>Tarif</th>
                                <th>Jumlah</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($pendaftaran as $row) : ?>
                                <tr>
                                    <td><?= $no; ?></td>
                                    <td><?= $row['nomor_regis']; ?></td>
                                    <td><?= $row['nama_customer']; ?></td>
                                    <td><?= $row['alamat_customer']; ?></td>
                                    <td><?= $row['tgl_regis']; ?></td>
                                    <td><?= $row['operator_penerima']; ?></td>
                                    <td><?= $row['parameter']; ?></td>
                                    <td><?= $row['qty']; ?></td>
                                    <td><?= $row['tarif']; ?></td>
                                    <td><?= $row['jumlah']; ?></td>
                                    <td>
                                        <a href="<?= base_url('pendaftaran/edit/') ?><?= $row['nomor_regis'] ?>" class="badge badge-info">Edit</a>
                                        <a href="<?= base_url('pendaftaran/hapus/') ?><?= $row['nomor_regis'] ?>" class="badge badge-danger" onclick="return confirm('Hapus data?');">Hapus</a>
                                    </td>
                                </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- <div class="card-footer">
        
        </div> -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Modal -->
<div class="modal fade" id="FormModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title" id="JudulModal">Tambah Data Pemeriksaan Sampel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('pendaftaran/tambah_aksi') ?>" method="post">
                    <div class="form-group">
                        <label for="kode_admin">Nomor Regis</label>
                        <input type="text" class="form-control" id="nomor_regis" name="nomor_regis" placeholder="masukkan nomor regis.." required>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama Customer</label>
                        <input type="text " class="form-control" id="nama_customer" name="nama_customer" placeholder="masukkan nama customer.." required>
                    </div>

                    <div class="form-group">
                        <label for="username">Alamat Customer</label>
                        <input type="text" class="form-control" id="alamat_customer" name="alamat_customer" placeholder="masukkan alamat customer.." required>
                    </div>

                    <div class="form-group">
                        <label for="password">Tgl Regis</label>
                        <input type="date" class="form-control" id="tgl_regis" name="tgl_regis">
                    </div>

                    <div class="form-group">
                        <label for="password">Operator Penerima</label>
                        <input type="text" class="form-control" id="operator_penerima" name="operator_penerima" placeholder="masukkan operator.." required>
                    </div>
                    <div class="form-group">
                        <label for="password">Parameter</label>
                        <input type="text " class="form-control" id="parameter" name="parameter" placeholder="masukkan parameter.." required>
                    </div>
                    <div class="form-group">
                        <label for="tarif">Qty</label>
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="masukkan qty.." required>
                    </div>
                    <div class="form-group">
                        <label for="tarif">Tarif</label>
                        <input type="number" class="form-control" id="tarif" name="tarif" placeholder="masukkan tarif.." required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" placeholder="masukkan jumlah.." required>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>