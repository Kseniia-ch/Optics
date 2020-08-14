@extends('layouts.app')

@section('title')
    Товары
@endsection

@section('content')
<div class="content">   
    <section class="section-margin--small mb-5">
        <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-4 col-md-5">
            <div class="sidebar-categories">
                <div class="head">Категории товаров</div>
                <ul class="main-categories">
                <li class="common-filter">
                    <form method="GET" action="/goods">
                    {{ csrf_field() }}
                    <ul>
                    <li class="filter-list"><label for="all"><input class="pixel-radio" type="radio" id="all" name="category_id" value="" onchange="this.form.submit()" {{ ($category_fil=="")? "checked" : "" }}>Все категории</label></li>
                        @foreach ($categories as $category)
                        <li class="filter-list"><label for="{{ $category->id }}"><input class="pixel-radio" type="radio" id="{{ $category->id }}" name="category_id" value="{{ $category->id }}" onchange="this.form.submit()" {{ ($category_fil==($category->id))? "checked" : "" }}>{{ $category->name }}</label></li>
                        @endforeach
                    </ul>
                    </form>
                </li>
                </ul>
            </div>
            @auth                      
				@if (Auth::user()->isManager() || Auth::user()->isAdmin())			
                <a class="button primary-btn w-100 mt-3 text-center" href="{{ url('goods/create') }}">Добавить</a>
                @endif
            @endauth  
            </div>
            <div class="col-xl-9 col-lg-8 col-md-7">

            <!-- Start Best Seller -->
            <section class="lattest-product-area pb-40 category-list">
                <div class="row">
                @foreach ($goods as $good)
                <div class="col-md-6 col-lg-4">
                    <div class="card text-center card-product">
                    <div class="card-product__img">
                        <img class="card-img" src="{{ asset('storage/goodimg/'.$good->image_path) }}" alt="">
                    </div>
                    <div class="card-body">
                        <p>{{ $good->category->name }}</p>
                        <h4 class="card-product__title"><a href="{{ url('goods/'.$good->id) }}">{{ $good->name }}</a></h4>
                        <p class="card-product__price">{{ $good->price }} грн.</p>   
                    </div>
                    @auth                      
                        @if (Auth::user()->isManager() || Auth::user()->isAdmin())
                            <a class="button primary-btn" href="{{ route('goods.edit',$good->id) }}">Редактировать</a>
                            <form class="product-form" id="d{{ $good->id }}" method="POST" action="{{ '/goods/'.$good->id}} ">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="button btn primary-btn w-100">Удалить</button>
                            </form>
                            
                        @endif
                    @endauth  
                    </div>
                </div>
                @endforeach 
                </div>
            </section>
            <!-- End Best Seller -->
            </div>
        </div>
        </div>
    </section>
    
</div>
@endsection
