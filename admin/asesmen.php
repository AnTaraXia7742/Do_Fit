<?php

include '../components/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
}

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `asesmen` WHERE id =?");
   $delete_message->execute([$delete_id]);
   header('location:asesmen.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>asesmen</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php'?>

<!-- asesmen section starts  -->

<section class="asesmen">

   <h1 class="heading">asesmen</h1>

   <div class="box-container">

   <?php
      $select_asesmen = $conn->prepare("SELECT * FROM `asesmen`");
      $select_asesmen->execute();
      if($select_asesmen->rowCount() > 0){
         while($fetch_asesmen = $select_asesmen->fetch(PDO::FETCH_ASSOC)){
            // Convert tb to centimeters
            $tb_cm = $fetch_asesmen['tb'] ;
            // Convert bb and goals to kilograms
            $bb_kg = $fetch_asesmen['bb'] ;
            $goals_kg = $fetch_asesmen['goals'] ;
  ?>
   <div class="box">
      <p> nama : <span><?= $fetch_asesmen['nama'];?></span> </p>
      <p> usia : <span><?= $fetch_asesmen['usia'];?></span> </p>
      <p> jenis kelamin : <span><?= $fetch_asesmen['jenkel'];?></span> </p>
      <p> tinggi badan : <span><?= number_format($tb_cm, 2);?> cm</span> </p> <!-- Display tb in centimeters -->
      <p> berat badan : <span><?= number_format($bb_kg, 2);?> kg</span> </p> <!-- Display bb in kilograms -->
      <p> berat badan ideal : <span><?= number_format($goals_kg, 2);?> kg</span> </p> <!-- Display goals in kilograms -->
      <p> alergi : <span><?= $fetch_asesmen['alergi'];?></span> </p>
      <p> riwayat : <span><?= $fetch_asesmen['riwayat'];?></span> </p>
      <a href="asesmen.php?delete=<?= $fetch_asesmen['id'];?>" class="delete-btn" onclick="return confirm('hapus asesmen ini?');">hapus</a>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no asesmen</p>';
      }
  ?>

   </div>

</section>