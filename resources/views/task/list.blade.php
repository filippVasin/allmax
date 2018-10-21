@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="row ">


                <div class="col-sm-10">
                <div class="box-header">
                    <h3 class="box-title">Задачи:</h3>
                </div>
                </div>
                <div class="col-sm-2">
                    <br>
                    <a href="{{ route('create') }}"><button class="btn btn-primary" style="margin-top: 5px">Новая задача</button></a>
                </div>


            </div>
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            <form action="{{ route('list') }}" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Выберите статус</label>
                        <select class="form-control" name="status_id">
                            @if($statuses)
                                <option value="0"></option>
                                @foreach($statuses as $status)
                                    <option value = "{{ $status['id'] }}">{{ $status['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="exampleFormControlSelect1">Выберите приоритет</label>
                        <select class="form-control" name="priority_id">
                            @if($priorities)
                                <option value="0"></option>
                                @foreach($priorities as $priority)
                                    <option value = "{{ $priority['id'] }}">{{ $priority['name'] }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                <input type="submit"  value="Применить фильтр" name="submit" class="btn btn-success" style="margin-top: 5px">
                <input type="hidden" value="{{ csrf_token()}}" name="_token" >
            </form>

            <br>
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Задача</th>
                        <th>Приоритет</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody id="currency_table">
                    @if($tasks)
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task['title']}}</td>
                                <td>{{ $task->priority['name']}} </td>
                                <td>{{ $task->status['name']}} </td>
                                <td>


                                            <a href="{{ route('edit',['id' => $task['id']]) }}"><button class="btn btn-primary">редактировать</button></a>

                                            {!! Form::open(['method' => 'DELETE', 'route' =>['destroy', 'id' => $task['id']]])!!}
                                            <button class="btn btn-danger" onclick="return confirm('Удалить задачу?')" style="margin-top: 5px">удалить</button>
                                            {!! Form::close() !!}</div>

                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
@endsection
