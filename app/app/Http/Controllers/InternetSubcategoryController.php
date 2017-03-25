<?php

namespace App\Http\Controllers;

use App\InternetCategory;
use App\InternetSubcategory;
use Illuminate\Http\Request;

class InternetSubcategoryController extends Controller
{
    public function index($internetCategoryId)
    {
        $internetCategory = InternetCategory::find($internetCategoryId);
        $subcategories = $internetCategory->subcategories()->get();

        return view('internet-subcategories.list', compact('internetCategory', 'subcategories'));
    }

    public function create($internetCategoryId)
    {
        $internetCategory = InternetCategory::find($internetCategoryId);
        $internetSubcategory = new InternetSubcategory();

        return view('internet-subcategories.create', compact('internetCategory', 'internetSubcategory'));
    }

    public function store(Request $request, $internetCategoryId)
    {
        $this->validate($request, [
            'name' => 'required|max:255'
        ]);

        $internetSubcategory = new InternetSubcategory($request->all());
        $internetSubcategory->internetCategory()->associate($internetCategoryId);
        $internetSubcategory->save();
        $request->session()->flash('alert-success', 'Internet subcategory saved');
        return redirect()->route('internet-subcategories:list', ['internetCategoryId' => $internetCategoryId]);
    }

    public function edit(Request $request, $internetCategoryId, $internetSubcategoryId)
    {
        $internetCategory = InternetCategory::find($internetCategoryId);
        $internetSubcategory = InternetSubcategory::find($internetSubcategoryId);

        return view('internet-subcategories.edit', ['internetCategory' => $internetCategory, 'internetSubcategory' => $internetSubcategory]);
    }

    public function update(Request $request, $internetCategoryId, $internetSubcategoryId)
    {
        InternetSubcategory::find($internetSubcategoryId)
            ->find($internetSubcategoryId)
            ->update($request->all());

        $request->session()->flash('alert-success', 'Internet subcategory updated');
        return redirect()->route('internet-subcategories:list', ['internetCategoryId' => $internetCategoryId]);
    }

    public function delete(Request $request, $internetCategoryId, $internetSubcategoryId)
    {
        InternetSubcategory::findOrFail($internetSubcategoryId)->delete();
        $request->session()->flash('alert-success', 'Internet subcategory deleted');
        return redirect()->route('internet-subcategories:list', ['internetCategoryId' => $internetCategoryId]);
    }
}
