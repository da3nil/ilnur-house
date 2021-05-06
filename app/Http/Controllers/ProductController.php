<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Показать продукты
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Product::paginate(15);

        dd($data);
    }

    /**
     * Показать форму создания продукта
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Сохранить товар в БД
     *
     * @param  \App\Http\Requests\ProductStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ProductStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->input();

        $model = (new Product())->fill($data);

        $result = $model->save();

        if ($result) {
            return back()->with(['success' => 'Товар успешно создан']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка создания товара']);
        }
    }

    /**
     * Показать продукт
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Product::findOrFail($id);

        dd($model);
    }

    /**
     * Показать форму изменения продукта
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Product::findOrFail($id);

        dd($model);
    }

    /**
     * Обновить продукт в БД
     *
     * @param  \App\Http\Requests\ProductUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProductUpdateRequest $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $model = Product::findOrFail($id);

        $data = $request->input();

        $result = $model->fill($data)->save();

        if ($result) {
            return back()->with(['success' => 'Товар успешно обновлен']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка обновления товара']);
        }
    }

    /**
     * Удалить товар
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $model = Product::findOrFail($id);

        $result = $model->delete();

        if ($result) {
            return back()->with(['success' => 'Товар успешно удален']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления товара']);
        }
    }
}
