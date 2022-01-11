@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
<main>
    <section class="section-testimonial-heading" id="testimonialHeading">
        <div class="container">
          <div class="row">
            <div class="col text-center">
              <h2>They Are Loving Us</h2>
              <p>
                Moments were giving them
                <br />
                the best experience
              </p>
            </div>
          </div>
        </div>
      </section>
    
      <section
        class="section section-testimonial-content"
        id="testimonialContent"
      >
        <div class="container">
          <div class="section-popular-travel row justify-content-center">
            @foreach ($items as $item)    
            <div class="col-sm-6 col-md-6 col-lg-4">
                <div class="card card-testimonial text-center">
                    <div class="testiominal-content">
                    <img
                        src="frontend/images/testimonial-4.png"
                        alt="User"
                        class="mb-4 rounded-circle"
                    />
                    <h3 class="mb-4">{{ $item->name }}</h3>
                    <p class="testimonial">
                        “ {{ $item->testimoni }} “
                    </p>
                    </div>
                    <hr />
                    <p class="trip-to mt-2">
                        {{ $item->location }}
                    </p>
                </div>
            </div>
            @endforeach
            
          </div>
          <div class="row">
            <div class="col-12 text-center">
              <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">
                I Need Help
              </a>
              <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">
                Get Started
              </a>
            </div>
          </div>
        </div>
      </section>
</main>
@endsection

@push('prepend-style')
  <link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.min.css') }}" />
@endpush

@push('addon-script')
  <script src="{{ url('frontend/libraries/gijgo/js/gijgo.min.js') }}"></script>
  <script>
    $(document).ready(function() {
      $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        uiLibrary: 'bootstrap4',
        icons: {
          rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}" />'
        }
      });
    });
  </script>
@endpush
