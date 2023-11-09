<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Keberangkatan</p>

                    </div>
                </div>
                <div class="card-body">
                    <!-- <?php var_dump($keberangkatan) ?> -->
                    <form action="<?php echo site_url() . 'keberangkatan/add' ?>" method="post" enctype="multipart/form-data">
                        <p class="text-uppercase text-sm">Detail Keberangkatan</p>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal Keberangkatan</label>
                                    <input type="date" class="form-control" name="tanggal_keberangkatan" value="<?php echo $this->input->post('tanggal_keberangkatan'); ?>" required><br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="is_aktif" name="is_aktif" checked>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal Manasik</label>
                                    <input type="date" class="form-control" name="tanggal_manasik" value="<?php echo $this->input->post('tanggal_manasik'); ?>" required><br>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>