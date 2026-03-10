<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Validation\Rules\Can;

class CategoryController extends Controller
{

    public function index()
    {
        try
        {
            return CategoryResource::collection(Category::all());
        }
        catch(Exception $ex)
        {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }


    public function show(string $id)
    {
        try
        {
            return (new CategoryResource(Category::findOrFail($id)));
        }
        catch (ModelNotFoundException $ex)
        {

        abort(self::HTTP_NOT_FOUND, 'Review not found');
        }
        catch(Exception $ex)
        {
            abort(self::HTTP_SERVER_ERROR, 'server error');
        }
    }

    public function store(StoreCategoryRequest $request)
    {
        try
        {
            $categories = Category::create($request->validated());
        }
        catch(QueryException $ex)
        {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'cannot be created in database');
        }

        return (new CategoryResource($categories))->response()->setStatusCode(self::HTTP_CREATED);
    }

    public function update(StoreCategoryRequest $request, string $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->update($request->validated());
            return (new CategoryResource($category))
                ->response()
                ->setStatusCode(self::HTTP_OK);
        } catch (ModelNotFoundException $ex) {
            abort(self::HTTP_NOT_FOUND, 'Category not found');
        } catch (QueryException $ex) {
            abort(self::HTTP_UNPROCESSABLE_ENTITY, 'Cannot update in database');
        } catch (Exception $ex) {
            abort(self::HTTP_SERVER_ERROR, 'Server error');
        }
    }
}
