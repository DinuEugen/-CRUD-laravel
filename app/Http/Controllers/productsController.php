<?php

namespace App\Http\Controllers;

use App\Models\productsModel;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        $data = productsModel::latest()->paginate(10);
        return view('index', compact('data'))->with('i', (request()->input('page', 1) - 1 * 10));
    }
    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                "nume" => "required",
                "descriere" => "required",
                "categorie" => "required",
                "imagine" => "required|image|mimes:jpg,png,jpeg"
            ]
        );

        $file_name = time() . "." . request()->imagine->getClientOriginalExtension();
        request()->imagine->move(public_path("imagini"), $file_name);

        $product = new productsModel();
        $product->nume = $request->nume;
        $product->descriere = $request->descriere;
        $product->categorie = $request->categorie;
        $product->imagine = $file_name;
        $product->save();

        return redirect()->route('products.index')->with('success', 'produs adaugat');
    }
    public function show(productsModel $product)
    {
        return view('show', compact("product"));
    }

    public function edit(productsModel $product)
    {
        return view('edit', compact("product"));
    }

    public function update(Request $request, productsModel $product)
    {
        $request->validate(
            [
                "nume" => "required",
                "descriere" => "required",
                "categorie" => "required",
                
            ]
        );

        if ($request->imagine != "") {
            $file_name = time() . "." . request()->imagine->getClientOriginalExtension();
            request()->imagine->move(public_path("imagini"), $file_name);
        }
        $product = productsModel::find($request->hidden_id);
        $product->nume = $request->nume;
        $product->descriere = $request->descriere;
        $product->categorie = $request->categorie;
        if (!empty($file_name)) {
            $product->imagine = $file_name;
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'produs modificat');
    }
    public function destroy($id)
    {
        $product=productsModel::find($id);
        $product->delete();
        return redirect()->route('products.index')->with('success', 'produs sters');
        
    }
}
