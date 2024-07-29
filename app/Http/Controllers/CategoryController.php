<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryFormRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(Request $request,Category $category) {
        return view('webtv.category.category',[
            'category'=>$category
        ]);
    }

    public function store(CreateCategoryRequest $request) {
        $data=$request->validated();

        $category=Category::create($data);

        return $category->exists()?
        redirect()->route('dashboard')->with('success',"La rubrique {$category->name} à bien été creer"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");
    }

    public function update(UpdateCategoryFormRequest $request,Category $category) {
        $data=$request->validated();

        $isOk=$category->update($data);

        return $isOk?
        redirect()->route('dashboard')->with('success',"La rubrique  à bien été modifier"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");
    }

    public function delete(Request $request,Category $category) {

        $isOk=$category->delete();

        return $isOk?
        redirect()->route('dashboard')->with('success',"La rubrique  à bien été supprimer"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");

    }
}
