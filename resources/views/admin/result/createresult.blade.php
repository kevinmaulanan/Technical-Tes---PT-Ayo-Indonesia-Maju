@extends('Main/Admin/main')
@section('title', 'Tambah Result')
    
@section('body')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Form Create Result</h1>

            <form method="post" action="{{url('/admin/result')}} " enctype="multipart/form-data">
                @csrf
                <input type="hidden" id="idschedule" name="idschedule" value="{{$schedule->id}}">
                <input type="hidden" id="idhost" name="idhost" value="{{$idhost}}">
                <input type="hidden" id="idguest" name="idguest" value="{{$idguest}}">

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
                    <label for="nama">Pilih Pemain Cetak Gol</label>
                    <select class="custom-select @error('player') is-invalid @enderror" id="player" name="player">
                        <option selected>Pilih Pemain</option>
                        
                        @foreach($player as $p)
                            <option value=" {{$p->id}} ">  {{$p->team->team_name}} - {{$p->player_name}} </option>
                        @endforeach

                      </select>
                    @error('player')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               <button type="submit" class="btn btn-primary">Create Skor</button>
            </form>
        </div>
    </div>
</div>



@endsection

