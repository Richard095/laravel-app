@extends('layouts.app')
@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 col-12">
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
                                <div class="card mt-2 ">
                                    <div class="card-content">
                                        <div class="card-body cleartfix">
                                                <div class="media-body">
                                                    <p class="text-primary">{{ $task->title }}</p>
                                                    <div class="d-flex justify-content-between">
                                                        <span>{{ $task->category }}</span>
                                                         @if ($task->priority === 'Alta')
                                                            <a href="#" class="bg-danger text-white pl-1 pr-1 mr-1" style="border-radius: 5px;text-decoration: none">Prioridad Alta</a>
                                                        @endif
                                                    </div>
                                                    {{-- <P>{{ $task->expiration }}</P> --}}
                                                </div>
                                                {{-- <div class="align-self-center p-2">
                                                    <a href="{{ route('task.edit', $task) }}">Actualizar</a>
                                                </div> --}}

                                                <div class="align-self-center  d-flex justify-content-end">

                                                    <a class="btn btn-primary m-1" href="{{ route('task.edit', $task) }}">Actualizar</a>

                                                    <form method="POST" action="{{ route('endTask',$task) }}">
                                                        {{ csrf_field() }}
                                                        <button class="btn btn-success m-1" type="submit" >COMPLETAR</button>
                                                    </form>
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
                                         <p class="text-primary">{{ $task->title }}</p>
                                        <div class="media align-items-stretch">
                                            <div class="media-body align-self-center">
                                                <span >{{ $task->category }}</span>
                                            </div>
                                            <div class="align-self-center p-2">
                                                <a class="text-info"> Expiro el {{ $task->expiration }}</a>
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
