<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Enums\CategoryType;
use Illuminate\Support\Facades\Toast;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::simplePaginate(5);
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validatedData = $request->validated();

        if(Category::where('name',$validatedData['name'])->exists()){
            toast('Category exists!','error');
            return back();

        }

        $category = new Category;
        $category->name=$validatedData['name'];
        $category->slug=$validatedData['slug'];
        $category->description=$validatedData['description'];
        $category->category_type=$validatedData['category_type'];
        $category->status=$request->status == true ? '1' :'0';

        if($request->hasFile('image')){
            $file = $request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;

            $path = 'imagesCategory/' . $filename;
            Storage::disk('r2')->put($path, file_get_contents($file), 'public');

            $url = Storage::disk('r2')->url($path);
            $category->image= $url;

        }

        $category->save();

        toast('Category Saved sucessfully!','success');
        return redirect('admin/category');
    }

    public function update(CategoryFormRequest $request,$id){

        $validatedData=$request->validated();

        $category= Category::findOrFail($id);


        if($category->name !== $validatedData['name'] &&Category::where('name',$validatedData['name'])->exists()){
            toast('Category exists!','error');
            return back();

        }

        $category->name=$validatedData['name'];
        $category->slug=$validatedData['slug'];
        $category->description=$validatedData['description'];
        $category->category_type=$validatedData['category_type'];


         if ($request->hasFile('image')) {


            if(Storage::disk("r2")->exists($category->image)){
                Storage::disk("r2")->delete($category->image);
            }

            $file = $request->file('image');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;

            /*             $file->move('uploads/category/',$filename); */
            $path = 'imagesCategory/' . $filename;
            Storage::disk('r2')->put($path, file_get_contents($file), 'public');

            $url = Storage::disk('r2')->url($path);
            $category->image= $url;

        }
        $category->status=$request->status == true ? '1' :'0';
        $category->update();

        toast('Category Updated sucessfully!','success');

        return redirect('admin/category');
    }

    public function edit($id){

       $category=Category::findOrFail($id);
       return view('admin.category.edit',compact('category'));
    }


    public function delete($id){
        try{
            $category=Category::findOrFail($id);
            $category->delete();
            if (Storage::disk("r2")->exists($category->image)) {
                Storage::disk("r2")->delete($category->image);
            }

            toast('Category Deleted!','info');
        }catch(QueryException $e){
            toast('Cannot delete the category, it is used by products.', 'error');
        }

        return redirect('admin/category');
    }
}
