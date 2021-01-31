@extends('layouts.app')

@section('content')
<div class="container">
    @include('flash')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">users</div>


                <table class="table table-striped">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Roles</th>
                        @can('edit.users')
                        <th scope="col">Edit</th>
                        @endcan
                        @can('delete.users')
                        <th scope="col">Delete</th>
                        @endcan
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id}}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email}}</td>
                        <td>{{ implode(',',$user->roles()->get()->pluck('name')->toArray()) }}</td>
                        @can('edit.users')
                        <td> <a href="{{ route("admin.users.edit", $user->id) }}" class="btn btn-outline-success"><i class="far fa-edit"></i></a></td>
                        @endcan
                        @can('delete.users')
                        <td>
                                {!! BootForm::open(route('admin.users.destroy', $user->id))->delete() !!}
                                {!! BootForm::submit("<i class=\"fas fa-trash-alt\"></i>",'btn-outline-danger') !!}
                                {!! BootForm::close() !!}
                                {{-- <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-danger">Delete</button>
                                </form> --}}
                                {{-- <a href="{{ route("admin.users.destroy", $user->id) }}" class="btn btn-danger" > <i class="fas fa-trash-alt"></i></a></td> --}}
                            </td>
                            @endcan
                        </tr>
                    @endforeach


                    </tbody>
                  </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
