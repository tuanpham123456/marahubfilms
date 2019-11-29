<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\RequestArticle;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminArticleController extends Controller
{
  /**
   * Display a listing of the resource.
   * @return Response
   */
  public function index()
  {
    return view('admin::article.index');
  }

  public function create()
  {
    return view('admin::article.create');
  }

  public function store(RequestArticle $requestArticle)
  {
      $this->insertOrUpdate($requestArticle);
      return redirect()->back();

  }

  public function edit($id){

  }

  public function update(RequestArticle $requestArticle ,$id){

  }

  public function insertOrUpdate($requestArticle, $id = ''){
      $article = new Article();

      if ($id) $article = Article::find($id);
      $article->a_name = $requestArticle->a_name;
      $article->a_slug = str_slug($requestArticle->a_name);
      $article->a_description = $requestArticle->a_description;
      $article->content = $requestArticle->content;
      $article->a_title_seo = $requestArticle->a_title_seo ?$requestArticle->a_title_seo : $requestArticle->a_name;
      $article->a_description_seo = $requestArticle->a_description_seo ?$requestArticle->a_description_seo : $requestArticle->a_decription;

      $article->save();


  }

}
