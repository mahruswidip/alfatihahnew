<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Paket</h6>
                        <a href="<?php echo site_url('paket/bukatambah'); ?>" class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span> Tambah</a>
                    </div>
                </div>
                <!-- <?php var_dump($paket) ?> -->
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive px-5 py-2">
                        <table id="dataTable-paket" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Travel </th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Program</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Keberangkatan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama Program</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hotel Mekkah</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Hotel Madinah</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Aksi</th>

                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<style>
    #dataTable-paket {
        height: 300px !important;
    }

    #dataTable-paket td:nth-child(5) {
        width: 110px;
        /* Set your desired width */
    }

    #dataTable-paket tbody tr:hover {
        background-color: #f5f5f5;
        /* Change the background color to your desired hover color */
        cursor: pointer;
        /* Change the cursor to a pointer on hover */
    }
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
    $(document).ready(function() {
        function generateStarRating(starCount) {
            var stars = '';
            for (var i = 0; i < starCount; i++) {
                stars += '&#11088;'; // Unicode character for a star icon
            }
            return stars;
        }
        $('#dataTable-paket').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
                "paginate": {
                    "previous": "<",
                    "next": ">"
                },
            },
            "pageLength": 5,
            ajax: {
                url: '<?php echo base_url("paket/view"); ?>',
                type: 'POST',
                dataSrc: ''
            },
            rowCallback: function(row, data) {
                // Attach click event listener to each row
                $(row).on('click', function() {
                    // Get the ID of the clicked row's data
                    var paketId = data.id_paket;

                    // Redirect to the detail page using the paketId
                    window.location.href = '<?php echo site_url('paket/detail/') ?>' + paketId;
                });
            },
            columns: [{
                    data: 'null',
                    render: function(data, type, row) {
                        var logorosPath = '<?php echo base_url("assets/img/logos/logorosbg.jpg"); ?>';
                        var logonipPath = '<?php echo base_url("assets/img/logos/logonipbg.jpg"); ?>';
                        if (row.travel == 'Rosana Travel') {
                            return '<img src="' + logorosPath + '" alt="Image" class="img-fluid border-radius-lg" style="max-width: 60px; max-height: 60px;">';
                        } else {
                            return '<img src="' + logonipPath + '" alt="Image" class="img-fluid border-radius-lg" style="max-width: 60px; max-height: 60px;">';
                        }
                        // return '<p class="text-xs font-weight-bold mb-0">' + row.travel + '</p>';
                    },
                }, {
                    data: 'paket_img',
                    render: function(data, type, row) {
                        // Assuming data contains the filename (e.g., "c39f997660f4a7e707658a141d30e7ce.jpg")
                        // You need to provide the correct path to your image folder.
                        var imagePath = '<?php echo base_url("assets/images/"); ?>' + data;
                        // Generate HTML for displaying the image
                        return '<img src="' + imagePath + '" alt="Image" class="img-fluid border-radius-lg" style="max-width: 100px; max-height: 100px;">';
                    }
                },
                {
                    data: 'tanggal_keberangkatan',
                    className: 'td-column-center',
                    render: function(data, type, row) {
                        var date = new Date(data);
                        var options = {
                            year: 'numeric',
                            month: 'long',
                            day: 'numeric'
                        };
                        return '<h6 class="mb-0 text-xs">' + date.toLocaleDateString('id-ID', options) + '</h6>';
                    }
                },
                {
                    data: 'null',
                    render: function(data, type, row) {
                        return '<p class="text-xs font-weight-bold mb-0">' + row.nama_program + '</p>' + '<p class="text-xs text-secondary mb-0">' + row.paket + '</p>';
                    },
                },
                {
                    data: null,
                    width: '20px',
                    render: function(data, type, row) {
                        // Assuming data contains the hotel_mekkah and bintang_mekkah properties
                        var hotelMekkah = row.hotel_mekkah;
                        var bintangMekkah = row.bintang_mekkah;

                        // Generate HTML for displaying hotel name and star rating
                        return '<p class="text-xs font-weight-bold mb-0">' + hotelMekkah + '</p>' + generateStarRating(bintangMekkah);
                    },
                },
                {
                    data: null,
                    width: '20px',
                    render: function(data, type, row) {
                        // Assuming data contains the hotel_mekkah and bintang_mekkah properties
                        var hotelMadinah = row.hotel_madinah;
                        var bintangMadinah = row.bintang_madinah;

                        // Generate HTML for displaying hotel name and star rating
                        return '<p class="text-xs font-weight-bold mb-0">' + hotelMadinah + '</p>' + generateStarRating(bintangMadinah);
                    },
                },
                {
                    data: 'publish',
                    className: 'td-column-center',
                    render: function(data, type, row) {
                        if (data === "1") {
                            return '<span class="badge bg-gradient-success">Publish</span>';
                        } else {
                            return '<span class="badge bg-gradient-secondary">Not Published</span>';
                        }
                    }
                },
                {
                    data: null,
                    className: 'td-column-right',
                    render: function(data, type, row) {
                        // Check if user_level is equal to 1
                        if (<?php echo $this->session->userdata('user_level'); ?> == '1') {
                            var editButton = '<a href="<?php echo site_url('paket/edit/'); ?>' + row.id_paket + '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil"></span></a>';
                            var deleteButton = '<a href="<?php echo site_url('paket/remove/'); ?>' + row.id_paket + '" class="btn bg-gradient-danger btn-sm"><span class="fa fa-trash"></span></a>';
                            return editButton + ' ' + deleteButton;
                        } else {
                            return '';
                        }
                    }
                }


            ],
            // "order": [
            //     [1, 'asc']
            // ] // Menyortir berdasarkan kolom dengan indeks 1 (kolom is_aktif) secara descending (nilai 1 akan berada di atas)
        });
    });
</script>