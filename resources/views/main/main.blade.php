@extends('layouts.app')

@section('title')
    Главная
@endsection

@section('content')
<div class="content">    

    <!-- About section -->
    <section class="about-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <img src="{{ asset('img/about.jpg') }}" alt="">
                </div>
                <div class="col-lg-7 about-text">
                    <h2>Мы заботимся о твоих глазах</h2>
                    <p>Оптика «Для твоих глаз» — салоны оптики, в которых вы всегда можете подобрать и приобрести качественную продукцию от ведущих брендов. В наш ассортимент включены линзы в разных цветах, размерах, с различными характеристиками. Определением сферической кривизны и диоптрий занимаются исключительно квалифицированные специалисты. Мы рекомендуем вам уделить 20 минут и сначала посетить врача и пройти диагностику. Зная подходящие вам параметры, вы сможете с легкостью подобрать оптимальные модели и носить их с удовольствием! На всю продукцию у нас установлены доступные цены. Мы гарантируем высокое качество представленных товаров и их соответствие заявленным производителем характеристикам. Оригинальность и качество изделий подтверждается сертификатами.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- About section end -->

    <!-- Services section -->
    <section class="services-section spad">
        <div class="container">
            <div class="section-title text-center">
                <h2>Наши услуги</h2>
            </div>
            <div class="row">
                <div class="col-12 col-lg-6 service">
                    <div class="service-icon">
                        <i class="icon-doctor-1"></i>
                    </div>
                    <div class="service-content">
                        <h4>Консультация офтальмолога</h4>
                        <p>Даже при отсутствии жалоб на свое зрение мы призываем Вас проходить диагностику зрения как минимум один раз в год. </p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 service">
                    <div class="service-icon">
                        <i class="icon-clinic-history-5"></i>
                    </div>
                    <div class="service-content">
                        <h4>Диагностика зрения</h4>
                        <p>Качественная диагностика зрения позволяет правильно выявить все нарушения важнейшего органа восприятия.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 service">
                    <div class="service-icon">
                        <i class="icon-glasses"></i>
                    </div>
                    <div class="service-content">
                        <h4>Изготовление и ремонт очков</h4>
                        <p>При многих заболеваниях для коррекции зрения назначается ношение корректирующих очков.</p>
                    </div>
                </div>
                <div class="col-12 col-lg-6 service">
                    <div class="service-icon">
                        <i class="icon-blood-drop"></i>
                    </div>
                    <div class="service-content">
                        <h4>Подбор контактных линз</h4>
                        <p>Перед покупкой линз для глаз нужно учесть десятки характеристик, чтобы избежать ухудшения зрения.</p>
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
    <!-- Services section end -->


    <!-- Gallery section -->
    <div class="gallery-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-sm-6 p-0">
                    <img src="{{ asset('img/gallery/1.jpg') }}" alt="">
                </div>
                <div class="col-lg-3 col-sm-6 p-0">
                    <img src="{{ asset('img/gallery/2.jpg') }}" alt="">
                </div>
                <div class="col-lg-3 col-sm-6 p-0">
                    <img src="{{ asset('img/gallery/3.jpg') }}" alt="">
                </div>
                <div class="col-lg-3 col-sm-6 p-0">
                    <img src="{{ asset('img/gallery/4.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Gallery section end -->  
</div>
@endsection
