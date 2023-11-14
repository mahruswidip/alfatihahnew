<style>
    .a4-size {
        height: 210mm;
        width: 297mm;
        margin: 0 auto;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .nama,
    .paspor,
    .alamat,
    .hotelmadinah,
    .hotelmekkah,
    .foto {
        position: absolute;
        text-align: center;
    }

    .nama {
        margin-top: -140px;
        margin-left: 115px;
    }

    .paspor {
        margin-top: -120px;
        margin-left: 115px;
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
        margin-top: 80px;
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
                echo '<table style="margin: 0 auto;">';

                for ($row = 0; $row < $itemsPerColumn; $row++) {
                    echo '<tr>';

                    for ($col = 0; $col < $itemsPerRow; $col++) {
                        $index = $i + $row * $itemsPerRow + $col;

                        if ($index < $numItems) {
                            echo '<td>';
                            echo '<img src="' . base_url('assets/img/labelkoper/depan.jpg') . '" style="width: 350px;">';
                            echo '<img src="' . (isset($label[$index]['jamaah_img']) ? base_url('assets/images/' . $label[$index]['jamaah_img']) : '') . '" class="foto">';
                            echo '<h4 class="nama text-dark" style="font-weight:bold;font-size: medium">' . (isset($label[$index]['nama_jamaah']) ? $label[$index]['nama_jamaah'] : '') . '</h4>';
                            echo '<h5 class="paspor text-dark" style="font-weight:normal;font-size: medium">No. Paspor &nbsp;<strong>' . (isset($label[$index]['nomor_paspor']) ? $label[$index]['nomor_paspor'] : '') . '</strong></h5>';
                            echo '<p class="alamat text-dark" style="font-weight:normal;font-size: small">Jl. Dr. Setia Budi No. 20 <br>Pasuruan City - Jawa Timur <br>Indonesia</p>';
                            echo '</td>';
                        } else {
                            echo '<td>';
                            echo '<img src="' . base_url('assets/img/labelkoper/depan.jpg') . '" style="width: 350px;">';
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
            // Assuming $paket is your array of data for the back side
            $numItemsBelakang = count($paket);
            $itemsPerRowBelakang = 3; // Number of items per row for the back side
            $itemsPerColumnBelakang = 3; // Number of items per column for the back side

            for ($i = 0; $i < $numItemsBelakang; $i += $itemsPerRowBelakang * $itemsPerColumnBelakang) {
                echo '<div class="container a4-size */bg-dark" id="myTableBelakang' . $i . '">';
                echo '<table style="margin: 0 auto;">';

                for ($row = 0; $row < $itemsPerColumnBelakang; $row++) {
                    echo '<tr>';

                    for ($col = 0; $col < $itemsPerRowBelakang; $col++) {
                        $indexBelakang = $i + $row * $itemsPerRowBelakang + $col;

                        if ($indexBelakang < $numItemsBelakang) {
                            echo '<td>';
                            echo '<img src="' . base_url('assets/img/labelkoper/belakang.jpg') . '" style="width: 350px;">';
                            echo '<h4 class="hotelmekkah text-dark" style="font-weight:bold;font-size: medium">' . (isset($paket[$indexBelakang]['hotel_mekkah']) ? $paket[$indexBelakang]['hotel_mekkah'] : '') . '</h4>';
                            echo '<h4 class="hotelmadinah text-dark" style="font-weight:bold;font-size: medium">' . (isset($paket[$indexBelakang]['hotel_madinah']) ? $paket[$indexBelakang]['hotel_madinah'] : '') . '</h4>';
                            echo '</td>';
                        } else {
                            echo '<td>';
                            echo '<img src="' . base_url('assets/img/labelkoper/belakang.jpg') . '" style="width: 350px;">';
                            echo '<h4 class="hotelmekkah text-dark" style="font-weight:bold;font-size: medium">' . $paket[0]['hotel_mekkah']  . '</h4>';
                            echo '<h4 class="hotelmadinah text-dark" style="font-weight:bold;font-size: medium">' . $paket[0]['hotel_madinah'] . '</h4>';
                            echo '</td>';
                        }
                    }

                    echo '</tr>';
                }

                echo '</table>';
                echo '</div>';
                echo '<button onclick="printToJpg(\'myTableBelakang' . $i . '\')">Print to jpg</button>';
            }
            ?>
        </div>
    </div>
</div>

<script>
    function printToJpg(tableId) {
        // Use html2canvas to convert the specified table to an image
        html2canvas(document.getElementById(tableId)).then(canvas => {
            // Create an anchor tag to trigger the download
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);

            // Set the download attributes
            anchorTag.download = "table_image.jpg";
            anchorTag.href = canvas.toDataURL('image/jpeg');

            // Trigger the download
            anchorTag.click();

            // Remove the temporary anchor tag
            document.body.removeChild(anchorTag);
        });
    }
</script>