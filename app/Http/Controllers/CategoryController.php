<?php

namespace App\Http\Controllers;

use App\Category;
use App\Filters\ProductFilter;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Показать категории
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = Category::all();

        return view('category.index');
    }

    /**
     * Показать форму создания категории
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Сохранить категорию в БД
     *
     * @param  \App\Http\Requests\CategoryStoreRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CategoryStoreRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->input();

        $model = (new Category())->fill($data);

        $result = $model->save();

        if ($result) {
            return back()->with(['success' => 'Категория успешно создана']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка создания категории']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return void
     */
    public function show($id)
    {
        $model = Category::findOrFail($id);

        dd($model);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Category::findOrFail($id);

        dd($model);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id): \Illuminate\Http\RedirectResponse
    {
        $model = Category::findOrFail($id);

        $data = $request->input();

        $result = $model->update($data);

        if ($result) {
            return back()->with(['success' => 'Категория успешно обновлена']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка обновления категории']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(int $id): \Illuminate\Http\RedirectResponse
    {
        $model = Category::findOrFail($id);

        $result = $model->delete();

        if ($result) {
            return back()->with(['success' => 'Категория успешно удалена']);
        } else {
            return back()->withErrors(['msg' => 'Ошибка удаления категории']);
        }
    }
}
