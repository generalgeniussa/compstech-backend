<?php

namespace App\Http\Controllers;

use App\Category;
use App\InternetCategory;
use Faker\Provider\ar_JO\Internet;
use Illuminate\Http\Request;

class InternetCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('API_index');
    }

    public function index()
    {
        $categories = InternetCategory::all();
        return view('internet-category.list', compact('categories'));
    }

    public function API_index() {
        $categories = InternetCategory::with('subcategories.products')->get();
        return $categories;
    }

    public function create()
    {
        $category = new InternetCategory();
        return view('internet-category.create', compact('category'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        InternetCategory::create($request->all());
        $request->session()->flash('alert-success', 'Internet category saved');
        return redirect()->route('internet-categories:list');
    }

    public function edit($internetCategoryId)
    {
        $category = InternetCategory::findOrFail($internetCategoryId);

        return view('internet-category.edit', compact('category'));
    }

    public function update(Request $request, $internetCategoryId)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        InternetCategory::findOrFail($internetCategoryId)->fill($request->all())->save();

        $request->session()->flash('alert-success', 'Internet category updated');
        return redirect()->route('internet-categories:list');
    }

    public function delete(Request $request, $internetCategoryId)
    {
        InternetCategory::findOrFail($internetCategoryId)->delete();

        $request->session()->flash('alert-success', 'Internet category deleted');
        return redirect()->route('internet-categories:list');
    }
}
