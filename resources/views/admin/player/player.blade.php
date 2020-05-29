@extends('/Main/Admin/main')

@section('title', 'Team View')

@section('body')
    <div class="container mt-5 mb-5 s">

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif

        <a href=" {{url('admin/player/create')}} " class="btn btn-primary mb-3"> Tambah Data Pemain</a> 
        
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
                </tr>
                </thead>
                <tbody>

                @foreach($player as $p)
                <tr>
                    <th scope="row"> {{ $loop->iteration }} </th>
                    <td> {{$p->player_name}} </td>
                    <td> <p align="justify"> {{$p->player_tall}} cm</p> </td>
                    <td> <p align="justify"> {{$p->player_weight}} kg</p> </td>
                    <td> <p align="justify"> {{$p->player_nomor}}</p> </td>
                    <td> <p align="justify"> {{$p->id_position}}</p> </td>
                    <td> <p align="justify"> {{$p->id_team}}</p> </td>
                    <td>
                       <a href="{{url('admin/player/'.$p->id)}}">View </a>
                    </td>
                </tr>
                @endforeach
            
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <nav aria-label="...">
                <ul class="pagination">
    
                <li class="page-item  @if($pref==0) disabled @endif">     
                    <a class="page-link" href="{{url('/admin/books?page='.$pref)}}" tabindex="-1">Previous</a>
                </li>
                
                @foreach ($total as $t)
                <li class="page-item @if($t==$active) active @endif  ">
                    <a class="page-link" href="{{url('/admin/books?page='.$t)}}"> {{$t}} <span class="sr-only">(current)</span></a>
                </li>
                @endforeach

                <li class="page-item  @if($active>=$count) disabled @endif"> 
                    <a class="page-link" href="{{url('/admin/books?page='.$next)}}" >Next</a>
                </li>
                </ul>
           
            </nav>
        </div>
    

    </div>
@endsection