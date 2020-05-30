@extends('Main/Admin/main')
@section('title', 'Tambah Teams')
    
@section('body')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Form Create Schedule</h1>

            <form method="post" action="{{url('/admin/schedule')}} " enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="logo">Tanggal Pertandingan</label>
                    <div class='input-group date' id='datetimepicker5'>
                        <input class="form-control @error('date') is-invalid @enderror" type="date" value="{{old('date')}}" name="date">
                    </div>

                    @error('date')
                        <div class="invalid-file-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="logo">Waktu Pertandingan</label>
                    <div class='input-group time' id='timetimepicker5'>
                        <input class="form-control @error('time') is-invalid @enderror" type="time" value="{{old('time')}}" name="time">
                    </div>

                    @error('time')
                        <div class="invalid-file-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Host</label>
                    <select class="custom-select @error('host') is-invalid @enderror" id="host" name="host">
                        <option selected>Pilih Tim Sebagai Tuan Rumah...</option>
                        
                        @foreach($team as $t)
                            <option value=" {{$t->id}} "> {{$t->team_name}} </option>
                        @endforeach

                      </select>
                    @error('host')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="nama">Guest</label>
                    <select class="custom-select @error('guest') is-invalid @enderror" id="guest" name="guest">
                        <option selected>Pilih Tim Sebagai Tamu</option>
                        
                        @foreach($team as $t)
                            <option value=" {{$t->id}} "> {{$t->team_name}} </option>
                        @endforeach

                      </select>
                    @error('guest')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               <button type="submit" class="btn btn-primary">Create Schedule</button>
            </form>
        </div>
    </div>
</div>



@endsection

