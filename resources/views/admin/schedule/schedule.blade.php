@extends('/Main/Admin/main')

@section('title', 'Schedule View')

@section('body')
    <div class="container mt-5 mb-5 s">

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        
        <div style="position: relative">
            <a href=" {{url('admin/schedule/create')}} " class="btn btn-primary mb-3"> Tambah Data Schedule</a> 
            <a href=" {{url('admin/schedule/softdelete')}} " class="btn btn-danger mb-3" style="position: absolute; right:0"> Lihat Data Schedule Yang Sudah Terhapus</a> 
        </div>
       
        
        <div class="table-responsive">
            <table class="table ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th scope="col">Host</th>
                    <th scope="col">Guest</th>
                    <th scope="col">Link</th>
                </tr>
                </thead>
                <tbody>

                @foreach($schedule as $s)
                <tr>
                    <th scope="row"> {{ $loop->iteration + (5 * ($active-1))  }} </th>
                    <td> {{$s->match_date}} </td>
                    <td> {{$s->match_time}} </td>
                    <td> <p align="justify"> {{$s->host->team_name}}</p> </td>
                    <td> <p align="justify"> {{$s->guest->team_name}}</p> </td>
                    <td>
                       <a class="btn btn-primary" href="{{url('admin/schedule/'.$s->id)}}">View </a>
                       <a class="btn btn-success" href="{{url('admin/result/create/'.$s->id)}}">Tambah Skor </a>
                    </td>
                </tr>
                @endforeach
            
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            <nav aria-label="...">
                <ul class="pagination" style="justify-content: center">
    
                <li class="page-item  @if($pref==0) disabled @endif">     
                    <a class="page-link" href="{{url('/admin/schedule?page='.$pref)}}" tabindex="-1">Previous</a>
                </li>
                
                @foreach ($looping as $l)
                <li class="page-item @if($l==$active) active @endif  ">
                    <a class="page-link" href="{{url('/admin/schedule?page='.$l)}}"> {{$l}} <span class="sr-only">(current)</span></a>
                </li>
                @endforeach

                <li class="page-item  @if($active>=$count) disabled @endif"> 
                    <a class="page-link" href="{{url('/admin/schedule?page='.$next)}}" >Next</a>
                </li>
                </ul>
           
            </nav>
        </div>
    

    </div>
@endsection