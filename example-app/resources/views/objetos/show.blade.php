@extends('layouts.outer')
@section('content')

<main id="main">
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-7 mt-5">
                    <div style="max-width: 300px">
                        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">

                                @foreach ($photos as $photo)
                                @if ($loop->index == 0)
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                                    aria-current="true" aria-label="Slide 1"></button>
                                @else
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $loop->index }}"
                                    aria-label="Slide 2"></button>
                                @endif
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach ($photos as $photo)
                                @if ($loop->index == 0)
                                    <div class="carousel-item active">
                                        <img src="{{ asset('storage/uploads')."/".$photo }}" class="d-block w-100" alt="1">
                                    </div>
                                @else
                                    <div class="carousel-item">
                                        <img src="{{ asset('storage/uploads')."/".$photo }}" class="d-block w-100" alt="1">
                                    </div>
                                @endif
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                                data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mt-5">
                    <div class="portfolio-info">
                        <h3>Informação do Objeto</h3>
                        <ul>
                            <li><strong>Nome</strong>: {{ $objeto->object_type }}</li>
                            <li><strong>Sala encontrada</strong>: {{ $objeto->classroom->designation }}</li>
                            <li><strong>Observações</strong>: {{ $objeto->observation }}</li>
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
