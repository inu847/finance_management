@extends('layouts.admin')

@section('title')
    Buat Category Detail
@endsection

@section('content')
    <div class='card'>
        <h4>Buat Category Detail</h4>
        <div class='card-body'>
            <form action='{{ route('category-detail.store') }}' method='POST' enctype='multipart/form-data'>
                @csrf
                <div class='form-group'>
                    <label for=''>Nama</label>
                    <input type='text' class='form-control' name='name' id='' placeholder='Nama' required>
                </div>
                <div class='form-group'>
                    <label for=''>Category</label>
                    <select name="category_id" id="" class='form-control' required>
                        <option value="">Pilih Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <label for=''>Description</label>
                    <textarea name="description" class='form-control' id="" cols="30" rows="5"></textarea>
                </div>
                <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
    </div>
@endsection
