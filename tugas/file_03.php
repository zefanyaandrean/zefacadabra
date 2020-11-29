<?php
// *Koneksi database* //
// error_reporting(0);
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"enkripsikripto") or die(mysqli_error());
?>

<html>
 <head><title>FORM C</title></head>
 <body>
  <FORM ACTION="" METHOD="POST" NAME="input">
   <h3>FORM C</h3>
   
   <p>
   Plain Text : <input type="text" name="plaintext" value=""><br>
   <p>
   Key : <input type="text" name="key" value=""><br>
   <p>
   <input type="submit" name="proses" value="Submit">
  </FORM>

  <table border="1" class="table">
    <tr>
      <th>ID</th>
      <th>Keyword</th>
      <th>Plain Text</th>
      <th>Chiper Text</th>
      
    </tr>
    <?php
    $query_mysql = mysqli_query($conn,"SELECT * FROM Table02")or die(mysqli_error());
    while($data = mysqli_fetch_array($query_mysql)) {
      ?>
      <tr>
        <td><?php echo $data['id']; ?></td>
        <td><?php echo $data['keyword']; ?></td>
        <td><?php echo $data['dataplaintext']; ?></td>
        <td><?php echo $data['datachipertext']; ?></td>
        
      </tr>
    <?php } ?>
  </table>
 
 </body>
</html>

<?php
// *Input Data ke Database* //

if(isset($_POST['proses']))
{
  $plaintext = $_POST['plaintext'];
  $key = $_POST['key'];

  $method = 'aes-128-cbc';
  $iv = substr(hash('sha1', $plaintext), 0, 16);

  $output = openssl_encrypt($plaintext, $method, $key, 0, $iv);
  

  mysqli_query($conn, "INSERT INTO Table02 (keyword, dataplaintext, datachipertext) VALUES('$key', '$plaintext','$output')");
}


?>