<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Jamaah</p>

                    </div>
                </div>
                <div class="card-body">
                    <?php echo form_open_multipart('jamaah/edit/' . $jamaah['id_jamaah']); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">NIK</label>
                                <input type="text" required placeholder="35751515" name="nik" value="<?php echo $jamaah['nik']; ?>" class="form-control" id="nik" disabled />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nama Jamaah (PASPOR)</label>
                                <input type="text" required placeholder="MUHAMMAD ALI" name="nama_jamaah" value="<?php echo $jamaah['nama_jamaah']; ?>" class="form-control" id="nama_jamaah" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nomor Whatsapp</label>
                                <input type="text" required placeholder="0881511255" name="nomor_telepon" value="<?php echo $jamaah['nomor_telepon']; ?>" class="form-control" id="nomor_telepon" />
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
                                        $selected = "";

                                        // Check if there is input post data for 'jenis_kelamin'
                                        if ($this->input->post('jenis_kelamin') == $value) {
                                            $selected = 'selected="selected"';
                                        }
                                        // If not, check if the record value matches the option value
                                        elseif ($jamaah['jenis_kelamin'] == $value) {
                                            $selected = 'selected="selected"';
                                        }

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
                                <input type="file" class="form-control" style="display: none;" id="jamaah-img" name="jamaah_img">
                                <br>
                                <button id="jamaah-img-button" onclick="return false;" class="btn btn-info btn-sm"><span class="fa fa-pencil"></span> Ubah Foto</button>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Nomor Paspor</label>
                                <input type="text" required placeholder="C238712" name="nomor_paspor" value="<?php echo $jamaah['nomor_paspor']; ?>" class="form-control" id="nomor_paspor" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3"><?php echo $jamaah['alamat']; ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input type="text" required placeholder="contoh@apa.com" name="email" value="<?php echo $jamaah['email']; ?>" class="form-control" id="email" />
                            </div>
                        </div>
                    </div>
                    <hr class="horizontal dark mt-0">
                    <button class="btn btn-primary btn-sm ms-auto" type="submit">Simpan</button>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Add this to include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
    $('#jamaah-img').hide()
    jQuery('#jamaah-img-button').on('click', function() {
        jQuery('#jamaah-img').toggle();
    })
</script>