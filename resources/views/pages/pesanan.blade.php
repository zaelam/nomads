@extends('layouts.app')
@section('title', 'Checkout')

@section('content')
<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="container">
      <div class="row">
        <div class="col p-0">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item active">
                Pesanan
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 pl-lg-0">
          <div class="card card-details">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <h1>Who is Going?</h1>
            <p>
              Trip to Ubud, Bali, Indonesia
            </p>
            <div class="attendee">
              <table class="table table-responsive-sm text-center">
                <thead>
                  <tr>
                      <th>ID</th>
                      <th>Travel</th>
                      <th>User</th>
                      <th>Visa</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  @forelse($items as $item)
                      <tr>
                          <td>{{ $item->id }}</td>
                          <td>{{ $item->travel_package->title }}</td>
                          <td>{{ $item->user->name }}</td>
                          <td>${{ $item->additional_visa }}</td>
                          <td>${{ $item->transaction_total }}</td>
                          <td>{{ $item->transaction_status }}</td>
                          <td>
                              <a href="{{ route('pesanan-detail', $item->id) }}" class="btn btn-info">
                                  <i class="fa fa-eye"></i>
                              </a>
                              @if ($item->transaction_status == 'SUCCESS')
                                @if ($item->status_review == 0)
                                <a href="{{ route('buat-testimoni', $item->id) }}" class="btn btn-primary">
                                    <i class="fa fa-pen"></i> review
                                </a>
                                @else
                                <a href="{{ route('buat-testimoni', $item->id) }}" class="btn btn-success">
                                    <i class="fa fa-pen"></i> Edit review
                                </a>
                                @endif
                              @endif
                          </td>
                      </tr>
                  @empty
                      <td colspan="7" class="text-center">
                          Data Kosong
                      </td>
                  @endforelse
                  </tbody>
              </table>
              {{ $items->links() }}
            </div>
            
          </div>
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
