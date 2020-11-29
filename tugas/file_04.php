<html>

  <head><title>Pengelolaan Form</title></head>

  <body>

         <form action="" method="POST" name="input">

            Input Variabel Keyword : <input type="text" name="nama5"><br>
            Input Variabel Plaintext : <input type="text" name="nama1"><br>
            <!-- <h4><select name="algoritma" value="Pilih Algoritma HASH">
                <option value="MHASH_SHA512" name="MHASH_SHA512" value="SHA512">MHASH_SHA512</option>
                <option value="MHASH_SHA1" name="MHASH_SHA1" value="SHA1">MHASH_SHA1</option>
                </select> -->
            <input type="submit" name="submit" value="Input"><br>

         </form>
        <?php
            if (isset($_POST['submit'])) {
              include_once('config.php');
            // $rumus1 = $_POST['MHASH_SHA1'];  
                // $rumus = $_POST['algoritma'];
                // if ($rumus == "MHASH_SHA1") {
                $nama = $_POST['nama1'];
                $key = $_POST['nama5'];
                $method = 'aes-128-cbc';
                $iv = substr(hash('sha1', $nama), 0, 16); 
                // $nama1 = hash('sha1',($_POST['nama1']));
                // $nama5 = $_POST['nama5'];
                // $sql = 'select dataplaintext, datachipertext from Table01';
                // $query = mysqli_query($conn, $sql);
                $result = mysqli_query($mysqli, "select keyword, dataplaintext, datachipertext from Table02 where keyword=$key");
                $row = mysqli_fetch_array($result);
                // while($data = mysqli_fetch_array($query_mysql)) {
                  $output = openssl_decrypt($row['datachipertext'], $method, $key, 0, $iv);  
                // }
                echo "Plaintext yang dikirim dari Form          : ". $nama. "<br>";
                echo "Hasil Dekripsi Chipertext dari Database   : ". $output. "<p>";

                if($nama == $output) {
                echo "Berhasil!<br>";
                echo "Plaintext yang dikirimkan SAMA dengan Chipertext dari database yang didecrypt";
                }
                else
                {
                echo "Gagal!<br>";
                echo "Plaintext yang dikirimkan TIDAK SAMA dengan Chipertext dari database yang didecrypt";
                }
              }
              // }
              // if ($nama1 == $row['datachipertext']) {
              //   echo "CHIPER TEXT YANG ADA DI DATABASE SAMA!! CONGRATS";
              // }
            
            // if (isset($_POST['submit'])) {
            // // $rumus1 = $_POST['MHASH_SHA1'];  
            //     $rumus = $_POST['algoritma'];
            //     if ($rumus == "MHASH_SHA512") {
            //     $nama = $_POST['nama1'];  
            //     $nama1 = hash('sha512',($_POST['nama1']));
            //     $nama5 = $_POST['nama5'];
            //     $result = mysqli_query($mysqli, "select id, dataplaintext, datachipertext from Table01 where id=$nama5");
            //     $row = mysqli_fetch_array($result);
            //     echo "Data yang ada pada Database: <br>";
            //     echo 'dataplaintext: '.$row['dataplaintext'].  ' & datachipertext: '.$row['datachipertext']. '<br>', '<br>';
            //     // $result = mysqli_query($mysqli, "INSERT INTO Table01(dataplaintext, datachipertext) VALUES('$nama','$nama1')"); 
            //     // $sql = $db->query("INSERT INTO Table01 (dataplaintext, datachipertext) VALUES ('$nama', '$nama1') ");
            //     echo "Hasil Enkripsi dengan MHASH_SHA512 :<br>";
            //     echo "Kalimat Plaintext = $nama <br>";
            //     echo "Jumlah Key = +128";
            //     echo "<h4>$nama1</h4>";
                
            //   }
            //   if ($nama1 == $row['datachipertext']) {
            //     echo "CHIPER TEXT YANG ADA DI DATABASE SAMA!! CONGRATS";
            //   } else {
            //     echo "CHIPER TEXT YANG ADA DI DATABASE BERBEDA :(";
            //   }

            // }

            // if (isset($_POST['submit'])) {
            // $MHASH_SHA512 = $_POST['MHASH_SHA512'];
            // echo "<h4>$MHASH_SHA512</h4>";
            // }
      ?>

  </body>

</html>



