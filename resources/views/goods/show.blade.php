@extends('layouts.app')

@section('title')
    Товары
@endsection

@section('content')
<div class="content">   
    
    <div class="product_image_area">
		<div class="container">
			<div class="row s_product_inner">
				<div class="col-lg-6">
                    <img class="card-img" src="{{ asset('storage/goodimg/'.$good->image_path) }}" alt="">
                </div>
				<div class="col-lg-5 offset-lg-1">
					<div class="s_product_text">
						<h3>{{ $good->name }}</h3>
						<h2>{{ $good->price }} грн.</h2>
						<ul class="list">
							<li><span>Category</span> : {{ $good->category->name }}</li>
						</ul>
                        <p>{{ $good->description }}</p>
                        @auth                      
						@if (Auth::user()->isManager() || Auth::user()->isAdmin())

                            <a class="button primary-btn w-50" href="{{ route('goods.edit',$good->id) }}">Редактировать</a>
							<form id="d{{ $good->id }}" method="POST" action="{{ '/goods/'.$good->id}} ">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn button primary-btn w-50">Удалить</button>
                            </form>

                        @endif
                    	@endauth  
					</div>
				</div>
			</div>
		</div>
	</div>
    
</div>
@endsection
