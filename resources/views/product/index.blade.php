@extends('layouts.app')

@section('content')

    <div class="modal fade" id="createProduct" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Создать товар</h4>
                </div>
                <form enctype="multipart/form-data" action="{{ route('product.store') }}"
                      method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-img">Картинка</label>
                            <input name="img" class="" type="file" id="product-img">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-name">Название</label>
                            <input name="name" class="form-control" type="text" placeholder="Введите название"
                                   id="product-name">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-desc">Описание товара</label>
                            <textarea style="width: 100%" name="content" class="form-control"
                                      placeholder="Введите описание"
                                      id="product-desc"></textarea>
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-price">Цена за единицу товара (руб.)</label>
                            <input name="price" class="form-control" type="number" placeholder="Введите цену"
                                   id="product-price">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-qty">Позиций товара на складе</label>
                            <input name="qty" class="form-control" type="number" placeholder="Введите кол-во позиций"
                                   id="product-qty">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-category">Категория</label>
                            <select class="form-control" name="category_id" id="product-category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Создать</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 2rem">
        @include('layouts.alert-result')
    </div>

    <div class="prdt">
        <div class="container">
            <div class="prdt-top">
                <div class="col-md-9">
                    <div class="row" style="display: flex;flex-flow: row wrap;align-items: stretch">
                        @foreach($products as $product)
                            <div class="col-md-4" style="margin-bottom: 30px;">
                                <div href="#" class="product-main simpleCart_shelfItem" style="height: 100%;">
                                    <a href="{{ route('product.show', ['product' => $product->id]) }}" style="display: block; width: 100%">
                                        <span href="single.html" class="mask" style="padding-bottom: 20px"><img class="img-responsive zoom-img" src="{{ asset($product->img) }}" alt=""></span>
                                        <div class="product-bottom">
                                            <h3>{{ $product->name }}</h3>
                                            <p>{{ $product->content }}</p>
                                            <h5 style="font-family: Bree-Serif-k, sans-serif; color: #000000">На складе: <span>{{ $product->qty }}</span> шт.</h5>
                                            <h4><a class="item_add" href="#"><i></i></a> <span class=" item_price" style="font-family: 'Bree-Serif-k', sans-serif">{{ $product->price }} руб.</span></h4>
                                        </div>
                                        <div class="srch srch1">
{{--                                            <span>10 шт.</span>--}}
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div style="display: flex; justify-content: center">
                        {{ $products->links() }}
                    </div>
                </div>
                <div class="col-md-3 prdt-right sticky-top" style="position:sticky;top:20px">
                    <div class="w_sidebar" style="border: none">
                        <section class="sky-form" style="border: 1px solid #EBEBEB;margin-top: 0">
                            <h4 style="margin-top: 0">Категории</h4>
                            <div class="row1 scroll-pane" style="height: auto;max-height: 155px">
                                <div class="col col-4">
                                    @foreach($categories as $category)
                                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>{{ $category->name }}</label>
                                    @endforeach
                                </div>
                            </div>
                            <a style="width: 100%; margin: 0; text-align: center" href="#createProduct" class="add-cart item_add" data-toggle="modal"
                               data-target="#createProduct">Применить фильтр</a>
                        </section>
                        <section class="sky-form" style="border: 1px solid #EBEBEB;margin-top: 20px">
                            <h4 style="margin-top: 0">Управление товарами</h4>
                            <div class="row1 row2 scroll-pane" style="height: auto;">
                                <a style="width: 100%; margin: 0; text-align: center; background: #73B6E1;" href="#createProduct" class="add-cart item_add" data-toggle="modal"
                                   data-target="#createProduct">Создать товар</a>
                            </div>
                        </section>
{{--                        <section class="sky-form">--}}
{{--                            <h4>Colour</h4>--}}
{{--                            <ul class="w_nav2">--}}
{{--                                <li><a class="color1" href="#"></a></li>--}}
{{--                                <li><a class="color2" href="#"></a></li>--}}
{{--                                <li><a class="color3" href="#"></a></li>--}}
{{--                                <li><a class="color4" href="#"></a></li>--}}
{{--                                <li><a class="color5" href="#"></a></li>--}}
{{--                                <li><a class="color6" href="#"></a></li>--}}
{{--                                <li><a class="color7" href="#"></a></li>--}}
{{--                                <li><a class="color8" href="#"></a></li>--}}
{{--                                <li><a class="color9" href="#"></a></li>--}}
{{--                                <li><a class="color10" href="#"></a></li>--}}
{{--                                <li><a class="color12" href="#"></a></li>--}}
{{--                                <li><a class="color13" href="#"></a></li>--}}
{{--                                <li><a class="color14" href="#"></a></li>--}}
{{--                                <li><a class="color15" href="#"></a></li>--}}
{{--                                <li><a class="color5" href="#"></a></li>--}}
{{--                                <li><a class="color6" href="#"></a></li>--}}
{{--                                <li><a class="color7" href="#"></a></li>--}}
{{--                                <li><a class="color8" href="#"></a></li>--}}
{{--                                <li><a class="color9" href="#"></a></li>--}}
{{--                                <li><a class="color10" href="#"></a></li>--}}
{{--                            </ul>--}}
{{--                        </section>--}}
{{--                        <section class="sky-form">--}}
{{--                            <h4>discount</h4>--}}
{{--                            <div class="row1 row2 scroll-pane">--}}
{{--                                <div class="col col-4">--}}
{{--                                    <label class="radio"><input type="radio" name="radio" checked=""><i></i>60 % and above</label>--}}
{{--                                    <label class="radio"><input type="radio" name="radio"><i></i>50 % and above</label>--}}
{{--                                    <label class="radio"><input type="radio" name="radio"><i></i>40 % and above</label>--}}
{{--                                </div>--}}
{{--                                <div class="col col-4">--}}
{{--                                    <label class="radio"><input type="radio" name="radio"><i></i>30 % and above</label>--}}
{{--                                    <label class="radio"><input type="radio" name="radio"><i></i>20 % and above</label>--}}
{{--                                    <label class="radio"><input type="radio" name="radio"><i></i>10 % and above</label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </section>--}}
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
