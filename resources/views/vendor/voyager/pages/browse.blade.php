@extends('voyager::master')
@section('content')
    
    
    <table>
<!--   The Head of The Table -->
       <thead>
           <tr>
               <th></th>
               <th>Fichiers</th>
               <th>Propraitaire</th>
               <th>Type<th>
               <th>Etat</th>
               <th>Action</th>
           </tr>
<!--  End of The Head -->
       </thead>
<!--   The Body of The Table -->
       <tbody>
           @if(Auth::user()->role_id == 1)
                @foreach($dossiers as $dossier)
                @php
                    $rest = substr($dossier->file, 1, -1);
                    $rest1 = json_decode($rest, true)
                @endphp
                @if($dossier->status == "refus" || $dossier->status == "acceptee")
                <tr>
                    <td><img src="https://icon-library.com/images/rar-icon/rar-icon-22.jpg"></td>
                    <td>            <a href="http://localhost:8000/storage/{{$rest1["download_link"]}}" download="">{{$dossier->name_dossier}}</a></td>
                    <td><a href="http://127.0.0.1:8000/admin/users/{{$dossier->id_user}}" target="_blank">{{$dossier->name}}</a></td>
                    <td>{{ $dossier->type}}</td>
                    <td>{{$dossier->status}}</td>
                    <td>            
                    <a href="http://127.0.0.1:8000/admin/dossiers/{{$dossier->main_id}}/edit"><button>Edit</button></a><a href="{{ URL('/delete/'.$dossier->main_id )}}"><button>Delete</button></a></td>
                    </td>
                    </tr>
                @else
                    
                    <tr>
                    <td><img src="https://icon-library.com/images/rar-icon/rar-icon-22.jpg"></td>
                    <td>            <a href="http://localhost:8000/storage/{{$rest1["download_link"]}}" download="">{{$dossier->name_dossier}}</a></td>
                    <td><a href="http://127.0.0.1:8000/admin/users/{{$dossier->id_user}}">{{$dossier->name}}</a></td>
                    <td>{{ $dossier->type}}</td>
                    <td>{{$dossier->status}}</td>
                    <td><a href="{{ URL('/deny/'.$dossier->main_id )}}"><button>deny</button></a>            <a href="{{ URL('/accept/'.$dossier->main_id )}}"><button>accept</button></a>
                    <a href="http://127.0.0.1:8000/admin/dossiers/{{$dossier->main_id}}/edit"><button>Edit</button></a><a href="{{ URL('/delete/'.$dossier->main_id )}}"><button>Delete</button></a></td>
                    </tr>
                @endif
                @endforeach
           
           @else
           
            @foreach($dossiers as $dossier)
                @php
                    $rest = substr($dossier->file, 1, -1);
                    $rest1 = json_decode($rest, true)
                @endphp
                @if(Auth::user()->id == $dossier->id_user)
                @if($dossier->status == "refus" || $dossier->status == "acceptee")
                <tr>
                    <td><img src="https://icon-library.com/images/rar-icon/rar-icon-22.jpg"></td>
                    <td>            <a href="http://localhost:8000/storage/{{$rest1["download_link"]}}" download="">{{$dossier->name_dossier}}</a></td>
                    <td><a href="http://127.0.0.1:8000/admin/users/{{$dossier->id_user}}" target="_blank">{{$dossier->name}}</a></td>
                    <td>{{ $dossier->type}}</td>
                    <td>{{$dossier->status}}</td>
                    <td>            
                    <a href="http://127.0.0.1:8000/admin/dossiers/{{$dossier->main_id}}/edit"><button>Edit</button></a></td>
                    </tr>
                @else
                    
                    <tr>
                    <td><img src="https://icon-library.com/images/rar-icon/rar-icon-22.jpg"></td>
                    <td>            <a href="http://localhost:8000/storage/{{$rest1["download_link"]}}" download="">{{$dossier->name_dossier}}</a></td>
                    <td><a href="http://127.0.0.1:8000/admin/users/{{$dossier->id_user}}">{{$dossier->name}}</a></td>
                    <td>{{ $dossier->type}}</td>
                    <td>{{$dossier->status}}</td>
                    <td><a href="http://127.0.0.1:8000/admin/dossiers/{{$dossier->main_id}}/edit"><button>Edit</button></a></td>
                    </tr>
                @endif
                @endif
                
                @endforeach
           
           @endif
       
       </tbody>
<!-- End of The Table -->
   </table>
@stop

<style>
    * {
  box-sizing: border-box;
}
/* The Table Attributes */
table {
  text-align: center;
  width: 1200px;
  margin: 20px auto;
  font-family: sans-serif;
  border-bottom: 5px solid #009688;
}
/* The Attributes that the Head and the Body of the Table Share */
th,
td {
  padding: 20px;
  padding-left: 10px;

}
/* Attributes of the Head of the Body */
th {
  background-color: #404040;
  color: white;
  height: 50px;
  padding-left: 10px;

}
/* Attributes of Each Cell */
td {
  background-color: #eee;
}
/*Attributes of Span*/
span {
  padding: 5px 10px;
  margin: 3px;
  color: white;
}
/*Attributes */
.blue {
  background-color: #03a9f4;
}
.pink {
  background-color: #e91e63;
}

img{
    width: 100px;
    height: 100px;
}

</style>
