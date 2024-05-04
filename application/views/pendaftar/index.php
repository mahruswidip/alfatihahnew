<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Pendaftar</h6>
                        <!-- <a href="<?php echo site_url('pendaftar/add'); ?>" class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span> Tambah</a> -->
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table id="dataTablePendaftar" class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK
                                    </th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nama Pendaftar</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Pesan Apa</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Rencana Jumlah Orang</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Nomor Telepon</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Email</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Aksi</th>
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
    #dataTablePendaftar {
        height: 300px !important;
    }
</style>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<!-- DataTable initialization with AJAX -->
<script type="text/javascript">
    $(document).ready(function () {
        $('#dataTablePendaftar').DataTable({
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.5/i18n/Indonesian.json",
                "paginate": {
                    "previous": "<",
                    "next": ">"
                },
            },
            "pageLength": 10,
            ajax: {
                url: '<?php echo base_url("pendaftar/view"); ?>',
                type: 'POST',
                dataSrc: ''
            },
            columns: [{
                data: 'null',
                render: function (data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.id_pendaftar + '</p>';
                },
            },
            {
                data: 'null',
                render: function (data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.nik + '</p>';
                },
            },
            {
                data: 'null',
                render: function (data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.nama_pendaftar + '</p>';
                },
            },
            {
                data: 'null',
                render: function (data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.pesan_apa + '</p>';
                },
            },
            {
                data: 'null',
                render: function (data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.berapa_orang + '</p>';
                },
            },
            {
                data: 'null',
                render: function (data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.nomor_telepon + '</p>';
                },
            },
            {
                data: 'null',
                render: function (data, type, row) {
                    return '<p class="text-xs font-weight-bold mb-0">' + row.email + '</p>';
                },
            },
            {
                data: null,
                className: 'td-column-right',
                render: function (data, type, row) {
                    var deleteButton = '<a href="<?php echo site_url('pendaftar/remove/'); ?>' + row.id_pendaftar + '" class="btn bg-gradient-danger btn-sm"><span class="fa fa-trash"></span></a>';
                    var prosesbutton = '<a href="<?php echo site_url('pendaftar/detail_pendaftar/'); ?>' + row.id_pendaftar + '" class="btn bg-gradient-info btn-sm"><span class="fa fa-pencil"></span></a>';
                    // return editButton + ' ' + deleteButton + ' ' + deactiveButton;
                    return prosesbutton + ' ' + deleteButton;
                }
            },

            ],
            "order": [
                [0, 'desc']
            ] // Menyortir berdasarkan kolom dengan indeks 1 (kolom is_aktif) secara descending (nilai 1 akan berada di atas)
        });
    });
</script>