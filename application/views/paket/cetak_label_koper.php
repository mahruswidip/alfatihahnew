<style>
    .a4-size {
        width: 210mm;
        height: 297mm;
        margin: 0 auto;
    }
</style>
<div class="container-fluid" id="kartudepan">
    <?php
    $counter = 0;
    foreach ($label as $jamaah) :
        if ($counter % 9 == 0) {
            if ($counter != 0) {
                echo '</tr></table>';
                // Add a button to trigger image generation for the current card group
                echo '<button onclick="onGenerateImageClick(' . ($counter / 9 - 1) . ', \'depan\')">Generate Image for Group ' . ($counter / 9 - 1) . '</button>';
                echo '</div>'; // Close the previous set of 9 items
            }
            echo '<div class="card mb-4" id="cardGroup_depan' . ($counter / 9) . '"><div class="card-body">';
            echo '<table class="table a4-size" id="table_depan' . ($counter / 9) . '" style="max-width: 500px;"><tr>';
        }
    ?>
        <td style="padding-top: 50px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;">
            <!-- Added mx-auto class for centering -->
            <div id="card_depan<?php echo $counter; ?>" style=" width: 200px; position: relative;display: flex;justify-content: center;align-items: center;">
                <img src="<?php echo base_url('assets/images/id_card_template/labelkoper/depan.png'); ?>" style=" width: 100%;">
                <img class="img-fluid" style="border-radius: 5px; width: 40%; object-fit: cover; position: absolute; top: 31%; left: 50%; transform: translateX(-50%);" src="<?php echo base_url('assets/images/' . $jamaah['jamaah_img']); ?>">
                <div class=" py-2 px-3" style="position: absolute; bottom: 10%; text-align: center;">
                    <h4 style="white-space: normal;margin-bottom: 2px; font-weight: bold;font-size: small" class="text-dark">
                        <?php echo $jamaah['nama_jamaah']; ?>
                    </h4>
                    <p style="font-size: x-small; margin: 0; font-weight: bold;" class="text-dark">Pasport No.
                        <?php echo $jamaah['nomor_paspor']; ?>
                    </p>
                </div>
            </div>
        </td>
    <?php
        $counter++;
        if ($counter % 3 == 0) {
            echo '</tr><tr>'; // Close the row and start a new one for each set of 3 items
        }
        if ($counter % 9 == 0) {
            echo '</tr></table>';
            // Add a button to trigger image generation for the current card group
            echo '<button onclick="onGenerateImageClick(' . ($counter / 9 - 1) . ', \'depan\')">Generate Image for Group ' . ($counter / 9 - 1) . '</button>';
            echo '</div>'; // Close the row and card for each set of 9 items
        }
    endforeach;

    // Close the last set of 9 items
    if ($counter % 9 != 0) {
        echo '</tr></table>';
        // Add a button to trigger image generation for the last card group
        echo '<button onclick="onGenerateImageClick(' . (floor(($counter - 1) / 9)) . ', \'depan\')">Generate Image for Group ' . (floor(($counter - 1) / 9)) . '</button>';
        echo '</div>';
    }
    ?>
</div>


<div class="container-fluid" id="kartubelakang">
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

    $counter = 0;
    $labelReversed = array_reverse($label); // Reverse the order of $label array
    $totalItems = count($labelReversed);
    $remainingItems = 0; // Initialize remaining items counter

    foreach ($labelReversed as $jamaah) :
        if ($counter % 9 == 0) {
            if ($counter != 0) {
                echo '</tr></table>';
                // Add a button to trigger image generation for the current card group
                echo '<button onclick="onGenerateImageClick(' . ($counter / 9 - 1) . ', \'belakang\')">Generate Image for Group ' . ($counter / 9 - 1) . '</button>';
                echo '</div>'; // Close the previous set of 9 items
            }
            echo '<div class="card mb-4" id="cardGroup_belakang' . ($counter / 9) . '"><div class="card-body">';
            echo '<table class="table a4-size" id="table_belakang' . ($counter / 9) . '" style="max-width: 500px;"><tr>';
        }
    ?>
        <td style="padding-top: 50px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;">
            <!-- Added mx-auto class for centering -->
            <div id="card_belakang<?php echo $counter; ?>" style=" width: 200px; position: relative;display: flex;justify-content: center;align-items: center;">
                <img src="<?php echo base_url('assets/images/id_card_template/labelkoper/belakang.png'); ?>" style=" width: 100%;">
                <div class="py-2 px-3" style="position: absolute; top: 22px; right: 5px; text-align: center;">
                    <p style="white-space: normal;margin-bottom: 1px; font-weight: bold;font-size: 0.4rem" class="text-dark">
                        <?php echo $paket[0]['hotel_mekkah']; ?>&nbsp;
                        <?php echo generateStarRating($paket[0]['bintang_mekkah']); ?>
                    </p>
                    <p style="white-space: normal; font-weight: bold;font-size: 0.4rem" class="text-dark">
                        <?php echo $paket[0]['hotel_madinah']; ?>&nbsp;
                        <?php echo generateStarRating($paket[0]['bintang_madinah']); ?>
                    </p>
                </div>
            </div>
        </td>
    <?php
        $counter++;
        if ($counter % 3 == 0) {
            echo '</tr><tr>'; // Close the row and start a new one for each set of 3 items
        }
        if ($counter % 9 == 0 || $counter == $totalItems) {
            // Add a button to trigger image generation for the last card group
            if ($counter == $totalItems && $counter % 9 != 0) {
                $remainingItems = 3 - ($counter % 3); // Calculate remaining items
                for ($i = 0; $i < $remainingItems; $i++) {
                    echo '<td style="padding-top: 50px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;">';
                    echo '<div id="card_belakang' . $counter . '">';
                    echo '<img src="' . base_url('assets/images/id_card_template/labelkoper/belakang.png') . '" style="width: 100%;">';
                    echo '<div class="py-2 px-3" style="position: relative; bottom: 295px; left: 50px;">';
                    echo '<p style="white-space: normal; margin-bottom: 1px; font-weight: bold; font-size: 0.4rem" class="text-dark">';
                    echo $paket[0]['hotel_mekkah'] . '&nbsp;';
                    echo generateStarRating($paket[0]['bintang_mekkah']);
                    echo '</p>';
                    echo '<p style="white-space: normal; font-weight: bold; font-size: 0.4rem" class="text-dark">';
                    echo $paket[0]['hotel_madinah'] . '&nbsp;';
                    echo generateStarRating($paket[0]['bintang_madinah']);
                    echo '</p>';
                    echo '</div>';
                    echo '</div>';
                    echo '</td>';
                }
                echo '</tr>';
                echo '<button onclick="onGenerateImageClick(' . (floor($counter / 9)) . ', \'belakang\')">Generate Image for Group ' . (floor($counter / 9)) . '</button>';
                echo '</div>';
            } elseif ($counter % 9 == 0) {
                echo '</tr>';
            }
        }
    endforeach;
    ?>

</div>



<script>
    function generateAndDownloadTableImage(tableId, fileName) {
        // Use html2canvas to convert the specified table to an image
        html2canvas(document.getElementById(tableId)).then(canvas => {
            // Create an anchor tag to trigger the download
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);

            // Append the canvas to the anchor tag's parent
            anchorTag.appendChild(canvas);

            // Set the download attributes
            anchorTag.download = fileName + ".jpg";
            anchorTag.href = canvas.toDataURL('image/jpeg');

            // Trigger the download
            anchorTag.click();

            // Remove the temporary anchor tag
            document.body.removeChild(anchorTag);
        });
    }

    // Update the button click event to call the new function
    function onGenerateImageClick(groupIndex, label) {
        var tableId = "table_" + label + groupIndex;
        var fileName = "Image_" + label + groupIndex;
        generateAndDownloadTableImage(tableId, fileName);
    }

    // Old code for a separate button
    document.getElementById("btn_convert").addEventListener("click", function() {
        html2canvas(document.getElementById("html-content-holder"), {
            allowTaint: true,
            useCORS: true
        }).then(function(canvas) {
            var anchorTag = document.createElement("a");
            document.body.appendChild(anchorTag);
            document.getElementById("previewImg").appendChild(canvas);
            anchorTag.download = "<?php echo $jamaah['nama_jamaah'] . '_LabelDepan' ?>.png";
            anchorTag.href = canvas.toDataURL();
            anchorTag.target = '_blank';
            anchorTag.click();
        });
    });
</script>