@extends('layouts.outer')
@section('content')

<main id="main">
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-7">
                    <div class="owl-carousel portfolio-details-carousel">
                        @foreach ($photos as $photo)
                            <div class="carousel-item">
                                <img style="max-height: 400px" src="{{ asset('storage/uploads')."/".$photo }}" class="img-fluid" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="portfolio-info">
                        <h3>Informação do Objeto</h3>
                        <ul>
                            <li><strong>Nome</strong>: {{ $objeto->object_type }}</li>
                            <li><strong>Sala encontrada</strong>: {{ $objeto->classroom->designation }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->

<script>
    let slideIndex = 1;
    showSlides(slideIndex);

    function plusSlides(n) {
      showSlides(slideIndex += n);
    }

    function currentSlide(n) {
      showSlides(slideIndex = n);
    }

    function showSlides(n) {
      let i;
      let slides = document.getElementsByClassName("mySlides");
      let dots = document.getElementsByClassName("dot");
      if (n > slides.length) {slideIndex = 1}
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
      }
      for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
      }
      slides[slideIndex-1].style.display = "block";
      dots[slideIndex-1].className += " active";
    }
    </script>

@endsection
