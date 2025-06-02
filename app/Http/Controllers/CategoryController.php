<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Kategori";

        $categories = Category::orderByDesc('id')->search(request(['search']))->paginate(5)->withQueryString();

        return view('admin.kategori.index', compact('categories','title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Kategori";

        return view('admin.kategori.addCategory', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryStoreRequest $request)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {
            $validated['slug'] = Str::slug($validated['name']);


            Category::create($validated);

            DB::commit();

            return redirect()->route('admin.category.index')->with('successCategory', 'Berhasil Menambahkan Kategori');

        } catch (Exception $exeption) {

            DB::rollBack();

            return redirect()->route('admin.category.index')->with('FailedCategory', $exeption->getMessage());
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $title = "Kategori";

        return view('admin.kategori.updateCategory',compact('category','title'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        DB::beginTransaction();
        $validated = $request->validated();

        try {

            $validated['slug'] = Str::slug($validated['name']);


            $category->update($validated);

            DB::commit();

            return redirect()->route('admin.category.index')->with('successCategory', 'Berhasil Mengubah Kategori');

        } catch (Exception $exeption) {
            DB::rollBack();
            return redirect()->route('admin.category.index')->with('FailedCategory', $exeption->getMessage());

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        DB::beginTransaction();

        try {
           
            $category->delete();
            DB::commit();

            return redirect()->route('admin.category.index');

        } catch (Exception $exeption) {
            
            DB::rollBack();
            return redirect()->route('admin.categories.index')->with('FailedCategory', $exeption->getMessage());

        }
    }
}

