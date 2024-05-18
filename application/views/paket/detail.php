<style>
    .logo {
        position: absolute;
        top: 10px;
        right: 10px;
        width: 110px;
        /* Adjust as needed */
        height: 110px;
        /* Adjust as needed */
    }
</style>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-xl-4 mb-xl-0 mb-4">
                    <div class="card bg-transparent shadow-xl">
                        <img src="<?php echo base_url() . 'assets/images/' . $paket[0]['paket_img']; ?>" class="img-fluid border-radius-lg" alt="Responsive image">
                    </div>
                </div>
                <?php
                function generateStarRating($starCount)
                {
                    $output = '';
                    for ($i = 1; $i <= 5; $i++) {
                        if ($i <= $starCount) {
                            $output .= '<i class="fas fa-star text-primary"></i>'; // Solid star icon
                        } else {
                            $output .= '<i class="far fa-star text-primary"></i>'; // Outline star icon
                        }
                    }
                    return $output;
                }
                ?>
                <div class="col-xl-8">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body pt-0 p-3 mt-3 mx-2">
                                    <img class="logo" src="<?php echo base_url() . 'assets/img/logos/' . (($paket[0]['travel'] == 'Rosana Travel') ? 'logoros.png' : 'logonip.png'); ?>" alt="logo">
                                    <span class="text-xs">Keberangkatan</span>
                                    <h6 class="mb-0">
                                        <?php echo $tanggalConverted = date_format(date_create($paket[0]['tanggal_keberangkatan']), 'd F Y'); ?>
                                    </h6>
                                    <span class="text-xs">Program</span>
                                    <h6 class="mb-0"><?php echo $paket[0]['nama_program']; ?></h6>
                                    <h6 class="mb-0"><?php echo $paket[0]['paket']; ?></h6>
                                    <span class="text-xs">Lama Hari</span>
                                    <h6 class=""><?php echo $paket[0]['lama_hari']; ?>&nbsp; Hari</h6>
                                    <div class="row">
                                        <div class="col">
                                            <span class="text-xs">Hotel Mekkah</span>
                                            <h6 class=""><?php echo $paket[0]['hotel_mekkah']; ?></h6>
                                            <h6 class=""><?php echo generateStarRating($paket[0]['bintang_mekkah']); ?>
                                            </h6>
                                        </div>
                                        <div class="col">
                                            <span class="text-xs">Hotel Madinah</span>
                                            <h6 class=""><?php echo $paket[0]['hotel_madinah']; ?></h6>
                                            <h6 class=""><?php echo generateStarRating($paket[0]['bintang_madinah']); ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <?php if ($paket[0]['kategori'] == 'Haji') { ?>
                                        <span class="text-xs">Lokasi Bus</span>
                                        <h6><?php echo $paket[0]['bus']; ?></h6>
                                    <?php } ?>
                                    <?php if ($paket[0]['kategori'] == 'Haji') { ?>
                                        <div class="col-md-5 mt-4">
                                            <form action="<?php echo site_url('paket/tetapkan_bus/' . $paket[0]['id_paket']); ?>" method="post" enctype="multipart/form-data">
                                                <select name="bus" class="form-control">
                                                    <option value="">Pilih Bus</option>
                                                    <?php
                                                    $bus_values = array(
                                                        'BUS 1' => 'BUS 1',
                                                        'BUS 2' => 'BUS 2',
                                                    );

                                                    foreach ($bus_values as $value => $display_text) {
                                                        $selected = ($value == $this->input->post('bus')) ? ' selected="selected"' : "";
                                                        echo '<option value="' . $value . '" ' . $selected . '>' . $display_text . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                                <button type="submit" class="btn btn-success mt-2"><i class="fa fa-bus me-2" aria-hidden="true"></i>Tetapkan Bus</button>
                                            </form>
                                        </div>
                                    <?php } ?>

                                    <a href="<?php echo ($paket[0]['kategori'] == 'Haji') ? site_url() . 'paket/cetak_label_koper_haji/' . $paket[0]['id_paket'] : site_url() . 'paket/cetak_label_koper/' . $paket[0]['id_paket']; ?>" class="btn btn-primary mt-3" style="position: ; bottom: 10px;">
                                        <i class="fas fa-print me-2" aria-hidden="true"></i> Cetak Label Koper
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 mt-4">
            <div class="card">
                <div class="card-header pb-0 px-3 mb-0 mx-2">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6>Daftar Jamaah</h6>
                            <p class="text-xs">Total Jamaah: <?php echo count($record); ?></p>
                        </div>
                        <div class="col-md-2 justify-content-end">
                            <form action="<?php echo site_url() . 'paket/detail/' . $paket[0]['id_paket'] ?>" method="post" enctype="multipart/form-data">
                                <input type="text" name="link_grup_whatsapp" value="<?php echo $this->input->post('link_grup_whatsapp'); ?>" class="form-control mb-2" placeholder="Link Grup Whatsapp" id="link_grup_whatsapp" />
                                <button type="submit" class="btn btn-success"><i class="fa fa-gear me-2" aria-hidden="true"></i>Set Grup WA</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card-body pt-4 p-3">
                    <ul class="list-group" id="jamaahTable">
                        <?php foreach ($record as $jamaah) { ?>
                            <?php $nowa = $str = ltrim($jamaah['nomor_telepon'], '0'); ?>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="me-4">
                                    <img src="<?php echo base_url('assets/images/' . $jamaah['jamaah_img']); ?>" alt="Jamaah Image" class="img-fluid    border-radius-lg" style="max-width: 100px; max-height: 100px;">
                                </div>
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm"><?php echo $jamaah['nama_jamaah']; ?></h6>
                                    <span class="mb-2 text-xs">Nomor Paspor: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $jamaah['nomor_paspor']; ?></span></span>
                                    <span class="mb-2 text-xs">Nomor HP: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $jamaah['nomor_telepon']; ?></span></span>
                                    <span class="text-xs">ID Record: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $jamaah['id_record']; ?></span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?php echo site_url('jamaah/remove_record_keberangkatan/' . $jamaah['id_jamaah']); ?>"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                    <a class="btn btn-link text-dark px-3 mb-0" href="<?php echo site_url('jamaah/edit/' . $jamaah['id_jamaah']); ?>"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
                                    <?php if ($jamaah['nomor_telepon'] != null) {
                                        echo '<a href="https://wa.me/62' . $nowa . '?text=Assalamualaikum%20Wr.%20Wb.%0AKami%20dari%20Admin%20PT.%20Rosana%20Grup%0A%0ASilahkan%20segera%20Gabung%20bersama%20di%20Grup%20Whatsapp%20Keberangkatan%20Umroh%20Anda%0A%0AKlik%20Link%20dibawah%20Ini%20%3A' . $this->session->userdata('link') . '" class="btn btn-link text-success px-3 mb-0"><i class="fa fa-whatsapp text-success me-2" aria-hidden="true"></i>Undang</a>';
                                    } else {
                                        echo '<a class="btn btn-link text-secondary px-3 mb-0"><i class="fa fa-whatsapp text-secondary me-2" aria-hidden="true" disabled></i>Undang</a>';
                                    }
                                    ?>

                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($this->session->flashdata('setbis')) { ?>
    <script>
        window.onload = function() {
            alert("<?php echo $this->session->flashdata('setbis'); ?>");
        };
    </script>
<?php } ?>
<script>
    $(document).ready(function() {
        $('#jamaahTable').DataTable({
            "paging": true, // Enable pagination
            "searching": true, // Enable search functionality
            "lengthMenu": [5, 10, 25, 50], // Number of records per page options
            "pageLength": 10 // Default number of records per page
        });
    });
</script>