@extends('admin.layouts.base')

@section('title', 'Dashboard')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>
                        @if ($bookings)
                            {{ $bookings->count() }}
                        @else
                            0
                        @endif
                    </h3>

                    <p>Jumlah Booking</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>
                        {{-- get transaction with status selesai --}}
                        {{ $bookings->where('status', 'selesai')->count() }}
                    </h3>

                    <p>Booking Selesai</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>
                        {{-- get total price from transaction with status selesai format number --}}
                       Rp. {{ number_format($bookings->where('payment_status', 'belum bayar')->sum('total_price')) }}

                    </h3>

                    <p>Booking belum dibayar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-cash"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>
                      Rp.  {{ number_format($bookings->where('payment_status', 'sudah bayar')->sum('total_price')) }}
                    </h3>

                    <p>Pendapatan sudah dibayar</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
@endsection
