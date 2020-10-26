@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    @foreach ($tasks as $task)
                    <div class="card mt-2 ">
                                    <div class="card-content">
                                        <div class="card-body cleartfix">
                                                <div class="media-body">
                                                    <p class="text-primary">{{ $task->title }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="align-self-center p-2">{{ $task->category }}</span>
                                                         <div class="align-self-center p-2">
                                                            @if ($task->completed === 0)
                                                                <p class="text-danger">Incompleto</p>
                                                            @endif
                                                             @if ($task->completed === 1)
                                                                <p class="text-success">Completado</p>
                                                            @endif
                                                            <p>{{ $task->user->name }}</p>

                                                            <a class="btn btn-primary m-1" href="{{ route('task.edit', $task) }}">Actualizar</a>
                                                        </div>
                                                    </div>

                                                </div>
                                        </div>
                                    </div>
                                </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
