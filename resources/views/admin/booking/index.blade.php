@extends('admin.layouts.base');

@section('title', 'booking');

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">bookings</h3>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <a href="{{ route('admin.booking.create')}}" class="btn btn-info mb-2"><i
                                class="fas fa-plus-square"></i> Create booking
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table id="bookings" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">Id</th>
                                    <th class="text-center">transaction code</th>
                                    <th class="text-center">User</th>
                                    <th class="text-center">Kategori Service</th>
                                    <th class="text-center">Detail Service</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">Desktipsi</th>
                                    <th class="text-center">Status Booking</th>
                                    <th class="text-center">Status Pembayaran</th>
                                    <th class="text-center">Total Pembayaran</th>
                                    <th class="text-center">Tanggal Service</th>
                                    <th class="text-center">Aksi</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bookings as $booking )

                                <tr>
                                    <td class="text-center">{{ $booking->id }}</td>
                                    <td class="text-center">{{$booking->transaction_code}}</td>
                                    <td class="text-center">{{$booking->user->name}}</td>
                                    <td class="text-center">{{$booking->service->name}}</td>
                                    {{-- Service Detail name get by service_id service id --}}
                                    <td class="text-center">{{$booking->serviceDetail->name}}</td>
                                    <td class="text-center">{{$booking->name}}</td>
                                    <td class="text-center">
                                        <div class="text-center content">
                                            {!! $booking->description !!}
                                        </div>
                                    </td>
                                    <td class="text-center">{{$booking->status}}</td>
                                    <td class="text-center {{$booking->payment_status == 'sudah bayar' ?  " text-teal" : "text-orange" }}">
                                        {{-- //uppercase --}}
                                        {{ strtoupper($booking->payment_status) }}
                                    </td>
                                    <td class="text-center">Rp. {{ number_format($booking->total_price) }}</td>
                                    <td class="text-center">{{$booking->service_date}}</td>

                                    <td class="text-center">
                                        {{-- //change status to selesai --}}
                                        <form action="{{ route('changeStatus', $booking->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PUT')
                                            {{-- //giving modal before delete --}}
                                            <button type="button" class="btn btn-success" data-toggle="modal"
                                                data-target="#changeModal-{{ $booking->id }}">
                                               Selesai
                                            </button>
                                            <div class="modal fade" id="changeModal-{{ $booking->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                booking
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Rubah Transaksi booking <strong><span
                                                                    class="text-teal text-uppercase">{{
                                                                    $booking->transaction_code }}</span></strong>
                                                            Menjadi Selesai ?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Rubah</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>

                                        <a href="{{ route('admin.booking.edit', $booking->id) }}"
                                            class="btn btn-secondary mb-2 mt-2"><i class="fas fa-edit"></i>Edit</a> <br>
                                        <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            {{-- //giving modal before delete --}}
                                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                                data-target="#deleteModal-{{ $booking->id }}">
                                                <i class="fas fa-trash"></i>Delete
                                            </button>
                                            <div class="modal fade" id="deleteModal-{{ $booking->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Delete
                                                                booking
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                           Yakin mau hapus Transaksi booking <strong><span
                                                                    class="text-teal text-uppercase">{{
                                                                    $booking->transaction_code }}</span></strong>
                                                            ini?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script>
    $('#bookings').DataTable();
</script>

{{-- CKEDIT Content --}}
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', 'tabSpaces', 4);
</script>

{{-- show sweet alert if delete success --}}
@if(session()->has('success'))
{{-- toasts --}}
<script>
    $(document).Toasts('create', {
    icon: 'fas fa-thumbs-up',
    class: 'bg-success m-1 text-teal align-items-center text-justify width:20px ',
    autohide: true,
    delay: 15000,
    title: 'Informasi',
    //body session get succes
    body: '{{ session()->get('success') }} ',
    position: 'bottomLeft',
    // fixed: true,
    subtitle: 'Success',

    });
</script>
@endif
@endsection
