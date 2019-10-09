<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestCategory;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminCategoryController extends Controller
{

    public function index()
    {
        // $categories = Category::paginate(10) lấy 10;
        $categories = Category::select('id','c_name','c_title_seo','c_active')->get();
        $viewData =[
            'categories' => $categories

        ];
        return view('admin::category.index',$viewData);
    }
    public function create()
    {
        return view('admin::category.create');
    }
    public function store(RequestCategory $requestCategory)
    {
        $category                       =  new Category();
        $category->c_name               =  $requestCategory->name;
        $category->c_slug               =  str_slug($requestCategory->name);
        $category->c_icon               =  str_slug($requestCategory->icon);
        $category->c_title_seo          =  $requestCategory->c_title_seo ? $requestCategory->c_title_seo : $requestCategory->name;
        $category->c_description_seo    =  $requestCategory->c_description_seo;
        $category->save();

        return redirect()->back();
    }
}
