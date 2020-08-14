@extends('layouts.app')

@section('title')
    Категории
@endsection

@section('content')
<div class="content"> 
    <section class="page-white-section">
        <div class="container">
            <h2>Категории товаров</h2>
        </div>
    </section>  
        <div class="container">
        <div class="row">
            <div class="col-12">
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                @foreach ($categories as $category)
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-center card-product">
                    <div class="card-body">
                        <h4 class="card-product__title"><a href="{{ url('categories/'.$category->id) }}">{{ $category->name }}</a></h4>
                    </div>
                    <a class="button primary-btn" href="{{ route('categories.edit',$category->id) }}">Изменить</a>
                    <form class="form-optics-admin" id="d{{ $category->id }}" method="POST" action="{{ '/categories/'.$category->id}} ">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="button btn primary-btn w-100">Удалить</button>
                    </form>
                    </div>
                </div>
                @endforeach 
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card text-center card-product">
                    <div class="card-body">
                        <h4 class="card-product__title">...</h4>
                    </div>
                    <a class="button primary-btn" href="{{ url('categories/create') }}">Добавить</a>
                    </div>
                </div>
                </div>
            </section>
            </div>
        </div>
        </div>
    
</div>
@endsection
