<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-8">
            <div class="row" id="infojamaah">
                <div class="col-xl-2 mb-xl-0 mb-4">
                    <div class="card bg-transparent shadow-xl">
                        <img src="<?php echo base_url() . 'assets/images/' . $jamaah['jamaah_img']; ?>" class="img-fluid border-radius-lg" alt="Responsive image">
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
                                    <div class="row">
                                        <div class="col-md-7">
                                            <span class="text-xs">Nama Jamaah</span>
                                            <h6 class="mb-0"><?php echo $jamaah['nama_jamaah']; ?></h6>
                                            <span class="text-xs">NIK</span>
                                            <h6 class="mb-0"><?php echo $jamaah['nik']; ?></h6>
                                            <span class="text-xs">Nomor Paspor</span>
                                            <h6 class="mb-0"><?php echo $jamaah['nomor_paspor'] ?></h6>
                                            <span class="text-xs">Nomor Telepon</span>
                                            <h6 class="mb-0"><?php echo $jamaah['nomor_telepon'] ?></h6>
                                            <span class="text-xs">Email</span>
                                            <h6 class="mb-0"><?php echo $jamaah['email'] ?></h6>
                                        </div>
                                        <div class="col-md-5">
                                            <img src="<?php echo base_url() . 'assets/images/qr_uuid/' . $jamaah['qr_code_benar']; ?>" class="img-fluid border-radius-lg" alt="QR CODE">
                                        </div>
                                    </div>
                                    <div class="row">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary" onclick="printToJpg('infojamaah')">Cetak Kartu Jamaah</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-7 mt-4">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Riwayat Keberangkatan</h6>
                        <a href="<?php echo site_url('jamaah/add_keberangkatan/') . $jamaah['id_jamaah']; ?>" class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus me-2"></span> Tambah Keberangkatan</a>
                    </div>
                </div>
                <div class="card-body pt-4 p-3">
                    <ul class="list-group">
                        <?php foreach ($record as $j) { ?>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm"><?php echo $tanggalConverted = date_format(date_create($j['tanggal_keberangkatan']), 'd F Y'); ?></h6>
                                    <span class="mb-2 text-xs">Paket: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $j['paket']; ?></span></span>
                                    <span class="mb-2 text-xs">Lama Hari: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $j['lama_hari']; ?></span></span>
                                    <span class="text-xs">Tanggal Manasik: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $tanggalConverted = date_format(date_create($j['tanggal_manasik']), 'd F Y'); ?></span></span>
                                </div>
                                <div class="ms-auto text-end">
                                    <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="<?php echo site_url('jamaah/remove_record_keberangkatan/' . $j['id_record']); ?>"><i class="far fa-trash-alt me-2"></i>Delete</a>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function printToJpg(rowId) {
        // Use html2canvas to convert the specified row to an image
        html2canvas(document.getElementById(rowId), {
            scale: 4
        }).then(canvas => {
            // Create an anchor tag to trigger the download
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);

            // Set the download attributes with improved quality
            anchorTag.download = "infojamaah_image.jpg";
            anchorTag.href = canvas.toDataURL('image/jpeg', 1.0); // Set quality to 1.0 for maximum quality

            // Trigger the download
            anchorTag.click();

            // Remove the temporary anchor tag
            document.body.removeChild(anchorTag);
        });
    }
</script>