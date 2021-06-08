<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCategoryFormRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    private $category,$totalPage = 10;

    public function __construct(Category $category){
        $this->category = $category;
    }
    public function index(Category $category,Request $request)
    {
        $categories = $category->getResults($request->name);
        return response()->json($categories);
    }

    public function show($id)
    {
        if (!$category = $this->category->find($id)):
            return response()->json(['error'=> 'Not found'],404);
        endif;

        return response()->json($category);
    }

    public function store(StoreUpdateCategoryFormRequest $request)
    {
        $category = $this->category->create($request->all());
        return response()->json($category,201);
    }

    public function update(StoreUpdateCategoryFormRequest $request, $id)
    {
        if (!$category = $this->category->find($id)):
            return response()->json(['error'=> 'Not found'],404);
        endif;

        $category = $this->category->find($id);
        $category->update($request->all());

        return response()->json($category);
    }

    public function destroy($id)
    {
        if (!$category = $this->category->find($id)):
            return response()->json(['error'=> 'Not found'],404);
        endif;

        $category->delete();

        return response()->json(['sucess' => true],204);

    }

    public function products($id)
    {
        if (!$category = $this->category->find($id)):
            return response()->json(['error'=> 'Not found'],404);
        endif;

        $products = $category->products()->paginate($this->totalPage);

        return response()->json([
            'category' => $category,
            'products' => $products
        ]);
    }
}
