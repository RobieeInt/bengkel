@extends('admin.layouts.base');

@section('title', 'Packages');

@section('content')
<div class="row">
    <div class="col-md-12">

        {{-- Alert Here --}}
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- <div class="alert alert-danger">
        </div> --}}

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Create Booking</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form enctype="multipart/form-data" method="POST" action="{{route('admin.booking.store')}}">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">name customer</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Yujang Lesmana"
                            value="{{old('name')}}">
                    </div>

                    {{-- dropdown from service --}}
                    <div class="form-group">
                        <label for="service_id">Service</label>
                        <select class="form-control" id="service_id" name="service_id">
                            <option value="{{ old('service_id') }}" disabled>Select Service</option>
                            @foreach ($services as $service)
                            <option value="{{$service->id}}">{{$service->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    {{-- dynamic dropdown from service --}}
                    <div class="form-group">
                        <label for="service_detail_id">Detail Service</label>
                        <select class="form-control" id="service_detail_id" name="service_detail_id">
                            <option value="" disabled>Select Detail Service</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <label for="description">description</label>
                        <textarea name="description" id="description" cols="30" rows="10">{{ old('description') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Status Proses Pengerjaan</label>
                        <select class="custom-select" name="status" value="{{old('status')}}">
                            <option value="antrian" {{ old('status'==='antrian' ? "selected" : "" ) }}>Antrian</option>
                            <option value="proses" {{ old('status'==='proses' ? "selected" : "" ) }}>Proses</option>
                            <option value="selesai" {{ old('status'==='selesai' ? "selected" : "" ) }}>Selesai</option>
                        </select>
                    </div>

                    <label for="total_price">Total Tagihan</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                        <span class="input-group-text">Rp.</span>
                        </div>
                        <input type="number" id="total_price" name="total_price" class="form-control" value="{{ old('total_price') }}" placeholder="100000">
                    </div>

                    <div class="form-group">
                        <label>Status Tagihan</label>
                        <select class="custom-select" name="payment_status" value="{{old('payment_status')}}">
                            <option value="belum bayar" {{ old('status'==='belum bayar' ? "selected" : "" ) }}>Belum bayar</option>
                            <option value="sudah bayar" {{ old('status'==='sudah bayar' ? "selected" : "" ) }}>Sudah bayar</option>
                        </select>
                    </div>

                    {{-- input date +2 hari dari hari ini --}}
                    {{-- <div class="form-group">
                        <label for="service_date">Tanggal Service</label>
                        <input type="date" class="form-control" id="service_date" name="service_date" value="{{old('service_date')}}">
                    </div> --}}

                    <div class="form-group">
                        <label>Date and time:</label>
                          <div class="input-group date" data-target-input="nearest">
                              <input type="text" class="form-control datetimepicker-input"  id="service_date"  name="service_date" data-target="#service_date"/>
                              <div class="input-group-append" data-target="#service_date" data-toggle="datetimepicker">
                                  <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                              </div>
                          </div>
                      </div>


                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
{{-- //CKEDITOR --}}
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description', {tabSpaces: 8} );
</script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#service_id').on('change', function () {
            var serviceId = this.value;
            $('#service_detail_id').html('');
            $.ajax({
                url: '{{ route('getDetail') }}?service_id='+serviceId,
                type: 'get',
                success: function (res) {
                    $('#service_detail_id').html('<option value="">Select detail</option>');
                    $.each(res, function (key, value) {
                        $('#service_detail_id').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

    });
</script>

<script type="text/javascript">
    $(function () {
        $('#service_date').datetimepicker({
            format: 'L'
        });
    });

//Date and time picker
$('#service_date').datetimepicker({ icons: { time: 'far fa-clock' } });
</script>
@endsection
