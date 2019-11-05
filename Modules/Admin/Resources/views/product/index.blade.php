@extends('admin::layouts.master')

@section('content')

<div class="table-responsive">
<div class="page-header" >
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.get.list.category')}}" title="Danh mục">Phim</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
  </ol>
</nav>
</div>
        <h2>Quản lý danh sách phim
             <a  href="{{ route('admin.get.create.product')}}" class="float-right"><i class="fas fa-plus-circle"></i></a>
        </h2>

        <div class="row">
          <div class="col-sm-12">
                <form class="form-inline" action="" style="margin-bottom:20px;">
                    <div class="form-group">
                    <input type="text" class="form-control" placeholder="Tìm Tên Phim " name="name" style="width:700px" value="{{ \Request::get('name')}}">
                    </div>
                    <div class="form-group">
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
                    </div>
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
              <th>Tên Phim</th>
              <th>Tiêu Đề</th>
              <th>Tên Danh Mục </th>
              <th>Trạng Thái</th>
              <th>Nổi Bật</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody>
            @if(isset($products))
            @foreach($products as $product)
            <tr>
              <td>{{ $product->id}}</td>
              <td>{{ $product->pro_name}}</td>
              <td>{{ $product->pro_category_id}}</td>
              <td>{{ isset($product->category->c_name) ? $product->category->c_name : '[N\A]'}}</td>
              <td>

              <a href="{{route('admin.get.action.product',['active',$product->id])}}" class="label {{$product->getStatus($product->pro_active)['class']}}">
                {{$product->getStatus($product->pro_active)['name']}}
              </a>
              </td>
              <td>

              <a href="{{route('admin.get.action.product',['hot',$product->id])}}" class="label {{$product->getHot($product->pro_hot)['class']}}">
                {{$product->getHot($product->pro_hot)['name']}}
              </a>

              </td>

              <td>
                  <a style="padding:5px 10px; boder:1px solid #6610f2;font-size:12px;" href="{{ route('admin.get.edit.product', $product->id)}}">
                    <i class="fas fa-pen" style="font-size:11px"></i>  Update
                  </a>
                  <a style="padding:5px 10px; boder:1px solid #6610f2"  href="{{route('admin.get.action.product', ['delete',$product->id])}}"><i class="fas fa-trash-alt" style="font-size:11px"></i>  Delete</a>

              </td>
            </tr>
            @endforeach
        @endif

          </tbody>
        </table>
      </div>
@stop
