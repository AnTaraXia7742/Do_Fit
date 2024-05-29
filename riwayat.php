<?php

include 'components/connect.php';

session_start();

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';

if(empty($user_id)){
    echo '<script>alert("Silakan login atau register terlebih dahulu!")</script>';
    echo '<script>window.location.href="login.php"</script>';
    exit;
}

if(isset($_POST['send'])){

   $nama = $_POST['nama'];
   $nama = filter_var($nama, FILTER_SANITIZE_STRING);
   $usia = intval($_POST['usia']);
   $jenkel = $_POST['jenkel'];
   $jenkel = filter_var($jenkel, FILTER_SANITIZE_STRING);
   $tb = intval($_POST['tb']);
   $bb = intval($_POST['bb']);
   $goals = $_POST['goals'];
   $goals = filter_var($goals, FILTER_SANITIZE_STRING);
   $alergi = $_POST['alergi'];
   $alergi = filter_var($alergi, FILTER_SANITIZE_STRING);
   $riwayat = $_POST['riwayat'];
   $riwayat = filter_var($riwayat, FILTER_SANITIZE_STRING);

   $select_message = $conn->prepare("SELECT * FROM `asesmen` WHERE nama = ? AND usia = ? AND jenkel = ? AND tb = ? AND bb = ? AND goals = ? AND alergi = ? AND riwayat = ?");
   $select_message->execute([$nama, $usia, $jenkel, $tb, $bb, $goals, $alergi, $riwayat]);

   if($select_message->rowCount() > 0){
      $message[] = 'pesan sudah terkirim!';
   }else{

      $insert_message = $conn->prepare("INSERT INTO `asesmen`(user_id, nama, usia, jenkel, tb, bb, goals, alergi, riwayat) VALUES(?,?,?,?,?,?,?,?,?)");
      $insert_message->execute([$user_id, $nama, $usia, $jenkel, $tb, $bb, $goals, $alergi, $riwayat]);

      $message[] = 'pesan terkirim sukses!';

   }

}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // process the form data here
    $nama = $_POST["nama"];
    $usia = $_POST["usia"];
    $jenkel = $_POST["jenkel"];
    $tb = $_POST["tb"];
    $bb = $_POST["bb"];
    $goals = $_POST["goals"];
    $alergi = $_POST["alergi"];
    $riwayat = $_POST["riwayat"];

    // do something with the form data here
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>riwayat</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

</head>
<body>
   
<!-- header section starts  -->
<?php include 'components/user_header.php'; ?>
<!-- header section ends -->

<div class="heading">
   <h3>riwayat</h3>
   <p><a href="home.php">beranda</a> <span> / riwayat</span></p>
</div>

<!-- riwayat section starts  -->

<section class="riwayat">

   <div class="row">

      <div class="image">
         <img src="project images/asesmen.png" alt="">
      </div>

         <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <h3>Asesmen Kesehatan!</h3>
      <input type="text" name="nama" maxlength="50" class="box" placeholder="Masukan Nama" required>
      <input type="number" name="usia" min="0" max="9999999999" class="box" placeholder="Usia" required maxlength="10">
      <select name="jenkel" class="box" onchange="checkSelect(this)">
         <option value="">Jenis Kelamin</option>
         <option value="laki-laki">Laki-laki</option>
         <option value="perempuan">Perempuan</option>
      </select>
      <input type="number" name="tb" min="0" max="9999999999" class="box" placeholder="Masukan Tinggi Badan" required maxlength="10">
      <input type="number" name="bb" min="0" max="9999999999" class="box" placeholder="Masukan Berat Badan" required maxlength="10">
      <input type="text" name="goals" maxlength="100" class="box" placeholder="Masukan Berat Badan ideal mu!" required>
      <input type="text" name="alergi" maxlength="100" class="box" placeholder="Alergi" required>
      <textarea name="riwayat" class="box" required placeholder="Masukan Riwayat Medis-mu!" maxlength="500" cols="30" rows="10"></textarea>
      <input type="submit" value="kirim pesan" name="send" class="btn">
   </form>


   </div>

</section>

<!-- riwayat section ends -->










<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->








<!-- custom js file link  -->
<script src="js/script.js"></script>
<script>
function checkSelect(selectElement) {
    if (selectElement.value === '') {
        selectElement.setCustomValidity('Please select a gender');
    } else {
        selectElement.setCustomValidity('');
    }
}
</script>

</body>
</html>