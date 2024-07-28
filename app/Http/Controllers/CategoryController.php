<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create() {
      
        return view('webtv.category.category');
    }

    public function store(CreateCategoryRequest $request) {
        $data=$request->validated();

        $category=Category::create($data);

        return $category->exists()?
        redirect()->route('dashboard')->with('success',"La catgorie {$category->name} à bien été creer"):
        redirect()->route('dashboard')->with('error',"Une erreur est survenu essayer plus tard");
    }
}
