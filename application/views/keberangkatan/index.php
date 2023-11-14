<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Tanggal Keberangkatan</h6>
                        <a href="<?php echo site_url('keberangkatan/add'); ?>" class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span> Tambah</a>
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table id="dataTableKeberangkatan" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Keberangkatan</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Manasik</th>
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
    #dataTableKeberangkatan {
        height: 300px !important;
    }
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
    $(document).ready(function() {
        $('#dataTableKeberangkatan').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
                "paginate": {
                    "previous": "<",
                    "next": ">"
                },
            },
            "pageLength": 5,
            ajax: {
                url: '<?php echo base_url("keberangkatan/view"); ?>',
                type: 'POST',
                dataSrc: ''
            },
            columns: [{
                    data: 'tanggal_keberangkatan',
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
                    data: 'is_aktif',
                    className: 'td-column-center',
                    render: function(data, type, row) {
                        if (data === "1") {
                            return '<span class="badge bg-gradient-success">Aktif</span>';
                        } else {
                            return '<span class="badge bg-gradient-secondary">Non Aktif</span>';
                        }
                    }
                },
                {
                    data: 'tanggal_manasik',
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
                // {
                //     data: null,
                //     className: 'td-column-right',
                //     render: function(data, type, row) {
                //         // Check if user_level is equal to 1
                //         if (<?php echo $this->session->userdata('user_level'); ?> === '1') {
                //             var editButton = '<a href="<?php echo site_url('paket/edit/'); ?>' + row.id_paket + '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil"></span></a>';
                //             var deleteButton = '<a href="<?php echo site_url('paket/remove/'); ?>' + row.id_paket + '" class="btn bg-gradient-danger btn-sm"><span class="fa fa-trash"></span></a>';
                //             return editButton + ' ' + deleteButton;
                //         } else {
                //             return '';
                //         }
                //     }
                // },
                {
                    data: null,
                    className: 'td-column-right',
                    render: function(data, type, row) {
                        if (<?php echo $this->session->userdata('user_level'); ?> == '1') {
                            var editButton = '<a href="<?php echo site_url('keberangkatan/edit/'); ?>' + row.id_keberangkatan + '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil"></span></a>';
                            var deleteButton = '<a href="<?php echo site_url('keberangkatan/remove/'); ?>' + row.id_keberangkatan + '" class="btn bg-gradient-danger btn-sm"><span class="fa fa-trash"></span></a>';
                            var deactiveButton = '<a href="<?php echo site_url('keberangkatan/deactivate/'); ?>' + row.id_keberangkatan + '" class="btn bg-gradient-warning btn-sm"><span class="fa fa-times"></span></a>';
                            return editButton + ' ' + deleteButton + ' ' + deactiveButton;
                        } else {
                            return '';
                        }
                    }
                },

            ],
            "order": [
                [1, 'asc']
            ] // Menyortir berdasarkan kolom dengan indeks 1 (kolom is_aktif) secara descending (nilai 1 akan berada di atas)
        });
    });
</script>