@extends('/Main/Admin/main')

@section('title', 'Team View')

@section('body')
    <div class="container mt-5 mb-5 s">

        <a href=" {{url('admin/team')}} " class="btn btn-primary mb-3"> Tambah Data Tim</a> 
        
        @if(session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
        @endif

        
      
        <div class="table-responsive">
            <table class="table ">
                <thead class="thead-light">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Team</th>
                    <th scope="col">Logo</th>
                    <th scope="col">Since</th>
                    <th scope="col">Address</th>
                    <th scope="col">City</th>
                    <th scope="col">Link</th>
                </tr>
                </thead>
                <tbody>

                @foreach($team as $t)
                <tr>
                    <th scope="row">1</th>
                    <td> {{$t->team_name}} </td>
                    <td> <img src=" {{asset('/storage/tim/'.$t->team_logo)}}" height="100" width="100" alt="Image"> </td>
                    <td> <p align="justify"> {{$t->team_since}}</p> </td>
                    <td> <p align="justify"> {{$t->team_address}}</p> </td>
                    <td> <p align="justify"> {{$t->team_city}}</p> </td>
                    <td>
                        <a class="btn btn-primary" href="{{url('admin/book')}}">Update </a>
                        <a class="btn btn-danger" href="{{url('admin/book')}}">Hapus </a>
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