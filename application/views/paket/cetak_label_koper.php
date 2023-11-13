<div class="container-fluid" id="kartudepan">
    <?php
    $counter = 0;
    foreach ($label as $jamaah) :
        if ($counter % 9 == 0) {
            if ($counter != 0) {
                echo '</div>'; // Close the previous set of 9 items
                // Add a button to trigger PDF generation for the current card group
                echo '<button onclick="generatePDF(\'cardGroup_' . ($counter / 9) . '\')">Generate PDF</button>';
            }
            echo '<div class="card mb-4" id="cardGroup_' . ($counter / 9) . '"><div class="card-body"><div class="row">';
        }
    ?>
    <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4 mx-auto py-7" styke>
        <!-- Added mx-auto class for centering -->
        <div id=" card_<?php echo $counter; ?>" style="width: 400px; height: 600px; position: relative;">
            <img src="<?php echo base_url('assets/images/id_card_template/labelkoper/depan.png'); ?>"
                style="width: 100%;">
            <img class="img-fluid"
                style="border-radius: 5px; width: 150px; height: 200px; object-fit: cover; position: absolute; top: 35%; left: 50%; transform: translateX(-50%);"
                src="<?php echo base_url('assets/images/' . $jamaah['jamaah_img']); ?>">
            <div class="px-5" style="position: absolute; bottom: 10%; text-align: center; width: 100%;">
                <h4 style="margin-bottom: 5px; font-weight: bold;" class="text-dark">
                    <?php echo $jamaah['nama_jamaah']; ?></h4>
                <p style="font-size: 18px; margin: 0; font-weight: bold;" class="text-dark">Pasport
                    No.
                    <?php echo $jamaah['nomor_paspor']; ?></p>
            </div>
        </div>
    </div>
    <?php
        $counter++;
        if ($counter % 9 == 0) {
            echo '</div></div>'; // Close the row and card for each set of 9 items
        }
    endforeach;

    // Close the last set of 9 items
    if ($counter % 9 != 0) {
        echo '</div></div></div>';
        // Add a button to trigger PDF generation for the last card group
        echo '<button onclick="generatePDF(\'cardGroup_' . (floor($counter / 9)) . '\')">Generate PDF</button>';
    }
    ?>
</div>

<script>
function generatePDF(cardGroupId) {
    // Set options for the PDF
    const pdfOptions = {
        margin: 10,
        filename: cardGroupId + '.pdf',
        jsPDF: {
            unit: 'mm',
            format: 'a4',
            orientation: 'portrait'
        },
    };

    // Get the HTML element with the specified ID
    const element = document.getElementById(cardGroupId);

    // Use html2canvas to capture the content
    html2canvas(element).then(canvas => {
        // Convert the canvas to a data URL
        const imgData = canvas.toDataURL('image/png');

        // Add an image to the PDF
        pdfOptions.image = {
            type: 'jpeg',
            data: imgData
        };

        // Use jsPDF library to generate the PDF
        const pdf = new jsPDF(pdfOptions);

        // Save or open the PDF
        pdf.save(pdfOptions.filename);
    });
}
</script>