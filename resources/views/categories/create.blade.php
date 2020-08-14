@extends('layouts.app')

@section('title')
    Категории
@endsection

@section('content')
<div class="content">
    <section class="page-white-section">
        <div class="container">
            <h2>Добавить новую категорию</h2>
        </div>
    </section>
		<div class="container"> 
        
			<div class="row s_product_inner">
                
                <form class="form-optics-admin" method="POST" action="/categories" enctype="multipart/form-data">
                    @csrf
                    <input type="text" id="name" name="name" placeholder="Название" required>
                    <button type="submit" class="button btn primary-btn">Добавить категорию</button>
                </form>
			</div>
		</div>
	</div>  
@endsection
