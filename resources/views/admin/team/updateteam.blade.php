@extends('Main/Admin/main')
@section('title', 'Tambah Teams')
    
@section('body')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Form Update Team</h1>

            <form method="post" action="{{url('/admin/team/'. $team->id)}}" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="form-group">
                  <label for="nama">Nama Tim</label>
                  <input type="text" class="form-control @error('team_name') is-invalid @enderror" id="team_name" placeholder="Masukkan nama tim" name="team_name" value="{{$team->team_name}}">

                  @error('team_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="logo">Create Date</label>
                    <div class='input-group date' id='datetimepicker5'>
                        <input class="form-control @error('date') is-invalid @enderror" type="date" value="{{$team->team_since}}" name="date">
                    </div>

                    @error('date')
                        <div class="invalid-file-feedback text-danger">{{ $message }} </div>
                    @enderror
                   
                </div>

                <div class="form-group">
                    <label for="logo">Logo Tim</label>
                    <input type="file" name="logo" class="form-control-file @error('file') is-invalid-file @enderror" value="{{asset('/storage/tim/'.$team->team_logo)}}">

                    @error('logo')
                    <div class="invalid-file-feedback text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="description">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address"  placeholder="Masukkan alamat markas tim" value=""> {{$team->team_address}}</textarea>

                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                  <label for="nama">Kota tim</label>
                  <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Masukkan kota tim" name="city" value="{{$team->team_city}}">

                  @error('city')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

               <button type="submit" class="btn btn-primary">Update Data Team</button>
            </form>
        </div>
    </div>
</div>

@endsection

