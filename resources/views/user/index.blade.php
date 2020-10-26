@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Estudiantes</h5>
                    <a href="/register" class="text-white btn btn-primary"> Nuevo estudiante</a>
                </div>
                <div class="card-body">
                    @foreach ($users as $user)
                                @if ($user->id !== Auth::user()->id)
                                    <div class="card mt-2 ">
                                    <div class="card-content">
                                        <div class="card-body cleartfix">
                                                    <p class="text-primary">{{ $user->name }}</p>
                                                     <p class="text-primary">Tareas asignadas {{  count($user->tasks)  }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="align-self-center p-2">{{ $user->email }}</span>
                                                         <div class="align-self-center p-2">
                                                                <a href="/task/{{$user->id}}" class="btn btn-primary">Asignar tarea</a>
                                                        </div>
                                                    </div>

                                        </div>
                                    </div>
                                </div>
                                @endif

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
