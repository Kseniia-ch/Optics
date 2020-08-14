@extends('layouts.app')

@section('title')
    Категории
@endsection

@section('content')
<div class="content">
    <section class="page-white-section">
        <div class="container">
            <h2>Редактировать категорию</h2>
        </div>
    </section>
		<div class="container">
			<div class="row s_product_inner">
                <form class="form-optics-admin" method="POST" action="{{ route('categories.update',$category->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="text" id="name" name="name" placeholder="Название" value="{{ $category->name }}" required>
                    <button type="submit" class="button btn primary-btn">Сохранить категорию</button>
                </form>
			</div>
		</div>
	</div>  
@endsection
