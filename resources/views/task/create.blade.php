@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('save') }}" method="post" enctype="multipart/form-data">
            <div class="box-body" style="display: flex;
                                                flex-direction: column;
                                                width: 300px;
                                                height: 200px;
                                                justify-content: space-between;">
                <input type="text"  name="title" required placeholder="Задача">
                <div class="box">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Выберите статус</label>
                        <select name="status_id">
                            @if($statuses)
                                @foreach($statuses as $status)
                                    @if(1 == $status['id'] )
                                        <option value = "{{ $status['id'] }}"  selected>{{ $status['name'] }}</option>
                                    @else
                                        <option value = "{{ $status['id'] }}">{{ $status['name'] }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Выберите приоритет</label>
                        <select name="priority_id">
                            @if($priorities)
                                @foreach($priorities as $priority)
                                    @if(2 == $priority['id'] )
                                        <option value = "{{ $priority['id'] }}"  selected>{{ $priority['name'] }}</option>
                                    @else
                                        <option value = "{{ $priority['id'] }}">{{ $priority['name'] }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <input type="submit"  value="Создать задачу" name="submit" class="btn btn-success" style="margin-top: 5px">
                <input type="hidden" value="{{ csrf_token()}}" name="_token" >
            </div>
        </form>
        <a href="{{ route('list')}}"  class="btn btn-cancel" style="margin-left: 10px;width: 280px;">Отмена</a>
    </div>
@endsection