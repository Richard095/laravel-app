@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>FINALIZADOS</h5>
                    <a href="">
                        <img height="22" src="https://www.flaticon.com/svg/static/icons/svg/875/875541.svg" alt="">
                    </a>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @foreach ($tasks as $task)
                        @if ($task->completed === 1)
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
                                                <a >COMPLETADO</a>
                                            </div>

                                            <div class="align-self-center p-2">
                                                <form method="POST" action="{{ route('task.delete',$task) }}">
                                                    {{ csrf_field() }}
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit" >ELIMINAR</button>
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
        </div>
    </div>
</div>
@endsection
