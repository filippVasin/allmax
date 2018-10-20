@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Задачи:</h3>
            </div>
            @if(Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <form action="{{ route('list') }}" method="POST" enctype="multipart/form-data">
                <div class="box">
                    <select name="status_id">
                        @if($statuses)
                            <option value="0">Выберите статус</option>
                            @foreach($statuses as $status)
                                <option value = "{{ $status['id'] }}">{{ $status['name'] }}</option>
                            @endforeach
                        @endif
                    </select>

                    <select name="priority_id">
                        @if($priorities)
                            <option value="0">Выберите приоритет</option>
                            @foreach($priorities as $priority)
                                <option value = "{{ $priority['id'] }}">{{ $priority['name'] }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <input type="submit"  value="Отфильтровать" name="submit" class="btn btn-success" style="margin-top: 5px">
                <input type="hidden" value="{{ csrf_token()}}" name="_token" >
            </form>
            <a href="{{ route('create') }}"><button class="btn btn-success" style="margin-top: 5px">Новая задача</button></a>
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
                                    {!! Form::open(['method' => 'DELETE', 'route' =>['destroy', 'id' => $task['id']]])!!}
                                    <button onclick="return confirm('Удалить задачу?')">удалить</i></button>
                                    {!! Form::close() !!}
                                    <a href="{{ route('edit',['id' => $task['id']]) }}"><button>редактировать</button></a>

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
