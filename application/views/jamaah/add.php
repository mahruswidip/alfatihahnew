<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Jamaah</p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'jamaah/add' ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <?php if ($this->session->flashdata('nik')) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>Aduh !!</strong> Sepertinya NIK sudah ada.</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php } else if ($this->session->flashdata('nik2')) { ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <span class="alert-text"><strong>Aduh !!</strong> Sepertinya data anda tanpa foto</span>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                            <?php } ?>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">NIK</label>
                                    <input type="text" required placeholder="35751515" name="nik" value="<?php echo $this->input->post('nik'); ?>" class="form-control" id="nik" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Jamaah (PASPOR)</label>
                                    <input type="text" required placeholder="MUHAMMAD ALI" name="nama_jamaah" value="<?php echo $this->input->post('nama_jamaah'); ?>" class="form-control" id="nama_jamaah" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor Whatsapp</label>
                                    <input type="text" required placeholder="0881511255" name="nomor_telepon" value="<?php echo $this->input->post('nomor_telepon'); ?>" class="form-control" id="nomor_telepon" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control">
                                        <option value="">Pilih</option>
                                        <?php
                                        $jenis_kelamin_values = array(
                                            'Laki-Laki' => 'Laki-Laki',
                                            'Perempuan' => 'Perempuan',

                                        );

                                        foreach ($jenis_kelamin_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('jenis_kelamin')) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                            if ($this->session->flashdata('error') != '') {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo $this->session->flashdata('error');
                                echo '</div>';
                            }
                            ?>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Foto Jamaah</label>
                                    <br>
                                    <input type="file" class="form-control" name="jamaah_img" required>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor Paspor</label>
                                    <input type="text" placeholder="C238712" name="nomor_paspor" value="<?php echo $this->input->post('nomor_paspor'); ?>" class="form-control" id="nomor_paspor" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="text" placeholder="contoh@apa.com" name="email" value="<?php echo $this->input->post('email'); ?>" class="form-control" id="email" />
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