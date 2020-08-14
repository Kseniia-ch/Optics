@extends('layouts.app')

@section('title')
    Товары
@endsection

@section('content')
<div class="content">
    <section class="page-white-section">
        <div class="container">
            <h2>Редактировать товар</h2>
        </div>
    </section>
		<div class="container">
			<div class="row s_product_inner">
                <form class="product-form" method="POST" action="{{ route('goods.update',$good->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image_path" name="image_path" accept="image/*,image/jpeg" lang="ru">
                        <label class="{{ (isset($good->image_path)) ? 'custom-file-label selected' : 'custom-file-label' }}" for="image_path">{{ (isset($good->image_path)) ? $good->image_path : 'Выберите картинку' }}</label>
                    </div>
                    <input type="text" id="name" name="name" placeholder="Название" value="{{ $good->name }}" required>
                    <input type="number" id="price" name="price" placeholder="Цена" value="{{ $good->price }}"  min="0.01" step="0.01" required>
                    <select id="category_id" name="category_id" value="{{ $good->category->id }}" required>
                        @foreach ($categories as $category)
                            <option {{ ($category->id == $good->category->id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <textarea id="description" name="description" placeholder="Описание">{{ $good->description }}</textarea>
                    <button type="submit" class="button btn primary-btn">Сохранить товар</button>
                </form>
			</div>
		</div>
	</div>  
@endsection
