@extends('layouts.dashboard')
@section('content')
    <div class="content mt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header card-header-primary">
                    <h4 class="card-title">Niveles educativos</h4>
                    <div class="text-left">
                      <a href="{{ route('niveles.create') }}" class="btn btn-success">Crear nivel</a>
                    </div>
                    <br>
                    
                        
                    <p class="card-category"> Listado de niveles educativos</p>
                    
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
                    @endif
                    
                     <div class="table-responsive mt-3">
            <table class="table">
              {{-- encabezado --}}
              <thead class="text primary">
                <th>Id</th>
                <th>Nombre nivel</th>
                <th class="text-center">Acciones</th>
              </thead>
              {{-- cuerpo --}}
              <tbody>
                @foreach ($nivels as $nvl)
                <tr>
                  <td>{{$nvl->id}}</td>
                  <td>{{$nvl->nivel}}</td>
                 <td>  <a class="btn btn-info"><i class="material-icons center" href="#">Editar</a>
                  <a class="btn btn-warning"><i class="material-icons center" href="#">Eliminar</a></td>

                  
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
                  </div>
                  <div class="card-body mr-auto">
                    {{-- {{ $users->links() }} --}}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
@endsection