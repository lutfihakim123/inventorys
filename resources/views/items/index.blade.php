@section('title', 'Item Lists')
@extends('templates/header')
@extends('layouts.app')
@section('content')
@if(session('success'))
<p class="alert alert-success">{{ session('success') }}</p>
@endif
    <div class="col-md-8">
        <div class="card card-default ms-4 justify-content-center">
            <div class="card-header">
                <h4>List Item</h4>
                <form class="form-inline ">
                    <div class="form-group mr-1">
                        <input class="form-control" type="text" name="q" value="{{ $q}}" placeholder="Pencarian..." />
                    </div>
                    <div class="form-group mr-1 mt-2">
                        <button class="btn btn-success">Refresh</button> <a class="btn btn-primary" href="{{ route('items.create') }}">Tambah</a>
                    </div>
                    <div class="form-group mr-1">
                        
                    </div>
                </form>
            </div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-bordered table-striped table-hover mb-0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Items Name</th>
                            <th>Unit</th>
                            <th>Stock</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <?php $no = 1 ?>
                    @foreach($rows as $row)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $row->item_name }}</td>
                        <td>{{ $row->unit }} (kg)</td>
                        <td>{{ $row->stock }}</td>
                        <td>Rp. {{ $row->price }}</td>
                        <td>
                            <img src="{{ $row->image() }}" height="75" />
                        </td>
                        <td>
                            <a class="btn btn-sm btn-warning" href="{{ route('items.edit', $row) }}">Ubah</a>
                            <form method="POST" action="{{ route('items.destroy', $row->id) }}" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus Data?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
@extends('templates/footer')
