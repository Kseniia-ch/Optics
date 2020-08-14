@extends('layouts.app')

@section('title')
    Контакты
@endsection

@section('content')
<div class="content">    

    <!-- Contact section -->
	<section class="contact-section smpad smar">   
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="contact-text">
						<h3>Связаться</h3>
						<div class="contact-info">
							<div class="ci-image set-bg" data-setbg="{{ asset('img/doctors/1.jpg') }}"></div>
							<div class="ci-content">
								<p>Людмила Олександровна</p>
								<p>000-000-00-00</p>
								<p>office@opticsforyoureyes.ua</p>
							</div>
						</div>
					</div>
					<form class="contact-form">
						<input type="text" placeholder="Имя">
						<input type="email" placeholder="Email">
						<input type="text" placeholder="Тема">
						<textarea placeholder="Сообщение"></textarea>
						<button class="button btn primary-btn">Отправить</button>
					</form>
				</div>
			</div>
        </div>
        
        <div class="map" id="map-canvas">
            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?width=100%25&amp;height=100%&amp;hl=ru&amp;q=%D1%83%D0%BB.%20%D0%96%D0%B8%D0%BB%D1%8F%D0%BD%D1%81%D0%BA%D0%B0%D1%8F,%20%D0%9A%D0%B8%D0%B5%D0%B2+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
        </div>
		
	</section>
	<!-- Contact section end -->
    
</div>
@endsection
