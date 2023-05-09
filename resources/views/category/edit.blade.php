@extends('layouts.admin')

@section('title')
    Edit Category
@endsection

@section('content')
    <div class='card'>
        <h4>Edit Category</h4>
        <div class='card-body'>
            <form action='{{ route('category.update', [$data->id]) }}' method='POST' enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class='form-group'>
                    <label for=''>Nama</label>
                    <input type='text' class='form-control' name='name' value="{{ $data->name }}" id='' placeholder='Nama'>
                </div>
                <div class='form-group'>
                    <label for=''>Status</label>
                    <select name="status" id="" class='form-control'>
                        <option value="">Pilih Status</option>
                        <option value="1" {{ ($data->status == 1) ? 'selected':'' }}>Active</option>
                        <option value="2" {{ ($data->status == 2) ? 'selected':'' }}>Inactive</option>
                    </select>
                </div>
                <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
    </div>
@endsection
