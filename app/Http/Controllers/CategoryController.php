<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
        $query = Category::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $category = $query->get();
        // dd($category);
        return view(
            'category.index',
            [
                'title' => 'Kategori Surat',
                'categories' => $category,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    function create()
    {
        return view('category.create', ['title' => 'Form Kategori']);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create($validated);
        return redirect('/category')->with('success', 'Kategori berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('category.edit', [
            'title' => 'Edit Kategori',
            'category' => $category,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validate = $request->validate([
            'id'          => 'required|exists:categories,id',
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $category = Category::findOrFail($request->id);
        $category->update($validate);

        return redirect('/category')->with('success', 'Kategori berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {

        $category = Category::findOrFail($request->id);
        $category->delete();
        return redirect('/category')->with("success", "Surat Berhasil dihapus!");
    }
}
