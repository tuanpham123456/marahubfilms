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
    public function index(Request $request){
      $products = Product::with('category:id,c_name');

      if ($request->name) $products->where('pro_name','like','%'.$request->name.'%');

      if($request->cate) $products->where('pro_category_id',$request->cate );

      $products = $products->orderByDesc('id')->paginate(10);

      $categories = $this->getCategories();
      $viewData = [
        'products' => $products,
        'categories' => $categories
      ];

        return view('admin::product.index' ,$viewData);
    }



    public function create(){
      $product = $this->getCategories();
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
    public function edit($id){

      $product = Product::find($id);
        return view('admin::product.update',compact('product'));
    }



    public function update(RequestProduct $requestProduct,$id){
      $product                       =  Product::find($id);
      $product->c_name               =  $requestProduct->name;
      $product->c_slug               =  str_slug($requestProduct->name);
      $product->c_icon               =  str_slug($requestProduct->icon);
      $product->c_title_seo          =  $requestProduct->c_title_seo ? $requestProduct->c_title_seo : $requestProduct->name;
      $product->c_description_seo    =  $requestProduct->c_description_seo;
      $product->save();

      return redirect()->back();

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

    public function action($action,$id ){

      if($action){

          $product = Product::find($id);
          switch ($action)
          {
              case 'delete':
              $product->delete();
              break;

              case 'active':
                $product->pro_active = $product->pro_active ? 0 : 1;
                break;

              case 'hot':
                $product->pro_hot = $product->pro_hot ?  0 : 1;
                break;
          }
          $product->save();
      }
      return redirect()->back();

  }

}
