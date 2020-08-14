@extends('layouts.app')

@section('title')
    Запись
@endsection

@section('content')
<div class="content">
    <section class="page-white-section">
        <div class="container">
            <h2>Новая запись на прием</h2>
        </div>
    </section>
		<div class="container">        
			<div class="row s_product_inner">
                <form class="form-optics-admin" method="POST" action="{{ '/appointments'}} ">
                    @csrf
                    <input type="datetime-local" id="dateTime" name="dateTime" value="{{ date('Y-m-d H:i') }}" required>
                    <input type="hidden" name="user_id" value="">
                    <input type="hidden" name="comment" value="">
                    <button type="submit" class="button btn primary-btn w-100">Добавить запись</button>
                </form>           
			</div>
		</div>
	</div>  
@endsection
