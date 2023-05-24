<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Style CSS Slick Slider-->
    <link rel="stylesheet" type="text/css" href="slick/slick.css">
    <link rel="stylesheet" type="text/css" href="slick/slick-theme.css">

    <!-- Bootstrap  Internal-->
    <link rel="stylesheet" href="../css/bootstrap.min.css"/>

    <!-- Font Google -->
    <link rel="stylesheet" href="../fonts/font-montserrat.css">

    {{-- Style CSS Eksternal--}}
    <link rel="stylesheet" href="../css/style.css">

    <!-- Logo tittle bar -->
    <link rel="icon" href="img/logoutama.png" type="image/x-icon">
    
    {{-- Icon Bootstrab --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  
    <title>RESEPEDIA | {{ $title }}</title>
  </head>
  <body>

    @if($title !== 'Login' && $title !== 'Register' )
      @include('partials.navbar') 
      <div class="height1">
    @else
      <div class="height2">
    @endif
        @yield('container')
      </div>

    <!-- Menyisipkan JQuery dan Javascript Bootstrap -->
    <script src="slick/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    {{-- JS Slick Slider --}}
    <script src="slick/slick.js" type="text/javascript" charset="utf-8"></script>
    
    <script type="text/javascript">
      $('textarea').on('input', function () {
        this.style.height = "";
        this.style.height = this.scrollHeight + "px";
      });
    </script>

    <script type="text/javascript">
      $(document).on('ready', function() {
        
        $(".regular").slick({
          dots: false,
          infinite: true,
          slidesToShow: 4,
          slidesToScroll: 1,
          arrows: true,
          prevArrow:"<img class='a-riht control-c prev slick-prev' src='img/arahkiri.png'>",
          nextArrow:"<img class='a-right control-c next slick-next' src='img/arahkanan.png'>",
          responsive: [
          {
            breakpoint: 1350,
            settings: {
              slidesToShow: 3,
              slidesToScroll: 1,
            }
          },
          {
            breakpoint: 1000,
            settings: {
              slidesToShow: 2,
              slidesToScroll: 1
            }
          },
          {
            breakpoint: 665,
            settings: {
              slidesToShow: 1,
              slidesToScroll: 1
            }
          }
          ]
        });
      });
    </script>

    <script>
      function previewImage(){
          const image = document.querySelector('#picture');
          const imgPreview = document.querySelector('.img-preview');

          imgPreview.style.display = 'block';

          const oFReader = new FileReader();
          oFReader.readAsDataURL(image.files[0]);

          oFReader.onload = function(oFREvent){
              imgPreview.src = oFREvent.target.result;
          }
      }  
    </script>
 
  </body>
</html>
    
