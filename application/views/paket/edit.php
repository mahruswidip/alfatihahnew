<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Edit Paket</p>

                    </div>
                </div>
                <div class="card-body">
                    <!-- <?php var_dump($paket) ?> -->
                    <form action="<?php echo site_url() . 'paket/edit/' . $paket['id_paket'] ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label">Travel</label>
                                    <select name="travel" class="form-control">
                                        <option value="">Pilih Travel</option>
                                        <?php
                                        $travel_values = array(
                                            'Rosana Travel' => 'Rosana Travel',
                                            'Nipindo Travel' => 'Nipindo Travel',
                                        );

                                        foreach ($travel_values as $value => $display_text) {
                                            $selected = "";

                                            if ($this->input->post('travel') == $value) {
                                                $selected = 'selected="selected"';
                                            }
                                            // If not, check if the record value matches the option value
                                            elseif ($paket['travel'] == $value) {
                                                $selected = 'selected="selected"';
                                            }

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label">Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <option value="">Umroh/Haji/Tour</option>
                                        <?php
                                        $kategori_values = array(
                                            'Umroh' => 'Umroh',
                                            'Haji' => 'Haji',
                                            'Tour' => 'Tour',
                                        );

                                        foreach ($kategori_values as $value => $display_text) {
                                            $selected = "";

                                            // Check if there is input post data for 'kategori'
                                            if ($this->input->post('kategori') == $value) {
                                                $selected = 'selected="selected"';
                                            }
                                            // If not, check if the record value matches the option value
                                            elseif ($paket['kategori'] == $value) {
                                                $selected = 'selected="selected"';
                                            }

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal</label>
                                    <select name="fk_id_keberangkatan" class="form-control">
                                        <option value="">Pilih Tanggal Tersedia</option>
                                        <?php
                                        foreach ($keberangkatan as $element) {
                                            $formatted_date = date_format(date_create($element['tanggal_keberangkatan']), 'j F Y');
                                            $selected = ($element['id_keberangkatan'] == $paket['fk_id_keberangkatan']) ? 'selected' : '';
                                            echo '<option value="' . $element['id_keberangkatan'] . '" ' . $selected . '>' . $formatted_date . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Lama Hari</label>
                                    <input type="text" required placeholder="9/13/16" name="lama_hari" value="<?php echo ($this->input->post('lama_hari') ? $this->input->post('lama_hari') : $paket['lama_hari']); ?>" class="form-control" id="lama_hari" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Program</label>
                                    <input type="text" name="nama_program" placeholder="UMROH MUHARRAM GRUP PAK BUDI" value="<?php echo ($this->input->post('nama_program') ? $this->input->post('nama_program') : $paket['nama_program']); ?>" class="form-control" id="nama_program" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Paket</label>
                                    <select name="paket" class="form-control">
                                        <option value="">Hemat/Semi VIP/VIP</option>
                                        <?php
                                        $paket_values = array(
                                            'Hemat' => 'Hemat',
                                            'Ekonomi' => 'Ekonomi',
                                            'Standard' => 'Standard',
                                            'VIP' => 'VIP',
                                            'Semi VIP' => 'Semi VIP',
                                            'VIP Business Class' => 'VIP Business Class',
                                            'VVIP Business Class' => 'VVIP Business Class',
                                        );

                                        foreach ($paket_values as $value => $display_text) {
                                            $selected = "";

                                            // Check if there is input post data for 'paket'
                                            if ($this->input->post('paket') == $value) {
                                                $selected = 'selected="selected"';
                                            }
                                            // If not, check if the record value matches the option value
                                            elseif ($paket['paket'] == $value) {
                                                $selected = 'selected="selected"';
                                            }

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="form-control-label">Hotel Mekkah</label>
                                    <input type="text" name="hotel_mekkah" placeholder="HILTON HOTEL MEKKAH" value="<?php echo ($this->input->post('hotel_mekkah') ? $this->input->post('hotel_mekkah') : $paket['hotel_mekkah']); ?>" class="form-control" id="hotel_mekkah" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Bintang Mekkah</label>
                                    <input type="text" name="bintang_mekkah" placeholder="1-5" value="<?php echo ($this->input->post('bintang_mekkah') ? $this->input->post('bintang_mekkah') : $paket['bintang_mekkah']); ?>" class="form-control" id="bintang_mekkah" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="form-control-label">Hotel Madinah</label>
                                    <input type="text" name="hotel_madinah" placeholder="FRONT TAIBA HOTEL" value="<?php echo ($this->input->post('hotel_madinah') ? $this->input->post('hotel_madinah') : $paket['hotel_madinah']); ?>" class="form-control" id="hotel_madinah" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Bintang Madinah</label>
                                    <input type="text" name="bintang_madinah" placeholder="1-5" value="<?php echo ($this->input->post('bintang_madinah') ? $this->input->post('bintang_madinah') : $paket['bintang_madinah']); ?>" class="form-control" id="bintang_madinah" />
                                </div>
                            </div>
                            <?php
                            if ($this->session->flashdata('error') != '') {
                                echo '<div class="alert alert-danger" role="alert">';
                                echo $this->session->flashdata('error');
                                echo '</div>';
                            }
                            ?>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Gambar Paket</label>
                                    <br>
                                    <input type="file" class="form-control" name="paket_img">
                                    <!-- Menampilkan gambar saat mengedit -->
                                    <?php if (!empty($paket['paket_img'])) : ?>
                                        <img src="<?php echo base_url('assets/images/' . $paket['paket_img']); ?>" alt="Paket Image" class="img-thumbnail mt-2" style="max-width: 100%;">
                                    <?php endif; ?>
                                    <!-- Input tersembunyi untuk menyimpan nama gambar saat ini -->
                                    <input type="hidden" name="paket_img" value="<?php echo ($this->input->post('paket_img') ? $this->input->post('paket_img') : $paket['paket_img']); ?>" />
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label">Mata Uang</label>
                                    <select name="matauang" class="form-control">
                                        <option value="">USD/Rp</option>
                                        <?php
                                        $matauang_values = array(
                                            'USD' => 'USD',
                                            'Rp' => 'Rp',
                                        );

                                        foreach ($matauang_values as $value => $display_text) {
                                            $selected = "";

                                            // Check if there is input post data for 'matauang'
                                            if ($this->input->post('matauang') == $value) {
                                                $selected = 'selected="selected"';
                                            }
                                            // If not, check if the record value matches the option value
                                            elseif (isset($paket['matauang']) && $paket['matauang'] == $value) {
                                                $selected = 'selected="selected"';
                                            }

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Uang Muka</label>
                                    <input type="text" placeholder="30000000" name="uang_muka" value="<?php echo ($this->input->post('uang_muka') ? $this->input->post('uang_muka') : $paket['uang_muka']); ?>" class="form-control" id="uang_muka" />
                                </div>
                            </div>
                            <div class="col-md-1">
                                <div class="form-group">

                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label">Mata Uang</label>
                                    <select name="matauangall" class="form-control">
                                        <option value="">USD/Rp</option>
                                        <?php
                                        $matauangall_values = array(
                                            'USD' => 'USD',
                                            'Rp' => 'Rp',
                                        );

                                        foreach ($matauangall_values as $value => $display_text) {
                                            $selected = "";

                                            // Check if there is input post data for 'matauangall'
                                            if ($this->input->post('matauangall') == $value) {
                                                $selected = 'selected="selected"';
                                            }
                                            // If not, check if the record value matches the option value
                                            elseif ($paket['matauangall'] == $value) {
                                                $selected = 'selected="selected"';
                                            }

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Harga Paket</label>
                                    <input type="text" placeholder="30000000" name="harga_paket" value="<?php echo ($this->input->post('harga_paket') ? $this->input->post('harga_paket') : $paket['harga_paket']); ?>" class="form-control" id="harga_paket" />
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor Guide</label>
                                    <input type="text" placeholder="+628115148158" name="nomor_guide" value="<?php echo ($this->input->post('nomor_guide') ? $this->input->post('nomor_guide') : $paket['nomor_guide']); ?>" class="form-control" id="nomor_guide" />
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Publikasikan <p class="text-secondary text-xs">(Tampilkan di Website dan Aplikasi)</p></label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="publish" name="publish" <?php echo ($paket['publish'] == 1) ? 'checked' : ''; ?>>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Konten</label>
                                    <textarea id="editor" name="konten" required><?php echo $artikel['konten']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr class="horizontal dark mt-0">
                        <button class="btn btn-primary btn-sm ms-auto" type="submit">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Script CKEditor -->
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>