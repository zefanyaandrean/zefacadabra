

<html>

      <head><title>Enkripsi</title></head>

<body>

      <!-- <FORM ACTION="proses02.php" METHOD="POST" NAME="input">

               <h2>Pilih Jurusan Anda :</h2>

               <input type="radio" name="jurusan" value="TI" checked>

               Teknik Informatika<br>

               <input type="radio" name="jurusan" value="SI"> Sistem

               Informasi<br>

               <input type="radio" name="jurusan" value="SK"> Sistem

               Komputer<br>

               <input type="radio" name="jurusan" value="KA">

               Komputerisasi Akuntansi<br>

              <input type="submit" name="Pilih" value="Pilih">

     </FORM> -->
      <form action="" method="POST" name="input">

            Input Text Anda : <br>
            Plain Text 1 : <input type="text" name="nama"><br><br>
            <!-- Plain Text 2 : <input type="text" name="nama"><br><br>
            Plain Text 3 : <input type="text" name="nama"><br> -->
            <h4><select name="algoritma" value="Pilih Algoritma HASH">
                <option value="MHASH_SHA512" name="MHASH_SHA512" value="SHA512">MHASH_SHA512</option>
                <option value="MHASH_SHA1" name="MHASH_SHA1" value="SHA1">MHASH_SHA1</option>
                </select>
            <input type="submit" name="submit1" value="Proses">
            <!-- <input type="submit" name="submit2" value="Proses SHA512"> -->
            <input type="reset" name="reset" value="Hapus"><br>
      </form>
      <?php
            if (isset($_POST['submit1'])) {
              include_once('config.php');
              // $result = mysqli_query($mysqli, "INSERT INTO Table01(dataplaintext, datachipertext) VALUES('$nama','$nama1')");

            // $rumus1 = $_POST['MHASH_SHA1'];  
                $rumus = $_POST['algoritma']; 
                if ($rumus == "MHASH_SHA1") {
                $nama = $_POST['nama']; 
                $nama1 = hash('sha1',($_POST['nama']));
                $result = mysqli_query($mysqli, "INSERT INTO Table01(dataplaintext, datachipertext) VALUES('$nama','$nama1')");
                // $sql = $db->query("INSERT INTO Table01 (dataplaintext, datachipertext) VALUES ('$nama', '$nama1') ");
                echo "Hasil Enkripsi dengan MHASH_SHA1 :<br>";
                echo "Jumlah Key = +40";
                echo "<h4>$nama1</h4>";

              }
            }
            if (isset($_POST['submit1'])) {
            // $rumus1 = $_POST['MHASH_SHA1'];  
                $rumus = $_POST['algoritma'];
                if ($rumus == "MHASH_SHA512") {
                $nama = $_POST['nama'];  
                $nama1 = hash('sha512',($_POST['nama']));
                $result = mysqli_query($mysqli, "INSERT INTO Table01(dataplaintext, datachipertext) VALUES('$nama','$nama1')"); 
                // $sql = $db->query("INSERT INTO Table01 (dataplaintext, datachipertext) VALUES ('$nama', '$nama1') ");
                echo "Hasil Enkripsi dengan MHASH_SHA512 :<br>";
                echo "Jumlah Key = +128";
                echo "<h4>$nama1</h4>";
                
              }
            }

            // if (isset($_POST['submit'])) {
            // $MHASH_SHA512 = $_POST['MHASH_SHA512'];
            // echo "<h4>$MHASH_SHA512</h4>";
            // }
      ?>



</body>

</html>