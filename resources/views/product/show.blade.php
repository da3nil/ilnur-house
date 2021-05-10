@extends('layouts.app')

@section('content')
    <!-- The modal -->
    <div class="modal fade" id="updateProduct" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Редактировать товар</h4>
                </div>
                <form enctype="multipart/form-data" action="{{ route('product.update', ['product' => $product->id]) }}"
                      method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-img">Картинка</label>
                            <input name="img" class="" type="file" id="product-img">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-name">Название</label>
                            <input name="name" class="form-control" type="text" placeholder="Введите название"
                                   id="product-name" value="{{ $product->name }}">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-desc">Описание товара</label>
                            <textarea style="width: 100%" name="content" class="form-control"
                                      placeholder="Введите описание"
                                      id="product-desc">{{ $product->content }}</textarea>
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-price">Цена за единицу товара (руб.)</label>
                            <input name="price" class="form-control" type="number" placeholder="Введите цену"
                                   id="product-price" value="{{ $product->price }}">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-qty">Позиций товара на складе</label>
                            <input name="qty" class="form-control" type="number" placeholder="Введите кол-во позиций"
                                   id="product-qty" value="{{ $product->qty }}">
                        </div>
                        <div class="input-group" style="width: 100%;margin-bottom: 1rem">
                            <label for="product-category">Категория</label>
                            <select class="form-control" name="category_id" id="product-category">
                                @foreach($categories as $category)
                                    <option @if($category->id === $product->category_id) selected
                                            @endif value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-success">Обновить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="deleteProduct" tabindex="-1" role="dialog" aria-labelledby="modalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id="modalLabel">Подтверждение</h4>
                </div>

                <div class="modal-body" style="text-align: center">
                    <h4>Вы действительно хотите удалить товар '{{ $product->name }}'?</h4>
                </div>
                <form method="POST" action="{{ route('product.destroy', ['product' => $product->id]) }}">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="container" style="margin-top: 2rem">
        @include('layouts.alert-result')
    </div>

    <div class="single contact">
        <div class="container">
            <div class="single-main">
                <div class="col-md-9 single-main-left">
                    <div class="sngl-top">
                        <div class="col-md-5 single-top-left" style="text-align: center">
                            <img style="max-width: 100%; height: auto" class="img-fluid"
                                 src="{{ asset($product->img) }}" alt="">
                        </div>
                        <div class="col-md-7 single-top-right">
                            <div class="single-para simpleCart_shelfItem">
                                <h2>{{ $product->name }}</h2>
                                <h5 class="item_price"
                                    style="font-family: Bree-Serif-k, sans-serif">{{ $product->price }} руб. за
                                    штуку</h5>
                                <p>{{ $product->content }}</p>
                                <h3>На складе: {{ $product->qty }} позиций товара</h3>
                                <h3>Общая стоимость: {{ $product->qty * $product->price }} руб.</h3>
                                <a href="#updateProduct" class="add-cart item_add" data-toggle="modal"
                                   data-target="#updateProduct">Редактировать товар</a>
                                <a style="background: red;" href="#deleteProduct" class="add-cart item_add"
                                   data-toggle="modal" data-target="#deleteProduct">Удалить товар</a>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="col-md-3 single-right">
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
