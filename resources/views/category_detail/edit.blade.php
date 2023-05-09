@extends('layouts.admin')

@section('title')
    Edit Category Detail
@endsection

@section('content')
    <div class='card'>
        <h4>Edit Category Detail</h4>
        <div class='card-body'>
            <form action='{{ route('category-detail.update', [$data->id]) }}' method='POST' enctype='multipart/form-data'>
                @csrf
                @method('PUT')
                <div class='form-group'>
                    <label for=''>Nama</label>
                    <input type='text' class='form-control' name='name' value="{{ $data->name }}" id='' placeholder='Nama'>
                </div>
                <div class='form-group'>
                    <label for=''>Category</label>
                    <select name="category_id" id="" class='form-control' required>
                        <option value="">Pilih Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $data->category_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <label for=''>Description</label>
                    <textarea name="description" class='form-control' id="" cols="30" rows="5">{{ $data->description }}</textarea>
                </div>
                <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
    </div>
@endsection
