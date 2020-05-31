@extends('Main/Admin/main')
@section('title', 'Update Schedule')
    
@section('body')
<div class="container">
    <div class="row" style="margin-bottom: 200px; margin-top: 30px">
        <div class="col-8">
            <h1>Form Update schedule</h1>

            <form method="post" action="{{url('/admin/schedule/'. $schedule->id)}} " enctype="multipart/form-data">
                @csrf
                @method('patch')

                <<div class="form-group">
                    <label for="logo">Tanggal Pertandingan</label>
                    <div class='input-group date' id='datetimepicker5'>
                        <input class="form-control @error('date') is-invalid @enderror" type="date" value="{{$schedule->match_date}}" name="date">
                    </div>

                    @error('date')
                        <div class="invalid-file-feedback text-danger">{{ $message }}</div>
                    @enderror
                </>

                <div class="form-group">
                    <label for="logo">Waktu Pertandingan</label>
                    <div class='input-group time' id='timetimepicker5'>
                        <input class="form-control @error('time') is-invalid @enderror" type="time" value="{{$schedule->match_time}}" name="time">
                    </div>

                    @error('time')
                        <div class="invalid-file-feedback text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Host</label>
                    <select class="custom-select @error('host') is-invalid @enderror" id="host" name="host">
                        <option selected value="{{$schedule->host->id}}">{{$schedule->host->team_name}}</option>
                        
                        @foreach($host as $h)
                            <option value=" {{$h->id}} "> {{$h->team_name}} </option>
                        @endforeach

                      </select>
                    @error('host')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="nama">Guest</label>
                    <select class="custom-select @error('guest') is-invalid @enderror" id="guest" name="guest">
                        <option selected value="{{$schedule->guest->id}}">{{$schedule->guest->team_name}}</option>
                        
                        @foreach($guest as $g)
                            <option value=" {{$g->id}} "> {{$g->team_name}} </option>
                        @endforeach

                      </select>
                    @error('guest')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               <button type="submit" class="btn btn-primary">Update Schedule</button>
            </form>
        </div>
    </div>
</div>



@endsection

