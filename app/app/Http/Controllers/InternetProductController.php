<?php

namespace App\Http\Controllers;

use App\InternetCategory;
use App\InternetSubcategory;
use App\InternetProduct;
use Illuminate\Http\Request;

class InternetProductController extends Controller
{
    public function index(Request $request, $internetCategoryId, $internetSubcategoryId)
    {
        $internetCategory = InternetCategory::find($internetCategoryId);
        $internetSubcategory = InternetSubcategory::find($internetSubcategoryId);
        $products = InternetSubcategory::find($internetSubcategoryId)->products()->get();
        return view('internet-products.list', compact('products', 'internetCategory', 'internetSubcategory'));
    }

    public function create(Request $request, $internetCategoryId, $internetSubcategoryId)
    {
        $internetCategory = InternetCategory::find($internetCategoryId);
        $internetSubcategory = InternetSubcategory::find($internetSubcategoryId);
        $product = new InternetProduct([
            'name' => '',
            'shortcode' => '',
            'description' => '',
            'capped' => 0,
            'shaped' => 0,
            'cap' => 0.00,
            'speed' => 0.00,
            'price' => 0.00
        ]);
        return view('internet-products.create', compact('product', 'internetCategory', 'internetSubcategory'));
    }

    public function store(Request $request, $internetCategoryId, $internetSubcategoryId)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'shortcode' => 'required|max:255',
            'description' => 'required|',
            'speed' => 'required',
            'price' => 'required'
        ]);

        $product = new InternetProduct($request->all());
        $product->internetCategory()->associate($internetCategoryId);
        $product->internetSubcategory()->associate($internetSubcategoryId);

        $product->save();

        $request->session()->flash('alert-success', 'Internet product saved');
        return redirect()->route('internet-products:list', ['internetCategoryId' => $internetCategoryId, 'internetSubcategoryId' => $internetSubcategoryId]);
    }

    public function edit(Request $request, $internetCategoryId, $internetSubcategoryId, $internetProductId)
    {
        $product = InternetProduct::find($internetProductId);
        $internetCategory = InternetCategory::find($internetCategoryId);
        $internetSubcategory = InternetSubcategory::find($internetSubcategoryId);
        return view('internet-products.edit', compact('product', 'internetCategory', 'internetSubcategory'));
    }

    public function update(Request $request, $internetCategoryId, $internetSubcategoryId, $internetProductId)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'shortcode' => 'required|max:255',
            'description' => 'required|',
            'speed' => 'required',
            'price' => 'required'
        ]);

        $product = InternetProduct::find($internetProductId)->fill($request->all());

        $product->capped = isset($request->capped);
        $product->shaped = isset($request->shaped);

        $product->save();

        $request->session()->flash('alert-success', 'Internet product updated');
        return redirect()->route('internet-products:list', ['internetCategoryId' => $internetCategoryId, 'internetSubcategoryId' => $internetSubcategoryId]);
    }

    public function delete(Request $request, $internetSubcategoryId, $internetCategoryId, $internetProductId)
    {
        InternetProduct::find($internetProductId)->delete();
        $request->session()->flash('alert-success', 'Internet product deleted');
        return redirect()->route('internet-products:list', ['internetCategoryId' => $internetCategoryId, 'internetSubcategoryId' => $internetSubcategoryId]);

    }

    public function fullList(Request $request)
    {
        $allInternetSubcategories = InternetSubcategory::all();
        $internetSubcategoryId = $request->internetSubcategoryId;
        $search = $request->search;

        $query = InternetProduct::select();

        if (isset($request->internetSubcategoryId)) {
            $query->where('internet_subcategory_id', $internetSubcategoryId);
        }

        if (isset($request->search)) {
            $searchTerm = $request->search;
            $searchableFields = collect(['name', 'shortcode']);
            $query->where(function ($query) use ($searchableFields, $searchTerm) {
                $searchableFields->each(function($field) use ($query, $searchTerm) {
                    $query->orWhere($field, 'LIKE', '%' .$searchTerm . '%');
                });
            });
        }

        $products = $query->get();

        return view('internet-products.full-list', compact('internetSubcategoryId', 'products', 'allInternetSubcategories', 'search'));
    }

    public function fullListFilter(Request $request)
    {
        return $this->fullList($request);
    }

}
