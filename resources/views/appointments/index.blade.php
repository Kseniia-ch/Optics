@extends('layouts.app')

@section('title')
    Запись
@endsection

@section('content')
<div class="content">   
    <section class="page-white-section">
        <div class="container">
            <h2>Запись на прием</h2>
        </div>
    </section>

        <div class="container">
        <div class="row">  
            <div class="col-12">
            @auth  
                @if ($appointments->count() == 0)
                <h4 class="text-center">Нет актуальных записей</h4>
                @else
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Дата и время</th>
                            @if (Auth::user()->isManager() || Auth::user()->isAdmin())
                                <th>Клиент</th>
                                <th>Принять</th>
                                <th>Удалить</th>
                            @else
                                <th>Записаться</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($appointments as $appointment)
                            <tr>
                            <th>{{ date('Y-m-d H:i', strtotime($appointment->dateTime)) }}</th>
                                @if (Auth::user()->isManager() || Auth::user()->isAdmin())
                                    <td>    
                                        @if (isset($appointment->user_id))  
                                            {{ $appointment->user->name }} ({{ $appointment->user->email }})                                         
                                        @else
                                            —
                                        @endif
                                    </td> 
                                    <td>
                                        <a class="button primary-btn" href="{{ route('appointments.edit', $appointment->id) }}">Принять</a>
                                    </td> 
                                    <td>
                                        <form class="form-optics-admin" id="d{{ $appointment->id }}" method="POST" action="{{ '/appointments/'.$appointment->id}} ">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="button btn primary-btn w-100" {{ isset($appointment->user_id) ? "disabled" : ""}}>Удалить</button>
                                        </form>
                                    </td>                                     
                                @else
                                    @if ($appointment->user_id == Auth::user()->id)
                                        <td>
                                            <form class="form-optics-admin" id="up{{ $appointment->id }}" method="POST" action="{{ '/appointments/'.$appointment->id}} ">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="dateTime" value="{{ $appointment->dateTime }}">
                                                <input type="hidden" name="user_id" value="">
                                                <input type="hidden" name="comment" value="{{ $appointment->comment }}">
                                                <button type="submit" class="button btn primary-btn w-100" {{ isset($appointment->comment) ? "disabled" : "" }}>Отменить запись</button>
                                            </form>       
                                        </td>            
                                    @else
                                        <td>
                                            <form class="form-optics-admin" id="up{{ $appointment->id }}" method="POST" action="{{ '/appointments/'.$appointment->id}} ">
                                                @method('PUT')
                                                @csrf
                                                <input type="hidden" name="dateTime" value="{{ $appointment->dateTime }}">
                                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                                <input type="hidden" name="comment" value="{{ $appointment->comment }}">
                                                <button type="submit" class="button btn primary-btn w-100" {{ isset($appointment->user_id) ? "disabled" : "" }}>Записаться</button>
                                            </form>
                                        </td>    
                                    @endif
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif

                @if (Auth::user()->isManager() || Auth::user()->isAdmin())
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="card text-center card-product">
                        <a class="button primary-btn" href="{{ url('appointments/create') }}">Добавить запись</a>
                        </div>
                    </div>
                @endif
            @endauth
            </div>
        </div>
        </div>
    
</div>
@endsection
