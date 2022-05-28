@extends('admin.main')

@section('content')
<div class="card card-primary">
              <form action="" method="POST">
              @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên danh mục</label>
                    <input name="name" type="text" class="form-control" id="exampleInputEmail1" placeholder="Nhập tên danh mục">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Danh mục</label>
                    <select name="parent_id" class="form-control">
                      <option value="0">Danh mục cha</option>
                    @foreach($menus as $menu)
                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                  @endforeach
                  </select>
                  </div>
                  <div class="form-group">
                    <label>Mô tả</label>
                    <textarea name="descriptionn" class="form-control"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Mô tả chi tiết</label>
                    <textarea id="content" name="content" class="form-control"></textarea>
                    <script src=/ckeditor/ckeditor.js></script>
    <script>
    CKEDITOR.replace( 'content');
    </script>

                  </div>
                <!-- /.card-body -->
                <div class="form-group">
                  <label>Kích hoạt</label>
                  <div class="custom-control custom-radio">
                  <input type="radio" class="custom-control-input" id="active" name="active" value="1">
                  <label for="active" class="custom-control-label">Có</label>
                </div>

                <div class="custom-control custom-radio">
                <input type="radio" class="custom-control-input" id="no_active" name="active" value="1">
                  <label class="custom-control-label" for="no_active">Không</label>
                </div>

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Tạo danh mục</button>
                </div>
                @csrf
              </form>
            </div>
@endsection

