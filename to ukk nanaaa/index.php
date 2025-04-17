<?php include 'koneksi.php'; include 'header.php'; ?>

<div class="container mt-4">
    <h2 class="text-center mb-4 text-primary">📦 Daftar Barang</h2>

    <div class="table-responsive shadow-sm p-3 mb-5 bg-white rounded">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-info text-center">
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT barang.*, kategori.nama_kategori FROM barang 
                        JOIN kategori ON barang.id_kategori = kategori.id_kategori";
                $result = $koneksi->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td class='text-center'>{$row['id_barang']}</td>
                                <td>{$row['nama_barang']}</td>
                                <td>{$row['nama_kategori']}</td>
                                <td class='text-center'>{$row['jumlah_stok']}</td>
                                <td>Rp " . number_format($row['harga_barang'], 0, ',', '.') . "</td>
                                <td>" . date('d M Y', strtotime($row['tanggal_masuk'])) . "</td>
                                <td class='text-center'>
                                    <a href='edit_barang.php?id={$row['id_barang']}' class='btn btn-sm btn-outline-warning me-1'>✏️ Edit</a>
                                    <a href='hapus_barang.php?id={$row['id_barang']}' class='btn btn-sm btn-outline-danger' onclick=\"return confirm('Yakin ingin menghapus barang ini?')\">🗑️ Hapus</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7' class='text-center text-muted'>Belum ada data barang.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>