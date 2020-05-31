@extends('/Main/Admin/main')

@section('title', 'Result View')

@section('body')
    <div class="container mt-5 mb-5 s">

        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif
        
        <div style="position: relative">
            <a href=" {{url('admin/schedule')}} " class="btn btn-primary mb-3"> Lihat Schedule</a> 
            <a href=" {{url('admin/result/softdelete')}} " class="btn btn-danger mb-3" style="position: absolute; right:0"> Lihat Data result Yang Sudah Terhapus</a> 
        </div>
       
        
        <div class="table-responsive">
            <table class="table ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Skore</th>
                    <th scope="col">Team VS</th>
                    <th scope="col">Pemain</th>
                    <th scope="col">Team</th>
                    <th scope="col">Date</th>
                    <th scope="col">Link</th>
                </tr>
                </thead>
                <tbody>

                @foreach($result as $r)
                <tr>
                    <th scope="row"> {{ $loop->iteration + (5 * ($active-1))  }} </th>
                    <td> {{$r->score}} </td>
                    
                    <td> {{$r->schedule->host->team_name}} VS {{$r->schedule->host->team_name}} </td>
                    
                    <td> 
                        @foreach($r->player as $p)
                        <p> {{$p->player_name}}   </p>
                        @endforeach
                    </td>

                    <td>
                        @foreach($r->player as $p)
                        <p> {{$p->team->team_name}}  </p>
                        @endforeach 
                    </td>

                    <td> <p align="justify"> </p> </td>
                    <td>
                       <a href="{{url('admin/result/'.$r->id)}}">View </a>
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
                    <a class="page-link" href="{{url('/admin/result?page='.$pref)}}" tabindex="-1">Previous</a>
                </li>
                
                @foreach ($looping as $l)
                <li class="page-item @if($l==$active) active @endif  ">
                    <a class="page-link" href="{{url('/admin/result?page='.$l)}}"> {{$l}} <span class="sr-only">(current)</span></a>
                </li>
                @endforeach

                <li class="page-item  @if($active>=$count) disabled @endif"> 
                    <a class="page-link" href="{{url('/admin/result?page='.$next)}}" >Next</a>
                </li>
                </ul>
           
            </nav>
        </div>
    

    </div>
@endsection