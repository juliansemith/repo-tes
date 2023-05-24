<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="jumbotron text-center">
                <div class="col-sm-8 mx-auto">
                    <h1>Selamat Datang, <b><?= $user['nama']; ?>!</b></h1>
                    <p>UPTD Labkesda Dinas Kesehatan</p>
                    <p>Kabupaten Lhokseumawe</p>

                    Anda telah login sebagai <b><?= $this->session->userdata('username'); ?></b> [Operator].
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
</div>