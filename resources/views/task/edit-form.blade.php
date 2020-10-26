@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card p-3">
               <div class="form">
                    <form method="POST" action="{{ route('edit',$task) }}" >
                         {{ csrf_field() }}
                         @method('PATCH')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Titulo</label>
                            <input type="text" name="title" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$task->title}}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Categoría</label>
                            <input type="text" name="category" required class="form-control" id="exampleInputPassword1" value="{{$task->category}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Prioridad</label>
                            <select class="form-control" required name="priority" id="exampleFormControlSelect1">
                                <option>Alta</option>
                                <option>Baja</option>
                            </select>
                        </div>

                        <div class="actions  d-flex justify-content-end">
                            <button type="button" class="btn btn-warning m-2 text-white">Cancelar</button>
                            <button type="submit" class="btn btn-primary m-2">Guardar</button>
                        </div>
                    </form>


                        @if ($errors->any)
                            @foreach ($errors->all() as $error)
                                <div class="alert alert-danger" role="alert">
                                   {{$error}}
                                </div>
                            @endforeach
                        @endif


               </div>
            </div>
        </div>
    </div>
</div>
@endsection
