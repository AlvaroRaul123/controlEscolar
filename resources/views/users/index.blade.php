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
                    <h4 class="card-title">Usuarios</h4>
                    <p class="card-category">Usuarios registrados</p>
                  </div>
                  <div class="card-body">
                    @if (session('success'))
                    <div class="alert alert-success" role="success">
                      {{ session('success') }}
                    </div>
                    @endif
                    <div class="row">
                      <div class="col-12 text-right">
                        <a href="{{ route('users.create') }}" class="btn btn-success">Añadir usuario</a>
                      </div>
                    </div>
                    <br>

                    <div class="table-responsive">
                      <table class="table">
                        <thead class="text-primary">
                          <th>ID</th>
                          {{-- <th>Nombre</th> --}}
                          <th>Usuario</th>
                          <th>Roles</th>
                          <th class="text-right">Acciones</th>
                        </thead>
                        <tbody>
                          @foreach ($users as $user)
                            <tr>
                              <td>{{ $user->id }}</td>
                              {{-- <td>{{ $user->name }}</td> --}}
                              <td>{{ $user->email }}</td>
                              <td>
                                  @forelse ($user->roles as $role)
                                    <span class="badge badge-info">{{ $role->name }}</span>
                                  @empty
                                    <span class="badge badge-danger">Sin rol de usuario</span>
                                  @endforelse
                              </td>
                              <td class="td-actions text-right">

                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-info"><i class="material-icons">Ver</i></a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning"><i class="material-icons">Editar</i></a>
                                <form action="{{ route('users.delete', $user->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Seguro?')">
                                  @csrf
                                  @method('DELETE')
                                    <button class="btn btn-danger" type="submit" rel="tooltip">
                                    <i class="material-icons">Borrar</i>
                                    </button>
                                </form>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                  <div class="card-footer mr-auto">
                    {{ $users->links() }}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection