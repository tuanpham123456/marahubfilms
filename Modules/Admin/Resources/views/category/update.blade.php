@extends('admin::layouts.master')

@section('content')

<div class="table-responsive">
    <div class="page-header">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.home')}}">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.get.list.category')}}">Danh mục</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cập Nhật</li>
            </ol>
        </nav>
    </div>
    <div>
    @include("admin::category.form")
    </div>
    @stop