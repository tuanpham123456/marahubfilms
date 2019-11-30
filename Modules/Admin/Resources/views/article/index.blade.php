@extends('admin::layouts.master')

@section('content')

<div class="table-responsive">
<div class="page-header" >
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.get.list.article')}}" title="Danh mục">Bài viết</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
  </ol>
</nav>
</div>
        <h2>Quản lý bài viết
             <a  href="{{ route('admin.get.create.article')}}" class="float-right"><i class="fas fa-plus-circle"></i></a>
        </h2>

        <div class="row">
          <div class="col-sm-12">
                <form class="form-inline" action="" style="margin-bottom:20px;">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm Tên Bài Viết " name="name" style="width:700px" value="{{ \Request::get('name')}}">
                    </div>
                    {{-- <div class="form-group">
                          <select name="cate" id="" class="form-control" style="margin-left:15px">
                              <option value="">Danh Mục</option>
                              @if(isset($categories))
                                  @foreach($categories as $category)
                                      <option value="$category->id" {{\Request::get('cate') == $category->id ? "selected='selected '" : ""}}>
                                        {{$category->c_name}}
                                      </option>
                                  @endforeach

                              @endif
                          </select>
                    </div> --}}
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
          </div>
        </div>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên Bài Viết</th>
              <th>Mô Tả</th>
              <th>Trạng Thái</th>
              <th>Ngày Tạo</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($articles))
            @foreach($articles as $article)
            <tr>
              <td>{{ $article->id}}</td>
              <td>{{ $article->a_name}}</td>
              <td>{{ $article->a_description}}</td>
              <td>
                <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="label {{$article->getStatus($article->a_active)['class']}}">
                  {{$article->getStatus($article->a_active)['name']}}
                </a>

              </td>
              <td>{{ $article->updated_at}}</td>
              <td>
                <a class="btn_customer_action" href="{{ route('admin.get.edit.article',$article->id)}}"><i class="fas fa-pen ">Cập nhật</i></a>
                <a class="btn_customer_action" href="{{ route('admin.get.action.article',['delete',$article->id])}}"><i class="fas fa-trash-alt ">Xóa</i></a>

              </td>

            </tr>
            @endforeach
        @endif

          </tbody>
        </table>
      </div>
@stop
