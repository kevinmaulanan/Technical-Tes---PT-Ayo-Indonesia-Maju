@extends('Main/Admin/main')
@section('title', 'Tambah Schedule')
    
@section('body')
<div class="container mt-4">  
  <div class="card" style="width: 700px; height:400px ">
    <table width="700px" style=" margin-left: auto;margin-right: auto; margin-top:20px">
      <tr>
          <td style='text-align:center;vertical-align:middle'><img src="{{asset('/storage/tim/'.$schedule->host->team_logo)}}" width="250" height="250"  alt="Card image cap"></td>
          <td style='text-align:center;vertical-align:middle'> <h1>VS</h1></td>
          <td style='text-align:center;vertical-align:middle'><img src="{{asset('/storage/tim/'.$schedule->guest->team_logo)}}" width="250" height="250"  alt="Card image cap"></td>
      </tr>
      <tr>
          <td style='text-align:center;vertical-align:middle'><h3> {{$schedule->host->team_name}}</h3></td>
          <td></td>
          <td style='text-align:center;vertical-align:middle'><h3> {{$schedule->guest->team_name}}</h3></td>
      </tr>
      <tr>
        <td>
          <div style="margin-left:35px; margin-top:0; position: absolute;">
            <h6> Waktu : {{$schedule->match_date}}</h6>
            <h6> Jam : {{$schedule->match_time}}</h6>
          </div>
        </td>
        <td colspan="2"  style="position: relative;" height="50px">
            <div style="position: absolute; right:0; " class="mr-5">
              <a href="{{url('admin/schedule/update/'.$schedule->id)}}" class="btn btn-primary">Update </a>
              <a class="btn btn-danger text-white"  data-toggle="modal" data-target="#timModalCenter">
                  Hapus
              </a>
            </div>
            <div class="modal fade" id="timModalCenter" tabindex="-1" role="dialog" aria-labelledby="timModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="timModalLongTitle"> Hapus Schedule </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Yakin Untuk Menghapus Schedule {{$schedule->schedule_name}}??</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    
                    <form method="post" action="{{url('admin/schedule/'.$schedule->id)}} " enctype="multipart/form-data">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </form>
    
                  </div>
                </div>
              </div>
            </div> 
        </td>
      </tr>
    </table>
  </div>  
</div>

  


@endsection