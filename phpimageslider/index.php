<?php require 'function.php'; ?>
<html>
  <head>
  </head>
  <style>
    *{
      margin: 0px;
      padding: 0px;
      box-sizing: border-box;
    }

    body{
      display: flex;
      justify-content: center;
      align-items: center;
      background: #eaeaea;
    }

    .slides{
      width: 80%;
      position: relative;
    }

    .slides .slide img{
      width: 60%;
      animation-name: fade;
      animation-duration: 1s;
    }

    .slides .navigation{
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%,-50%);
      display: flex;
      justify-content: space-between;
      width: 100%;
    }

    .slides .navigation .prev, .slides .navigation .next{
      cursor: pointer;
      padding: 16px;
      font-weight: bold;
      font-size: 20px;
      color: white;
      background: rgba(0,0,0,0.2);
      user-select: none;
      transition: 0.6s ease;
    }

    .slides .navigation .prev:hover, .slides .navigation .next:hover{
      background: rgba(0,0,0,1);
    }

    @keyframes fade{
      from {
        opacity: 0.6;
      }
      to {
        opacity: 1;
      }
    }
  </style>
  <body>
    <div class="slides">
      <?php
      $images = mysqli_query($conn, "SELECT * FROM images");
      foreach($images as $image) :
      ?>
      <div class="slide">
        <img src="uploads/<?php echo $image['image']; ?>">
      </div>
      <?php endforeach; ?>
      <div class="navigation">
        <a class = "prev" onclick = "plusSlides(-1)">&#10094;</a>
        <a class = "next" onclick = "plusSlides(+1)">&#10095;</a>
      </div>
    </div>

    <script>
      var slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
        showSlides(slideIndex += n);
      }

      function showSlides(n) {
        var i;
        var slides = document.getElementsByClassName("slide");
        if (n > slides.length)
        {
          slideIndex = 1;
        }
        if (n < 1)
        {
          slideIndex = slides.length;
        }
        for (i = 0; i < slides.length; i++)
        {
          slides[i].style.display = "none";
        }
        slides[slideIndex-1].style.display = "block";
      }
    </script>
  </body>
</html>
