@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-end">
                    <a href="/task" class="text-white btn btn-primary"> Nueva tarea</a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        @foreach ($tasks as $task)
                            @if (($task->completed === 0) && ($task->expiration >= Carbon\Carbon::now()->toDateString()) )
                                <div class="card mt-2">
                                    <div class="card-content">
                                        <div class="card-body cleartfix">
                                            <div class="media align-items-stretch">
                                                <div class="align-self-center">
                                                    <i class="icon-speech warning font-large-2 mr-2"></i>
                                                </div>
                                                <div class="media-body">
                                                    <h4>{{ $task->title }}</h4>
                                                    <span>{{ $task->category }}</span>
                                                    <h5>
                                                        @if ($task->priority === 'Alta')
                                                            <a href="#" class="bg-danger text-white pl-1 pr-1" style="border-radius: 5px;text-decoration: none">Prioridad Alta</a>
                                                        @endif
                                                    </h5>
                                                    <P>{{ $task->expiration }}</P>
                                                </div>
                                                <div class="align-self-center p-2">
                                                    <a href="{{ route('task.edit', $task) }}">Actualizar</a>
                                                </div>

                                                <div class="align-self-center p-2">
                                                    <form method="POST" action="{{ route('endTask',$task) }}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-success" type="submit" >COMPLETAR</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach


                </div>
            </div>

            <div class="card mt-3 p-2">
                <h5 class="p-2 text-danger">EXPIRADAS</h5>
                @foreach ($tasks as $task)
                        @if (($task->completed === 0) && ($task->expiration < Carbon\Carbon::now()->toDateString()) )
                            <div class="card mt-2">
                                <div class="card-content">
                                    <div class="card-body cleartfix">
                                        <div class="media align-items-stretch">
                                            <div class="align-self-center">
                                                <i class="icon-speech warning font-large-2 mr-2"></i>
                                            </div>
                                            <div class="media-body">
                                                <h4>{{ $task->title }}</h4>
                                                <span>{{ $task->category }}</span>
                                            </div>
                                            <div class="align-self-center p-2">
                                                <a > Expiro el {{ $task->expiration }}</a>
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
@endsection
