@section('title', 'Add New Lists')
@extends('templates/header')
@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-8 ms-4">
        @if($errors->any())
        @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
        @endforeach
        @endif
        <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h3>Add New Items</h3>
            <div class="form-group">
                <label>Items Name<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="items_name" value="{{ old('items_name') }}" />
            </div>
            <div class="form-group">
                <label>Unit (kg/pcs)<span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="unit" value="{{ old('unit') }}" />
            </div>
            <div class="form-group">
                <label>Stock <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="stock" value="{{ old('stock') }}" />
            </div>
            <div class="form-group">
                <label>Price/pcs <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="price" value="{{ old('price') }}" />
            </div>
            <div class="form-group">
                <label>Image</label>
                <input class="form-control" type="file" name="image" value="{{ old('image') }}" />
            </div>
            <div class="form-group mt-2">
                <button class="btn btn-primary">Simpan</button>
                <a class="btn btn-danger" href="{{ route('items.index') }}">Kembali</a>
            </div>
        </form>
    </div>
</div>

@endsection
@extends('templates/footer')
