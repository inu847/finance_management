@extends('layouts.admin')

@section('title')
    Buat Category
@endsection

@section('content')
    <div class='card'>
        <h4>Buat Category</h4>
        <div class='card-body'>
            <form action='{{ route('category.store') }}' method='POST' enctype='multipart/form-data'>
                @csrf
                <div class='form-group'>
                    <label for=''>Nama</label>
                    <input type='text' class='form-control' name='name' id='' placeholder='Nama' required>
                </div>
                <div class='form-group'>
                    <label for=''>Status</label>
                    <select name="status" id="" class='form-control' required>
                        <option value="">Pilih Status</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>
                <button type='submit' class='btn btn-primary'>Submit</button>
            </form>
        </div>
    </div>
@endsection
