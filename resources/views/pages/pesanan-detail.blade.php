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
              <li class="breadcrumb-item">
                Pesanan
              </li>
              <li class="breadcrumb-item active">
                Detail
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
            <h1>Pesanan Detail</h1>
            <p>
              Trip to Ubud, Bali, Indonesia
            </p>
            <div class="attendee">
              <table class="table table-responsive-sm text-center">
                <thead>
                  <tr>
                    <td>Picture</td>
                    <td>Name</td>
                    <td>Nationality</td>
                    <td>Visa</td>
                    <td>Passport</td>
                  </tr>
                </thead>
                <tbody>
                  @forelse($item->details as $detail)
                      <tr>
                          <td>
                              <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" height="60" class="rounded-circle"/>
                          </td>
                          <td class="align-middle">
                              {{ $detail->username }}
                          </td>
                          <td class="align-middle">
                              {{ $detail->nationality }}
                          </td>
                          <td class="align-middle">
                              {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                          </td>
                          <td class="align-middle">
                              {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                          </td>
                      </tr>
                  @empty
                      <tr>
                          <td colspan="6" class="text-center">
                              No Visitor
                          </td>
                      </tr>
                  @endforelse
                </tbody>
              </table>
              <div class="float-right">
                <table class="trip-informations float-right">
                  <tr>
                    <th width="50%">Members</th>
                    <td width="50%" class="text-right">
                      {{ $item->details->count() }} person
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Additional VISA</th>
                    <td width="50%" class="text-right">
                      $ {{ $item->additional_visa }},00
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Trip Price</th>
                    <td width="50%" class="text-right">
                      $ {{ $item->travel_package->price }},00 / person
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Sub Total</th>
                    <td width="50%" class="text-right">
                      $ {{ $item->transaction_total }},00
                    </td>
                  </tr>
                  <tr>
                    <th width="50%">Total (+Unique)</th>
                    <td width="50%" class="text-right text-total">
                      <span class="text-blue">$ {{ $item->transaction_total }},</span
                      ><span class="text-orange">{{ mt_rand(0,99) }}</span>
                    </td>
                  </tr>
                </table>
              </div>
              <hr />
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
