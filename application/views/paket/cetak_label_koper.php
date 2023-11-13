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
            echo '<table class="table" style="max-width: 500px;"><tr>';
        }
    ?>
        <td style="padding-top: 50px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;">
            <!-- Added mx-auto class for centering -->
            <div id="card_depan<?php echo $counter; ?>" style="width: 200px; position: relative;display: flex;justify-content: center;align-items: center;">
                <img src="<?php echo base_url('assets/images/id_card_template/labelkoper/depan.png'); ?>" style="width: 100%;">
                <img class="img-fluid" style="border-radius: 5px; width: 40%; object-fit: cover; position: absolute; top: 31%; left: 50%; transform: translateX(-50%);" src="<?php echo base_url('assets/images/' . $jamaah['jamaah_img']); ?>">
                <div class="py-2 px-3" style="position: absolute; bottom: 10%; text-align: center;">
                    <h4 style="white-space: normal;margin-bottom: 2px; font-weight: bold;font-size: small" class="text-dark">
                        <?php echo $jamaah['nama_jamaah']; ?></h4>
                    <p style="font-size: x-small; margin: 0; font-weight: bold;" class="text-dark">Pasport No.
                        <?php echo $jamaah['nomor_paspor']; ?></p>
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
    ?>
    <?php
    $counter = 0;
    foreach ($label as $jamaah) :
        if ($counter % 9 == 0) {
            if ($counter != 0) {
                echo '</tr></table>';
                // Add a button to trigger image generation for the current card group
                echo '<button onclick="onGenerateImageClick(' . ($counter / 9 - 1) . ', \'belakang\')">Generate Image for Group ' . ($counter / 9 - 1) . '</button>';
                echo '</div>'; // Close the previous set of 9 items
            }
            echo '<div class="card mb-4" id="cardGroup_belakang' . ($counter / 9) . '"><div class="card-body">';
            echo '<table class="table" style="max-width: 500px;"><tr>';
        }
    ?>
        <td style="padding-top: 50px; padding-right: 10px; padding-left: 10px; padding-bottom: 10px;">
            <!-- Added mx-auto class for centering -->
            <div id="card_belakang<?php echo $counter; ?>" style="width: 200px; position: relative;display: flex;justify-content: center;align-items: center;">
                <img src="<?php echo base_url('assets/images/id_card_template/labelkoper/belakang.png'); ?>" style="width: 100%;">
                <div class="py-2 px-3" style="position: absolute; top: 22px; right: 5px; text-align: center;">
                    <p style="white-space: normal;margin-bottom: 1px; font-weight: bold;font-size: 0.4rem" class="text-dark">
                        <?php echo $paket[0]['hotel_mekkah']; ?>&nbsp;<?php echo generateStarRating($paket[0]['bintang_mekkah']); ?></p>
                    <p style="white-space: normal; font-weight: bold;font-size: 0.4rem" class="text-dark">
                        <?php echo $paket[0]['hotel_madinah']; ?>&nbsp;<?php echo generateStarRating($paket[0]['bintang_madinah']); ?></p>
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
            echo '<button onclick="onGenerateImageClick(' . ($counter / 9 - 1) . ', \'belakang\')">Generate Image for Group ' . ($counter / 9 - 1) . '</button>';
            echo '</div>'; // Close the row and card for each set of 9 items
        }
    endforeach;

    // Close the last set of 9 items
    if ($counter % 9 != 0) {
        echo '</tr></table>';
        // Add a button to trigger image generation for the last card group
        echo '<button onclick="onGenerateImageClick(' . (floor(($counter - 1) / 9)) . ', \'belakang\')">Generate Image for Group ' . (floor(($counter - 1) / 9)) . '</button>';
        echo '</div>';
    }
    ?>
</div>


<!-- Add this script after your existing script -->
<script>
    function generateImage(groupIndex) {
        // Use html2canvas to convert the table within the specified card group to an image
        html2canvas(document.querySelector("#cardGroup_" + groupIndex + " table")).then(canvas => {
            // Convert the canvas to a data URL representing a JPEG image
            var dataURL = canvas.toDataURL('image/jpeg');

            // Display the image or send it to the server as needed
            displayImage(dataURL);

            // Save the image to the server
            saveImage(dataURL);
        });
    }

    function displayImage(dataURL) {
        // For demonstration purposes, let's create an image element and append it to the body
        var img = document.createElement('img');
        img.src = dataURL;
        document.body.appendChild(img);
    }

    function saveImage(dataURL) {
        // Make an AJAX request to saveImage.php
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'saveImage.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

        // Send the base64 image data to the server
        xhr.send('imageData=' + encodeURIComponent(dataURL));

        // Handle the response from the server if needed
        xhr.onload = function() {
            if (xhr.status === 200) {
                console.log('Image saved to: ' + xhr.responseText);
            } else {
                console.error('Failed to save image.');
            }
        };
    }

    // Update the button click event to call the new function
    function onGenerateImageClick(groupIndex) {
        generateImage(groupIndex);
    }
</script>