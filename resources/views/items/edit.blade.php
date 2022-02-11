@section('title', 'Edit Lists')
@extends('templates/header')
@extends('layouts.app')
@section('content')
<h3 class="ms-4">Edit Data List</h3>
<div class="row">
    <div class="col-md-8 ms-4">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('items.update', $row) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label>Items Name<span class="text-danger">*</span></label>
                <input class="form-control"  type="text" name="items_name"             value="{{ old('item_name', $row->item_name) }}" />
            </div>
            <div class="form-group">
                <label>Unit (kg/pcs)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="unit" value="{{ old('unit', $row->unit)  }}" />
            </div>
            <div class="form-group">
                <label>Stock <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="stock" value="{{ old('stock', $row->stock) }}" />
            </div>
            <div class="form-group">
                <label>Price/pcs <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="price" value="{{ old('price', $row->price) }}" />
            </div>
            <div class="form-group">
                <label> New Image</label>
                <input class="form-control" type="file" name="image" value="{{ old('image') }}" />
               
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection
@extends('templates/footer')
