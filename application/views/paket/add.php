<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Paket</p>

                    </div>
                </div>
                <div class="card-body">
                    <!-- <?php var_dump($keberangkatan) ?> -->
                    <form action="<?php echo site_url() . 'paket/add' ?>" method="post" enctype="multipart/form-data">
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
                                            $selected = ($value == $this->input->post('travel')) ? ' selected="selected"' : "";

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
                                        <option value="">Pilih Kategori</option>
                                        <?php
                                        $kategori_values = array(
                                            'Umroh' => 'Umroh',
                                            'Haji' => 'Haji',
                                            'Tour' => 'Tour',
                                        );

                                        foreach ($kategori_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('kategori')) ? ' selected="selected"' : "";

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
                                            echo '<option value="' . $element['id_keberangkatan'] . '">' . $formatted_date . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Lama Hari</label>
                                    <input type="text" required placeholder="9/13/16" name="lama_hari" value="<?php echo $this->input->post('lama_hari'); ?>" class="form-control" id="lama_hari" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="form-control-label">Nama Program</label>
                                    <input type="text" name="nama_program" placeholder="UMROH MUHARRAM GRUP PAK BUDI" value="<?php echo $this->input->post('nama_program'); ?>" class="form-control" id="nama_program" />
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
                                            $selected = ($value == $this->input->post('paket')) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="form-control-label">Hotel Mekkah</label>
                                    <input type="text" name="hotel_mekkah" placeholder="HILTON HOTEL MEKKAH" value="<?php echo $this->input->post('hotel_mekkah'); ?>" class="form-control" id="hotel_mekkah" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Bintang Mekkah</label>
                                    <input type="text" name="bintang_mekkah" placeholder="1-5" value="<?php echo $this->input->post('bintang_mekkah'); ?>" class="form-control" id="bintang_mekkah" />
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label class="form-control-label">Hotel Madinah</label>
                                    <input type="text" name="hotel_madinah" placeholder="FRONT TAIBA HOTEL" value="<?php echo $this->input->post('hotel_madinah'); ?>" class="form-control" id="hotel_madinah" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Bintang Madinah</label>
                                    <input type="text" name="bintang_madinah" placeholder="1-5" value="<?php echo $this->input->post('bintang_madinah'); ?>" class="form-control" id="bintang_madinah" />
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
                                    <input type="file" class="form-control" name="paket_img" required>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label class="form-control-label">Mata Uang</label>
                                    <select name="matauang" class="form-control">
                                        <option value="">USD / Rp</option>
                                        <?php
                                        $matauang_values = array(
                                            'USD' => 'USD',
                                            'Rp' => 'Rp',

                                        );

                                        foreach ($matauang_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('matauang')) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-control-label">Uang Muka</label>
                                    <input type="text" placeholder="30000000" name="uang_muka" value="<?php echo $this->input->post('uang_muka'); ?>" class="form-control" id="uang_muka" />
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
                                        <option value="">USD / Rp</option>
                                        <?php
                                        $matauangall_values = array(
                                            'USD' => 'USD',
                                            'Rp' => 'Rp',

                                        );

                                        foreach ($matauangall_values as $value => $display_text) {
                                            $selected = ($value == $this->input->post('matauangall')) ? ' selected="selected"' : "";

                                            echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Harga Paket</label>
                                    <input type="text" placeholder="30000000" name="harga_paket" value="<?php echo $this->input->post('harga_paket'); ?>" class="form-control" id="harga_paket" />
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-control-label">Nomor Guide</label>
                                    <input type="text" placeholder="+628115484515" name="nomor_guide" value="<?php echo $this->input->post('nomor_guide'); ?>" class="form-control" id="nomor_guide" />
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Publikasikan <p class="text-secondary text-xs">(Tampilkan di Website dan Aplikasi)</p></label>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="form-check-input" id="publish" name="publish">
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-0">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="form-control-label">Konten</label>
                                    <textarea id="editor" name="konten"><?php echo $this->input->post('konten'); ?></textarea>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url('assets'); ?>/js/ckeditor.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    });
</script>