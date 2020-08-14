@extends('layouts.app')

@section('title')
    Запись
@endsection

@section('content')
<div class="content">
    <section class="page-white-section">
        <div class="container">
            <h2>Прием</h2>
        </div>
    </section>
		<div class="container">
			<div class="row s_product_inner">
                <form class="form-optics-admin" method="POST" action="{{ route('appointments.update', $appointment->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="dateTime" name="dateTime" value="{{ date('Y-m-d H:i', strtotime($appointment->dateTime)) }}">
                    <input type="datetime-local" id="dateTime2" name="dateTime2" value="{{ date('Y-m-d H:i', strtotime($appointment->dateTime)) }}" disabled>
                    <input type="hidden" id="user_id" name="user_id" value="{{ $appointment->user_id }}">
                    <input type="text" id="name" name="name" placeholder="Имя клиента" value="{{ $appointment->user->name }}" disabled>
                    <input type="email" id="email" name="email" placeholder="Email" value="{{ $appointment->user->email }}" disabled>
                    <textarea id="comment" name="comment" placeholder="Описание">{{ $appointment->comment }}</textarea>
                    <button type="submit" class="button btn primary-btn w-100">Записать</button>
                </form>
			</div>
		</div>
	</div>  
@endsection
