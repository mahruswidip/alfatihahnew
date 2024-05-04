<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <div class="d-flex align-items-center">
                        <h6>Detail Pendaftar</h6>
                        <!-- <a href="<?php echo site_url('pendaftar/add'); ?>" class="btn bg-gradient-primary btn-sm ms-auto"><span class="fa fa-plus">&nbsp</span> Tambah</a> -->
                    </div>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="table-responsive p-4">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th scope="row">NIK</th>
                                    <td><?php echo $pendaftar['nik']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nama Pendaftar</th>
                                    <td><?php echo $pendaftar['nama_pendaftar']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Jenis Kelamin</th>
                                    <td><?php echo $pendaftar['jenis_kelamin']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Email</th>
                                    <td><?php echo $pendaftar['email']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Nomor Telepon</th>
                                    <td><?php echo $pendaftar['nomor_telepon']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Alamat</th>
                                    <td><?php echo $pendaftar['alamat']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Pesan Apa</th>
                                    <td><?php echo $pendaftar['pesan_apa']; ?></td>
                                </tr>
                                <tr>
                                    <th scope="row">Berapa Orang</th>
                                    <td><?php echo $pendaftar['berapa_orang']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="p-4">
                        <h6>Form Tambah Berapa Orang</h6>
                        <form method="post"
                            action="<?php echo site_url('pendaftar/simpan_data_berapa_orang/' . $pendaftar['id_pendaftar']); ?>">
                            <div id="tambah_berapa_orang">
                                <!-- Konten form berapa orang akan ditambahkan di sini -->
                            </div>
                            <button type="button" class="btn btn-outline-primary" onclick="tambahInput()">Tambah
                                Orang</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Include jQuery and DataTables libraries -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    // Fungsi untuk menambahkan input field berapa orang
    function tambahInput() {
        var div = document.createElement('div');
        div.innerHTML = '<div class="form-group"><label>Nama Orang</label><input type="text" class="form-control" name="nama_orang[]"></div>';
        document.getElementById('tambah_berapa_orang').appendChild(div);
    }
</script>

<!-- DataTable initialization with AJAX -->