@extends('Main/Admin/main')
@section('title', 'Tambah Teams')
    
@section('body')
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1>Form Create Team</h1>

            <form method="post" action="{{url('/admin/team')}} " enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                  <label for="nama">Nama Tim</label>
                  <input type="text" class="form-control @error('team_name') is-invalid @enderror" id="team_name" placeholder="Masukkan nama tim" name="team_name" value="{{old('team_name')}}">

                  @error('team_name')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="logo">Create Date</label>
                    <div class='input-group date' id='datetimepicker5'>
                        <input class="form-control @error('date') is-invalid @enderror" type="date" value="{{old('date')}}" name="date">
                    </div>

                    @error('date')
                        <div class="invalid-file-feedback text-danger">{{ $message }}</div>
                    @enderror
                   
                </div>

                <div class="form-group">
                    <label for="logo">Logo Tim</label>
                    <input type="file" name="logo" class="form-control-file @error('file') is-invalid-file @enderror" >

                    @error('logo')
                    <div class="invalid-file-feedback text-danger">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                    <label for="description">Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" name="address"  placeholder="Masukkan alamat markas tim" value="{{old('address')}}"></textarea>

                    @error('address')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                </div>

                <div class="form-group">
                  <label for="nama">Kota tim</label>
                  <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" placeholder="Masukkan kota tim" name="city" value="{{old('city')}}">

                  @error('city')
                  <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

    

               <button type="submit" class="btn btn-primary">Create Data Team</button>
            </form>
        </div>
    </div>
</div>



@endsection

