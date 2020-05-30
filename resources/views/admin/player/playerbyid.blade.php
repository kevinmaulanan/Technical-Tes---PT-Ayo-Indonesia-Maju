@extends('Main/Admin/main')
@section('title', 'Tambah players')
    
@section('body')
<div class="container">  
  <div class="card" style="width: 18rem;">
        <img class="card-img-top" src=""  alt="Card image cap">
        <div class="card-body">
        <h5 class="card-title"> {{$player->player_name}} </h5>
        <p class="card-text">{{$player->player_tall}} cm</p>
        <p class="card-text">{{$player->player_weight}} kg</p>
        
        <div class="" style="">
          <a href="{{url('admin/player/update/'.$player->id)}}" class="btn btn-primary">Update </a>
          <a class="btn btn-danger text-white"  data-toggle="modal" data-target="#timModalCenter">
              Hapus
          </a>
        </div>
      
        <div class="modal fade" id="timModalCenter" tabindex="-1" role="dialog" aria-labelledby="timModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="timModalLongTitle"> Hapus Player </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <p>Yakin Untuk Menghapus Player {{$player->player_name}}??</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                <form method="post" action="{{url('admin/player/'.$player->id)}} " enctype="multipart/form-data">
                  @csrf
                  @method('delete')
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>

              </div>
            </div>
          </div>
        </div> 
        </div>
    </div>
</div>


@endsection