@extends('admin.master.master')

@section('content')
<section class="dash_content_app">

    <header class="dash_content_app_header">
        <h2 class="icon-search">Filtro</h2>

        <div class="dash_content_app_header_actions">
            <nav class="dash_content_app_breadcrumb">
                <ul>
                    <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                    <li class="separator icon-angle-right icon-notext"></li>
                    <li><a href="{{ route('admin.properties.index') }}">Imóveis</a></li>
                </ul>
            </nav>

            <a href="{{ route('admin.properties.create') }}" class="btn btn-orange icon-home ml-1">Criar Imóvel</a>
            <button class="btn btn-green icon-search icon-notext ml-1 search_open"></button>
        </div>
    </header>

    @include('admin.properties.filter')

    <div class="dash_content_app_box">
        <div class="dash_content_app_box_stage">
            <div class="realty_list">
                @if(!empty($properties))
                    @foreach($properties as $property)
                        <div class="realty_list_item mb-2">
                            <div class="realty_list_item_actions_stats">
                                <img src="{{ $property->cover() }}" alt="">
                                <ul>
                                    @if($property->sale == true && !empty($property->sale_price))
                                        <li>Venda: R$ {{ $property->sale_price }}</li>
                                    @endif

                                    @if($property->rent == true && !empty($property->rent_price))
                                        <li>Aluguel: R$ {{ $property->rent_price }}</li>
                                    @endif
                                </ul>
                            </div>

                            <div class="realty_list_item_content">
                                <h4>#{{ $property->id }} {{ $property->category }} - {{ $property->type }}</h4>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-location"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Bairro:</span>
                                        <span class="realty_list_item_description_content">{{ $property->neighborhood }}</span>
                                    </div>
                                </div>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-util-area"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Área Útil:</span>
                                        <span class="realty_list_item_description_content">{{ $property->area_util }}m&sup2;</span>
                                    </div>
                                </div>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-bed"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Domitórios:</span>
                                        <span class="realty_list_item_description_content">{{ $property->bedrooms + $property->suites }} Quartos<br><span>Sendo {{ $property->suites }} suítes</span></span>
                                    </div>
                                </div>

                                <div class="realty_list_item_card">
                                    <div class="realty_list_item_card_image">
                                        <span class="icon-realty-garage"></span>
                                    </div>
                                    <div class="realty_list_item_card_content">
                                        <span class="realty_list_item_description_title">Garagem:</span>
                                        <span class="realty_list_item_description_content">{{ $property->garage + $property->garage_covered }} Vagas<br><span>Sendo {{ $property->garage_covered }} cobertas</span></span>
                                    </div>
                                </div>

                            </div>

                            <div class="realty_list_item_actions">
                                <ul>
                                    <li class="icon-eye">1234 Visualizações</li>
                                </ul>
                                <div>
                                    <a href="" class="btn btn-blue icon-eye">Visualizar Imóvel</a>
                                    <a href="{{ route('admin.properties.edit', ['property' => $property->id]) }}" class="btn btn-green icon-pencil-square-o">Editar
                                        Imóvel</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="no-content">Não foram encontrados registros!</div>
                @endif
            </div>
        </div>
    </div>
</section>
@endsection