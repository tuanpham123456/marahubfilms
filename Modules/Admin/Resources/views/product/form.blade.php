<form action="" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-8">
            <div class="form-group">
                <label for="pro_name">Tên phim:</label>
                <input type="text" class="form-control" id="email" placeholder="Tên phim" value="{{ old('pro_name',isset($category->pro_name) ? $category->pro_name : '' )}}" name="pro_name">
                @if($errors->has('pro_name'))
                <div class="error-text">
                    {{$errors->first('pro_name')}}
                </div>
                @endif
            </div>
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea name="pro_description" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả ngắn phim "></textarea>
            </div>
            <div class="form-group">
                <label for="name">Nội dung:</label>
                <textarea name="pro_content" class="form-control" id="" cols="30" rows="3" placeholder="Mô tả nội dung "></textarea>
            </div>

            <div class="form-group">
                <label for="name">Description</label>
                <input type="text" class="form-control" id="email" placeholder="Meta description" value="{{ old('pro_description_seo',isset($category->pro_description_seo) ? $category->pro_description_seo : '')}}" name="pro_description_seo">
                @if($errors->has('pro_description_seo'))
                <div class="error-text">
                    {{$errors->first('pro_description_seo')}}
                </div>
                @endif
            </div>


        </div>

        <div class="col-md-4">
            <div class="form-group">
                <label for="name">Loại phim</label>
                <select name="pro_category_id" id="" class="form-control">
                    <option value="">---Chọn Thể Loại Phim---</option>
                </select>
            </div>

            <div class="form-group">
                <label for="name">Avatar:</label>
                <input type="file" name="avatar" class="form-control">
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label><input type="checkbox" name="hot">Nổi bật</label>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-success">Lưu thông tin</button>



</form>