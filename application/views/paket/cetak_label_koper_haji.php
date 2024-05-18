<style>
    .a4-size {
        height: 210mm;
        width: 297mm;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .paspor,
    .alamat,
    .hotelmadinah,
    .hotelmekkah,
    .foto {
        position: absolute;
        text-align: center;
    }

    .nama {
        position: absolute;
        margin-top: -150px;
        margin-left: 102px;
    }

    .paspor {
        margin-top: -108px;
        margin-left: 115px;
    }

    .nomorguide {
        margin-top: -55px;
        margin-left: 97px;
        margin-bottom: 38px;
    }

    .alamat {
        margin-top: -95px;
        margin-left: 115px;
        text-align: left;
    }

    .hotelmekkah {
        margin-top: -180px;
        margin-left: 115px;
        text-align: left;
    }

    .hotelmadinah {
        margin-top: -161px;
        margin-left: 115px;
        text-align: left;
    }

    .foto {
        margin-top: 70px;
        margin-left: -326px;
        width: 70px;
    }

    table,
    th,
    td {
        border: 3px solid grey;
    }
</style>

<!-- Include html2canvas library -->
<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>

<div class="container-fluid" id="kartudepan">
    <div class="card" id="cardGroup_depan">
        <div class="card-body">

            <?php
            // Assuming $label is your array of data
            $numItems = count($label);
            $itemsPerRow = 3; // Number of items per row
            $itemsPerColumn = 3; // Number of items per column

            for ($i = 0; $i < $numItems; $i += $itemsPerRow * $itemsPerColumn) {
                echo '<div class="container a4-size */bg-dark" id="myTable' . $i . '">';
                echo '<table style="margin: 0 auto; table-layout: fixed;">';

                for ($row = 0; $row < $itemsPerColumn; $row++) {
                    echo '<tr>';

                    for ($col = 0; $col < $itemsPerRow; $col++) {
                        $index = $i + $row * $itemsPerRow + $col;

                        if ($index < $numItems) {
                            echo '<td>';
                            // echo '<img src="' . base_url('assets/img/labelkoper/hajidepanbis2.jpg') . '" style="width: 350px;">';
                            if ($paket[0]['kategori'] == 'Haji') {
                                if ($paket[0]['bus'] == 'BUS 1') {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajidepanbis1.jpg') . '" style="width: 350px;">';
                                } else {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajidepanbis2.jpg') . '" style="width: 350px;">';
                                }
                            } else {
                                echo '<img src="' . base_url('assets/img/labelkoper/depannip.jpg') . '" style="width: 350px;">';
                            };
                            echo '<img src="' . (isset($label[$index]['jamaah_img']) ? base_url('assets/images/' . $label[$index]['jamaah_img']) : '') . '" class="foto img-fluid"  style="border-radius: 10px; object-fit: cover; height: 100px; width: 70px">';
                            echo '<div class="row nama">';
                            echo '<div class="col-md-10">';
                            echo '<h4 class="text-dark" style="font-weight:bold;font-size: medium; word-wrap: break-word;width: fit-content;">' . (isset($label[$index]['nama_jamaah']) ? $label[$index]['nama_jamaah'] : '') . '</h4>';
                            echo '</div>';
                            echo '</div>';
                            echo '<h5 class="paspor text-dark" style="font-weight:normal;font-size: medium">No. Paspor &nbsp;<strong>' . (isset($label[$index]['nomor_paspor']) ? $label[$index]['nomor_paspor'] : '') . '</strong></h5>';
                            echo '</td>';
                        } else {
                            echo '<td>';
                            if ($paket[0]['kategori'] == 'Haji') {
                                if ($paket[0]['bus'] == 'BUS 1') {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajidepanbis1.jpg') . '" style="width: 350px;">';
                                } else {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajidepanbis2.jpg') . '" style="width: 350px;">';
                                }
                            } else {
                                echo '<img src="' . base_url('assets/img/labelkoper/depannip.jpg') . '" style="width: 350px;">';
                            };
                            echo '</td>';
                        }
                    }

                    echo '</tr>';
                }

                echo '</table>';
                echo '</div>';
                echo '<button onclick="printToJpg(\'myTable' . $i . '\')">Print to jpg</button>';
            }
            ?>


        </div>
    </div>
</div>
<br>
<div class="container-fluid" id="kartubelakang">
    <div class="card" id="cardGroup_belakang">
        <div class="card-body">

            <?php
            // Assuming $label is your array of data
            $numItemsBlkg = count($paket);
            $itemsPerRowBlkg = 3; // Number of items per row
            $itemsPerColumnBlkg = 3; // Number of items per column

            for ($i = 0; $i < $numItemsBlkg; $i += $itemsPerRowBlkg * $itemsPerColumnBlkg) {
                echo '<div class="container a4-size */bg-dark" id="myTableBlkg' . $i . '">';
                echo '<table style="margin: 0 auto; table-layout: fixed;">';

                for ($row = 0; $row < $itemsPerColumnBlkg; $row++) {
                    echo '<tr>';

                    for ($col = 0; $col < $itemsPerRowBlkg; $col++) {
                        $indexBlkg = $i + $row * $itemsPerRowBlkg + $col;

                        if ($indexBlkg < $numItemsBlkg) {
                            echo '<td>';
                            // echo '<img src="' . base_url('assets/img/labelkoper/hajidepanbis2.jpg') . '" style="width: 350px;">';
                            if ($paket[0]['kategori'] == 'Haji') {
                                if ($paket[0]['bus'] == 'BUS 1') {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajiblkgbis1.jpg') . '" style="width: 350px;">';
                                } else {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajiblkgbis2.jpg') . '" style="width: 350px;">';
                                }
                            } else {
                                echo '<img src="' . base_url('assets/img/labelkoper/blkgnip.jpg') . '" style="width: 350px;">';
                            };
                            echo '<h4 class="hotelmekkah text-dark" style="font-weight:bold;font-size: medium">' . ($paket[0]['hotel_mekkah']) . '&nbsp;' . '&#9733;' . ($paket[0]['bintang_mekkah']) . '&nbsp;' .  '</h4>';
                            echo '<h4 class="hotelmadinah text-dark" style="font-weight:bold;font-size: medium">' . ($paket[0]['hotel_madinah']) . '&nbsp;' . '&#9733;' . ($paket[0]['bintang_madinah']) . '&nbsp;' . '</h4>';
                            echo '<h5 class="nomorguide text-dark" style="font-weight:normal;font-size: 0.73rem"><strong>' . ($paket[0]['nomor_guide']) . '</strong></h5>';
                            echo '</td>';
                        } else {
                            echo '<td>';
                            if ($paket[0]['kategori'] == 'Haji') {
                                if ($paket[0]['bus'] == 'BUS 1') {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajiblkgbis1.jpg') . '" style="width: 350px;">';
                                } else {
                                    echo '<img src="' . base_url('assets/img/labelkoper/hajiblkgbis2.jpg') . '" style="width: 350px;">';
                                }
                            } else {
                                echo '<img src="' . base_url('assets/img/labelkoper/blkgnip.jpg') . '" style="width: 350px;">';
                            };
                            echo '<h4 class="hotelmekkah text-dark" style="font-weight:bold;font-size: medium">' . ($paket[0]['hotel_mekkah']) . '&nbsp;' . '&#9733;' . ($paket[0]['bintang_mekkah']) . '&nbsp;' .  '</h4>';
                            echo '<h4 class="hotelmadinah text-dark" style="font-weight:bold;font-size: medium">' . ($paket[0]['hotel_madinah']) . '&nbsp;' . '&#9733;' . ($paket[0]['bintang_madinah']) . '&nbsp;' . '</h4>';
                            echo '<h5 class="nomorguide text-dark" style="font-weight:normal;font-size: 0.73rem"><strong>' . ($paket[0]['nomor_guide']) . '</strong></h5>';
                            echo '</td>';
                        }
                    }

                    echo '</tr>';
                }

                echo '</table>';
                echo '</div>';
                echo '<button onclick="printToJpg(\'myTableBlkg' . $i . '\')">Print to jpg</button>';
            }
            ?>


        </div>
    </div>
</div>

<script>
    function printToJpg(tableId) {
        // Use html2canvas to convert the specified table to an image
        html2canvas(document.getElementById(tableId), {
            scale: 4
        }).then(canvas => {
            // Create an anchor tag to trigger the download
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);

            // Set the download attributes with improved quality
            anchorTag.download = "table_image.jpg";
            anchorTag.href = canvas.toDataURL('image/jpeg', 1.0); // Set quality to 1.0 for maximum quality

            // Trigger the download
            anchorTag.click();

            // Remove the temporary anchor tag
            document.body.removeChild(anchorTag);
        });
    }
</script>