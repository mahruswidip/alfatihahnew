<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Buat Akun Untuk Jamaah</p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'jamaah/buatuser/' . $jamaah['id_jamaah'] ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <?php if ($this->session->flashdata('fk_id_jamaah')) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>Aduh !!</strong> Sepertinya NIK sudah ada.</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } ?>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">ID Jamaah</label>
                                    <input type="text" readonly name="fk_id_jamaah" value="<?php echo ($this->input->post('fk_id_jamaah') ? $this->input->post('id_jamaah') : $jamaah['id_jamaah']); ?>" class="form-control d-block" id="fk_id_jamaah" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nama Jamaah</label>
                                    <input type="text" readonly name="user_name" value="<?php echo ($this->input->post('user_name') ? $this->input->post('user_name') : $jamaah['nama_jamaah']); ?>" class="form-control" id="user_name" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Nomor KTP</label>
                                    <input type="text" readonly name="nik" value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $jamaah['nik']); ?>" class="form-control" id="nik" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="bmd-label-floating">Password</label>
                                    <input type="text" readonly name="user_password" value="<?php echo ($this->input->post('nik') ? $this->input->post('nik') : $jamaah['nik']); ?>" class="form-control" id="user_password" />
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