<?php

include 'components/connect.php';

session_start();

if(isset($_SESSION['user_id'])){
   $user_id = $_SESSION['user_id'];
}else{
   $user_id = '';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>about</title>

   <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />

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
   <h3>Tentang Kami</h3>
   <p><a href="home.php">beranda</a> <span> / tentang kami</span></p>
</div>

<!-- about section starts  -->

<section class="about">

   <div class="row">

      <div class="image">
         <img src="project images/galura.jpeg" alt="">
      </div>

      <div class="content">
         <h3>Tentang Kami</h3>
         <p>Tim Galura merupakan mahasiswa/i yang sedang mengikuti
program magang pada Kampus Merdeka yaitu Magang
dan Studi Independen Bersertifikat pada program Gerakan Nasional
1000 Startup Digital - Hybrid Jawa Barat dari Direktorat
Jenderal Aplikasi Kementerian Komunikasi dan Informatika.</p>

<div class="content">
         <p>Kami membangun Startup Digital yang terfokus pada Healthy Food yang
bergerak dalam bidang jasa dan pelayanan untuk
membantu UMKM lokal yaitu Catering Healthy Food
baik di Kota Tasikmalaya dan Kabupaten Bandung
 yang masih belum banyak orang tahu mengenai Catering Healthy
Food, oleh
karena
itu Do Fit
hadir
untuk
mengenalkan dan menjadi media informasi juga
promosi Catering Healthy Food.</p>
         
      </div>

      </div>

   </div>



</section>

<!-- about section ends -->



<!-- reviews section starts  -->

<section class="reviews">

   <h1 class="title">Review Pelanggan!</h1>

   <div class="swiper reviews-slider">

      <div class="swiper-wrapper">

         <div class="swiper-slide slide">
            <img src="project images/1r.png" alt="">
            <p>Dulu, saya sering merasa lelah di siang hari. Sekarang, dengan diet makanan sehat, saya memiliki energi sepanjang hari. </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>putri</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="project images/2r.png" alt="">
            <p>Overall, saya sangat senang dengan pengalaman saya menjalani healthy food diet. </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>aji</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="project images/3r.png" alt="">
            <p>Saya harus belajar mempersiapkan makanan sendiri lebih sering dan menahan diri untuk tidak jajan sembarangan.  </p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>septyan</h3>
         </div>


         <div class="swiper-slide slide">
            <img src="project images/4r.png" alt="">
            <p>Selain berat badan yang perlahan turun, saya juga merasa lebih sehat secara keseluruhan.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>sausan</h3>
         </div>

         <div class="swiper-slide slide">
            <img src="project images/5r.png" alt="">
            <p>Bagi Anda yang sedang mencari cara untuk hidup lebih sehat, saya highly recommend untuk mencoba healthy food diet.</p>
            <div class="stars">
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star"></i>
               <i class="fas fa-star-half-alt"></i>
            </div>
            <h3>deden</h3>
         </div>

      </div>

      <div class="swiper-pagination"></div>

   </div>

</section>

<!-- reviews section ends -->



















<!-- footer section starts  -->
<?php include 'components/footer.php'; ?>
<!-- footer section ends -->=






<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="js/script.js"></script>

<script>

var swiper = new Swiper(".reviews-slider", {
   loop:true,
   grabCursor: true,
   spaceBetween: 20,
   pagination: {
      el: ".swiper-pagination",
      clickable:true,
   },
   breakpoints: {
      0: {
      slidesPerView: 1,
      },
      700: {
      slidesPerView: 2,
      },
      1024: {
      slidesPerView: 3,
      },
   },
});

</script>

</body>
</html>