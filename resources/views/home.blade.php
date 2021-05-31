<title>DokanBari</title>

@extends('layouts.app')

@section('content')




<?php

   //echo $dt->format('F j, Y, g:i a');

   $dt = new DateTime('now', new DateTimezone('Asia/Dhaka'));

   $chm = $dt->format('Gi');
   $IntChm = (int)$chm;

   $t = $chm ."". $chm;
 //  $cmm = $dt->format('i');
  // $css = $dt->format('s');

 //  $aMpM = $dt->format('a');


 //  $IntCmm = (int)$cmm;

 //  $IntCss = (int)$css;

?>



<style>
.product-discount-label{
	display:block;
	padding:4px 15px 4px 30px;
	color:#fff;
	background-color:#0081c2e0;
	position:absolute;
	top:10px;
	right:0;
	-webkit-clip-path:polygon(34% 0,100% 0,100% 100%,0 100%);
	clip-path:polygon(34% 0,100% 0,100% 100%,0 100%);
	}
</style>


<!-- ======= About Section ======= -->
<section id="about" class="about">
  <div class="container" data-aos="fade-up">

    <div class="row">




                                    @foreach($shops->reverse() as $value_dt)

                                               @if ($value_dt->open_mm < 10)
                                                   <?php $open = $value_dt->open_hh ."0". $value_dt->open_mm; ?>
                                               @endif

                                               @if ($value_dt->close_mm < 10)
                                                   <?php $close = $value_dt->close_hh ."0". $value_dt->close_mm; ?>
                                               @endif

                                               @if ($value_dt->open_mm >= 10)
                                                   <?php $open = $value_dt->open_hh ."". $value_dt->open_mm; ?>
                                               @endif

                                               @if ($value_dt->close_mm >= 10)
                                                   <?php $close = $value_dt->close_hh ."". $value_dt->close_mm; ?>
                                               @endif


                                                @if ($open <= $IntChm && $close > $IntChm)

                                                            @if ($value_dt->category == 3 && $value_dt->s_status == "Accepted" && $value_dt->shop )









                                                                <div class="row">




                                                                  <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in" data-aos-delay="100">
                                                                    <div class="about-img">
                                                                      <a href="{{ route('customer.productsGet',$value_dt->id) }}"> <img src="{{$value_dt->s_banner}}" alt=""> </a><br>
                                                                    </div><br>
                                                                  </div>
                                                                  <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content">
                                                                    <input type="text" name="s_id" value="{{$value_dt->id}}" hidden>
                                                                    <h3>{{$value_dt->s_name}}</h3>
                                                                    <p class="fst-italic">
                                                                         Open: <?php echo $value_dt->open_hh; ?>-<?php echo $value_dt->open_mm; ?> Close: <?php echo $value_dt->close_hh; ?>-<?php echo $value_dt->close_mm; ?>
                                                                    </p>
                                                                  </div>





                                                                   </div>






                                                            @endif
                                                @endif



                                                @if ($open >= $IntChm && $close > $IntChm)

                                                        @if ($value_dt->category == 3 && $value_dt->s_status == "Accepted" && $value_dt->shop )
                                                            <div class="col-lg-4 col-md-6 mb-4">
                                                            <input type="text" name="s_id" value="{{$value_dt->id}}" hidden>
                                                                <div class="card h-100">
                                                                @if($value_dt->s_discount)
                                                                <span class="product-discount-label">{{$value_dt->s_discount}}% OFF</span>
                                                                @endif
                                                                <a href="{{ route('customer.productsGet',$value_dt->id) }}"><img class="card-img-top" src="{{$value_dt->s_banner}}" alt=""></a>

                                                                <div class="card-footer" style="background-color: #212529;">
                                                                    <small class="text-muted">{{$value_dt->s_name}} Open: <?php echo $value_dt->open_hh; ?>-<?php echo $value_dt->open_mm; ?> Close: <?php echo $value_dt->close_hh; ?>-<?php echo $value_dt->close_mm; ?>   </small>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        @endif
                                                @endif






                                            @endforeach








  </div>
</section><!-- End About Section -->

<!-- ======= Why Us Section ======= -->
<section id="why-us" class="why-us">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Why Us</h2>
      <p>Why Choose Our Restaurant</p>
    </div>

    <div class="row">

      <div class="col-lg-4">
        <div class="box" data-aos="zoom-in" data-aos-delay="100">
          <span>01</span>
          <h4>Lorem Ipsum</h4>
          <p>Ulamco laboris nisi ut aliquip ex ea commodo consequat. Et consectetur ducimus vero placeat</p>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in" data-aos-delay="200">
          <span>02</span>
          <h4>Repellat Nihil</h4>
          <p>Dolorem est fugiat occaecati voluptate velit esse. Dicta veritatis dolor quod et vel dire leno para dest</p>
        </div>
      </div>

      <div class="col-lg-4 mt-4 mt-lg-0">
        <div class="box" data-aos="zoom-in" data-aos-delay="300">
          <span>03</span>
          <h4> Ad ad velit qui</h4>
          <p>Molestiae officiis omnis illo asperiores. Aut doloribus vitae sunt debitis quo vel nam quis</p>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Why Us Section -->





<!-- ======= Events Section ======= -->
<section id="events" class="events">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Events</h2>
      <p>Organize Your Events in our Restaurant</p>
    </div>

    <div class="events-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
      <div class="swiper-wrapper">

        <div class="swiper-slide">
          <div class="row event-item">
            <div class="col-lg-6">
              <img src="img/event-birthday.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Birthday Parties</h3>
              <div class="price">
                <p><span>$189</span></p>
              </div>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
              </p>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="row event-item">
            <div class="col-lg-6">
              <img src="img/event-private.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Private Parties</h3>
              <div class="price">
                <p><span>$290</span></p>
              </div>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
              </p>
            </div>
          </div>
        </div><!-- End testimonial item -->

        <div class="swiper-slide">
          <div class="row event-item">
            <div class="col-lg-6">
              <img src="img/event-custom.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 content">
              <h3>Custom Parties</h3>
              <div class="price">
                <p><span>$99</span></p>
              </div>
              <p class="fst-italic">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
                magna aliqua.
              </p>
              <ul>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                <li><i class="bi bi-check-circled"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                <li><i class="bi bi-check-circled"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              </ul>
              <p>
                Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate
                velit esse cillum dolore eu fugiat nulla pariatur
              </p>
            </div>
          </div>
        </div><!-- End testimonial item -->

      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>
</section><!-- End Events Section -->





<!-- ======= Gallery Section ======= -->
<section id="gallery" class="gallery">

  <div class="container" data-aos="fade-up">
    <div class="section-title">
      <h2>Gallery</h2>
      <p>Some photos from Our Restaurant</p>
    </div>
  </div>

  <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

    <div class="row g-0">

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-1.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-1.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-2.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-2.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-3.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-3.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-4.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-4.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-5.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-5.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-6.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-6.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-7.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-7.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

      <div class="col-lg-3 col-md-4">
        <div class="gallery-item">
          <a href="img/gallery/gallery-8.jpg" class="gallery-lightbox" data-gall="gallery-item">
            <img src="img/gallery/gallery-8.jpg" alt="" class="img-fluid">
          </a>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Gallery Section -->

@endsection
