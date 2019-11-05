@extends('admin::layouts.master')

@section('content')

<div class="table-responsive">
<div class="page-header" >
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('admin.home')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{route('admin.get.list.category')}}" title="Danh mục">Danh mục</a></li>
    <li class="breadcrumb-item active" aria-current="page">Danh sách</li>
  </ol>
</nav>
</div>
        <h2>Quản lý danh sách phim
             <a  href="{{ route('admin.get.create.category')}}" class="float-right">Thêm mới</a>
        </h2>

        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Tên Danh Mục</th>
              <th>Tiêu Đề</th>
              <th>Trạng Thái</th>
              <th>Thao Tác</th>
            </tr>
          </thead>
          <tbody>
              @if(isset($categories))
                  @foreach($categories as $category)
                  <tr>
                    <td>{{ $category->id}}</td>
                    <td>{{ $category->c_name}}</td>
                    <td>{{ $category->c_title_seo}}</td>
                    <td>
                    <a href="" class="label {{$category->getStatus($category->c_active)['class']}}">{{$category->getStatus($category->c_active)['name']}}</a>
                    </td>
                    <td>
                        <a href="{{ route('admin.get.edit.category', $category->id)}}">Edit</a>
                        <a href="{{route('admin.get.action.category', ['delete',$category->id])}}">Delete</a>

                    </td>
                  </tr>
                  @endforeach
              @endif

          </tbody>
        </table>
      </div>
@stop
