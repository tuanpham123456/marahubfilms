<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestProduct;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
    public function index(){
      $products = Product::with('category:id,c_name')->paginate(10);

      $viewData = [
        'products' => $products
      ];

        return view('admin::product.index' ,$viewData);
    }



    public function create(){
      $categories = $this->getCategories();
        return view('admin::product.create',compact('categories'));

    }
    public function store(RequestProduct $requestProduct){
      // dd($requestProduct->all());
      $this->InsertOrUpdate($requestProduct);
      return redirect()->back();

    }
    public function getCategories(){
       return Category::all();
    }
    public function InsertOrUpdate($requestProduct,$id=''){
        $product = new Product();

        if ($id) $product = Product::find($id);

        $product->pro_name = $requestProduct->pro_name;
        $product->pro_slug = str_slug($requestProduct->pro_name);
        $product->pro_category_id = $requestProduct->pro_category_id;
        $product->pro_description_seo =$requestProduct->pro_description_seo ? $requestProduct->pro_description_seo : $requestProduct->pro_description_seo;

        $product->save();
    }

}
