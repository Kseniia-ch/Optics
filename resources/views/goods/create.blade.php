@extends('layouts.app')

@section('title')
    Товары
@endsection

@section('content')
<div class="content">
    <section class="page-white-section">
        <div class="container">
            <h2>Добавить новый товар</h2>
        </div>
    </section>
		<div class="container">
			<div class="row s_product_inner">
                <form class="product-form" method="POST" action="/goods" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image_path" name="image_path" accept="image/*,image/jpeg" lang="ru">
                        <label class="custom-file-label" for="image_path">Выберите картинку</label>
                    </div>
                    <input type="text" id="name" name="name" placeholder="Название" required>
                    <input type="number" id="price" name="price" placeholder="Цена"  min="0.01" step="0.01" required>
                    <select id="category_id" name="category_id" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <textarea id="description" name="description" placeholder="Описание"></textarea>
                    <button type="submit" class="button btn primary-btn">Добавить товар</button>
                </form>
			</div>
		</div>
	</div>  
@endsection
