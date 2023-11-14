<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <p class="mb-0">Tambah Keberangkatan </p>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo site_url() . 'jamaah/add_keberangkatan/' . $jamaah['id_jamaah'] ?>" method="post" enctype="multipart/form-data">
                        <input type="text" name="id_jamaah" value="<?php echo ($this->input->post('id_jamaah') ? $this->input->post('id_jamaah') : $jamaah['id_jamaah']); ?>" class="form-control d-none" id="id_jamaah" />
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Tanggal Keberangkatan</label>
                                    <select title="Select Country" name="regcountry" class="form-control" id="country-name">
                                        <option value="">Pilih Tanggal Tersedia</option>
                                        <?php
                                        foreach ($getCountries as $key => $element) {
                                            // Format the date here
                                            $formattedDate = date('d F Y', strtotime($element['tanggal_keberangkatan']));
                                            echo '<option value="' . $element['id_keberangkatan'] . '">' . $formattedDate . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-control-label">Paket</label>
                                    <select title="Select State" name="id_paket" class="form-control" id="state-name">
                                        <option value="">Pilih Paket Tersedia</option>
                                    </select>
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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // get state 
        jQuery(document).on('change', 'select#country-name', function(e) {
            e.preventDefault();
            var countryID = jQuery(this).val();
            getStatesList(countryID);
        });

        // function get All States
        function getStatesList(countryID) {
            $.ajax({
                url: "<?php echo base_url() . 'jamaah/getstates' ?>",
                type: 'post',
                data: {
                    countryID: countryID,
                },
                dataType: 'json',
                beforeSend: function() {
                    jQuery('select#state-name').find("option:eq(0)").html("Please wait..");
                },
                complete: function() {
                    // code
                },
                success: function(json) {
                    var options = '';
                    options += '<option value="">Pilih Paket</option>';
                    for (var i = 0; i < json.length; i++) {
                        options += '<option value="' + json[i].id_paket + '">' + json[i].nama_program + '</option>';
                    }
                    jQuery("select#state-name").html(options);

                },
                error: function(xhr, ajaxOptions, thrownError) {
                    console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                }
            });
        }
    });
</script>