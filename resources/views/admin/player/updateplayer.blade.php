@extends('Main/Admin/main')
@section('title', 'Tambah Players')
    
@section('body')
<div class="container">
    <div class="row" style="margin-bottom: 200px; margin-top: 30px">
        <div class="col-8">
            <h1>Form Create Player</h1>

            <form method="post" action="{{url('/admin/player/'. $player->id)}} " enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="form-group">
                  <label for="player">Nama Pemain</label>
                  <input type="text" class="form-control @error('player') is-invalid @enderror" id="player" placeholder="Masukkan nama tim" name="player" value="{{$player->player_name}}">

                  @error('player')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Tinggi Badan</label>
                    <input type="number" class="form-control @error('tall') is-invalid @enderror" id="tall" placeholder="Masukkan nama tim" name="tall" value="{{$player->player_tall}}">
  
                    @error('tall')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Berat Badan</label>
                    <input type="number" class="form-control @error('weight') is-invalid @enderror" id="weight" placeholder="Masukkan nama tim" name="weight" value="{{$player->player_weight}}">
  
                    @error('weight')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Nomor Punggung</label>
                    <input type="number" class="form-control @error('nomor') is-invalid @enderror" id="nomor" placeholder="Masukkan nama tim" name="nomor" value="{{$player->player_nomor}}">
  
                    @error('nomor')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Posisi</label>
                    <select class="custom-select @error('position') is-invalid @enderror" id="position" id="inputGroupSelect02" name="position">
                        <option selected value="{{$player->id_position}}">{{$player->position->position}}</option>
                        
                        @foreach($position as $p)
                            <option value="{{$p->id}}"> {{$p->position}} </option>
                        @endforeach

                      </select>
                    @error('position')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nama">Team</label>
                    <select class="custom-select @error('team') is-invalid @enderror" id="team" id="inputGroupSelect02" name="team">
                        <option value="{{$player->id_team}}">{{$player->team->team_name}}</option>
                        
                        @foreach($team as $t)
                            <option value=" {{$t->id}} "> {{$t->team_name}} </option>
                        @endforeach

                      </select>
                    @error('team')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

               <button type="submit" class="btn btn-primary">Update Data player</button>
            </form>
        </div>
    </div>
</div>



@endsection

