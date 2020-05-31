@extends('/Main/Admin/main')

@section('title', 'Pemain Restore')

@section('body')
    <div class="container mt-5 mb-5">

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif

        <div style="position: relative">
            <a href=" {{url('admin/player')}} " class="btn btn-primary mb-3">Kembali dan Lihat Data Pemain</a> 
        </div>
        
        <div class="table-responsive">
            <table class="table ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Player</th>
                    <th scope="col">Tinggi</th>
                    <th scope="col">Berat</th>
                    <th scope="col">Nomor Punggung</th>
                    <th scope="col">Posisi</th>
                    <th scope="col">Tim</th>
                    <th scope="col">View</th>
                </tr>
                </thead>
                <tbody>

                @foreach($player as $p)
                <tr>
                    <th scope="row"> {{ $loop->iteration + (5 * ($active-1))  }} </th>
                    <td> {{$p->player_name}} </td>
                    <td> <p align="justify"> {{$p->player_tall}} cm</p> </td>
                    <td> <p align="justify"> {{$p->player_weight}} kg</p> </td>
                    <td> <p align="justify"> {{$p->player_nomor}}</p> </td>
                    <td> <p align="justify"> {{$p->position->position}}</p> </td>
                    <td> <p align="justify"> {{$p->team->team_name}}</p> </td>
                    <td>
                       <a href="{{url('admin/player/restore/'.$p->id)}}">Pulihkan </a>
                    </td>
                </tr>
                @endforeach
            
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <nav aria-label="...">
                <ul class="pagination" style="justify-content: center" >
    
                <li class="page-item  @if($pref==0) disabled @endif">     
                    <a class="page-link" href="{{url('/admin/schedule?page='.$pref)}}" tabindex="-1">Previous</a>
                </li>
                
                @foreach ($looping as $l)
                <li class="page-item @if($l==$active) active @endif  ">
                    <a class="page-link" href="{{url('/admin/player?page='.$l)}}"> {{$l}} <span class="sr-only">(current)</span></a>
                </li>
                @endforeach

                <li class="page-item  @if($active>=$count) disabled @endif"> 
                    <a class="page-link" href="{{url('/admin/player?page='.$next)}}" >Next</a>
                </li>
                </ul>
           
            </nav>
        </div>
    

    </div>
@endsection