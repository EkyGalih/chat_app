<!DOCTYPE html>
<html>
<body>
    <?php
    require 'koneksi.php';
    function jawaban($tipe, $no) {
        switch ($tipe) {
            case 1 :
            ?>
            <input type="radio" name="<?php echo $no; ?>tipe1" value="sangat_baik" required>  Sangat Baik
            <input type="radio" name="<?php echo $no; ?>tipe1" value="baik" required>  Baik
            <input type="radio" name="<?php echo $no; ?>tipe1" value="cukup" required>  Cukup
            <input type="radio" name="<?php echo $no; ?>tipe1" value="kurang" required>  Kurang
            <input type="radio" name="<?php echo $no; ?>tipe1" value="sangat_kurang" required>  Sangat Kurang
            <?php
            break;
            case 2 :
            ?>
            <input type="radio" name="<?php echo $no; ?>tipe2" value="sangat_sering" required>  Sangat Sering
            <input type="radio" name="<?php echo $no; ?>tipe2" value="sering" required>  Sering
            <input type="radio" name="<?php echo $no; ?>tipe2" value="biasa" required>  Biasa
            <input type="radio" name="<?php echo $no; ?>tipe2" value="jarang" required>  Jarang
            <input type="radio" name="<?php echo $no; ?>tipe2" value="sangat_jarang" required>  Sangat Jarang
            <?php
            break;
            case 3 :
            ?>
            <input type="radio" name="<?php echo $no; ?>tipe3" value="ya" required>  Ya 
            <input type="radio" name="<?php echo $no; ?>tipe3" value="tidak" required>  Tidak
            <?php
            break;
            case 4 :
            ?>
            <textarea class="form-control" name="<?php echo $no; ?>tipe4" required></textarea>
            <?php
            break;
        }
    }

    function generate_password() {
        $chars = "abcdefghijklmnopqrstuvwxyz0123456789";
        $password = substr(str_shuffle($chars), 0, 6);
        return $password;
    }

    function bersih_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    function tampiluser($hasil, $id) {
        ?>
        <table class='table table-hover'>
            <tr>
                <th style='text-align:center;' colspan='3'><?php echo $id; ?></th>
            </tr>
            <?php while ($row = $hasil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row[$id]; ?></td>
                <td class="kolom_nomor">
                    <form action='edit_user.php' method='post'>
                        <input type='hidden' value="<?php echo $row[$id]; ?>" name='id'>
                        <input type='hidden' value='$id' name='identifier'>
                        <button class='btn btn-success' data-loading-text='..' type='submit' name='edit' value='edit'><i class='glyphicon glyphicon-pencil'></i></button>
                    </form>
                </td>
                <td class="kolom_nomor">
                    <form action='proses_hapus_user.php' method='get'>
                        <input type='hidden' value="<?php echo $row[$id]; ?>" name='id'>
                        <input type='hidden' value="<?php echo $id; ?>" name='identifier'>
                        <button class='btn btn-warning' value='hapus' onclick="return confirm('\n\
                            <?php
                            if ($id == nip) {
                                echo "Pengajar dari Mata Kuliah yang sedang dipegang akan kosong !";
                            } else if ($id == nim) {
                                echo "Data KRS mahasiswa akan terhapus juga !";
                            } else {
                                echo "Hapus user ?";
                            }
                            ?>');" type='submit' name='hapus'><i class='glyphicon glyphicon-trash'></i></button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <?php
    }
    

    function tampil_soal($hasil_query) {
        ?>
        <script src="dist/js/script.js"></script>
        <table class="table table-hover">
            <tr class="info">
                <th class="kolom_nomor">Kode</th>
                <th>Soal</th>
                <th class="kolom_nomor">Tipe</th>
                <th class="kolom_nomor">Edit</th>
                <th class="kolom_nomor">Hapus</th>
            </tr>
            <?php
            while ($baris = $hasil_query->fetch_assoc()) {
                ?>
                <tr>
                    <td class="kolom_nomor"><?php echo $baris['kode_soal'] ?></td>
                    <td><?php echo $baris['soal'] ?></td>
                    <td class="kolom_nomor"><?php echo $baris['tipe'] ?></td>
                    <td class="kolom_nomor">
                        <form class="form-horizontal" action="edit_soal.php" method="get">
                            <input type="hidden" name="kode_soal" value="<?php echo $baris['kode_soal']; ?>">
                            <button type="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i></button>
                        </form>
                    </td>
                    <td class="kolom_nomor">
                        <form action="proses_hapus_soal.php" method="post">
                            <input type="hidden" name="kode_soal" value="<?php echo $baris['kode_soal']; ?>">
                            <input type="hidden" name="tipe" value="<?php echo $baris['tipe']; ?>">
                            <button type="submit" name="submit" onclick="return confirm('Data jawaban dari soal ini akan terhapus.\n\Lanjut ?');" class="btn btn-warning"><i class="glyphicon glyphicon-trash"></i></button>
                        </form>
                    </td>
                </tr>
                <?php }
                ?>
            </table>
            <?php
        }

        function persen($persentase, $kelas) {
            ?>
            <script>
                $(document).ready(function () {
                    $('.<?php echo $kelas; ?>').ClassyLoader({
                        width: 140, // width of the loader in pixels
                        height: 140, // height of the loader in pixels
                        animate: true, // whether to animate the loader or not
                        displayOnLoad: true,
                        percentage: <?php echo $persentase; ?>, // percent of the value, between 0 and 100
                        speed: 1, // miliseconds between animation cycles, lower value is faster
                        roundedLine: false, // whether the line is rounded, in pixels
                        showRemaining: true, // how the remaining percentage (100% - percentage)
                        fontFamily: 'Helvetica', // name of the font for the percentage
                        fontSize: '25px', // size of the percentage font, in pixels
                        showText: true, // whether to display the percentage text
                        diameter: 60, // diameter of the circle, in pixels
                        fontColor: 'blue', // color of the font in the center of the loader, any CSS color would work, hex, rgb, rgba, hsl, hsla
                        lineColor: 'green', // line color of the main circle
                        remainingLineColor: 'rgba(55, 55, 55, 0.4)', // line color of the remaining percentage (if showRemaining is true)
                        lineWidth: 3 // the width of the circle line in pixels
                    });
});
</script>
<?php
}

function ranking($kode_mk) {
    $poin = 0;$total=0;
    global $koneksi;
    $q1 = $koneksi->query("SELECT * FROM soal_tipe_1 WHERE kode_mata_kuliah = '$kode_mk'");
    $q2 = $koneksi->query("SELECT * FROM soal_tipe_2 WHERE kode_mata_kuliah = '$kode_mk'");
    $q3 = $koneksi->query("SELECT * FROM soal_tipe_3 WHERE kode_mata_kuliah = '$kode_mk'");
    while ($r1 = $q1->fetch_assoc()) {
        $poin += (($r1['sangat_baik'] * 5) + ($r1['baik'] * 4) + ($r1['cukup'] * 3) + ($r1['kurang'] * 2) + $r1['sangat_kurang']);
        $total += ($r1['sangat_baik'] + $r1['baik'] + $r1['cukup'] + $r1['kurang'] + $r1['sangat_kurang']);
    }
    while ($r2 = $q2->fetch_assoc()) {
        $poin += (($r2['sangat_sering'] * 5) + ($r2['sering'] * 4) + ($r2['biasa'] * 3) + ($r2['jarang'] * 2) + $r2['sangat_jarang']);
        $total += ($r2['sangat_sering'] + $r2['sering'] + $r2['biasa'] + $r2['jarang'] + $r2['sangat_jarang']);
    }
    while ($r3 = $q3->fetch_assoc()) {
        $poin += (($r3['ya'] * 5) + ($r3['tidak'] * 0));
        $total += ($r3['ya'] + $r3['tidak']);
    }
    $total *= 5;
    $persen = ($poin * 100)/$total;
    if($persen > 0 && $persen <= 20){$ranking = "E";}
    else if($persen >= 21 && $persen <= 40){$ranking = "D";}
    else if($persen >= 41 && $persen <= 60){$ranking = "C";}
    else if($persen >= 61 && $persen <= 80){$ranking = "B";}
    else if($persen >= 81 && $persen <= 100){$ranking = "A";}
    else {
        $ranking = "Belum ada suara";
    }
    return $ranking;
}
?>
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="dist/jquery-1.11.1.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
</body>
</html>
