@extends('/Main/Admin/main')

@section('title', 'Team View')

@section('body')
    <div class="container mt-5 mb-5 s">

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif

        <a href=" {{url('admin/schedule/create')}} " class="btn btn-primary mb-3"> Tambah Data Tim</a> 
        
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
                    <th scope="row"> {{ $loop->iteration }} </th>
                    <td> {{$s->match_date}} </td>
                    <td> {{$s->match_time}} </td>
                    <td> <p align="justify"> {{$s->host->team_name}}</p> </td>
                    <td> <p align="justify"> {{$s->guest->team_name}}</p> </td>
                    <td>
                       <a href="{{url('admin/schedule/'.$s->id)}}">View </a>
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