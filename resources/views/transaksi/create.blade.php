@extends('layouts.admin')

@section('title')
    Buat Transaksi
@endsection

@section('content')
    <div class='card'>
        <h4>Buat Transaksi</h4>
        <div class='card-body'>
            <form action='{{ route('transaction.store') }}' method='POST' enctype='multipart/form-data'>
                @csrf
                <div class='form-group'>
                    <label for=''>Category</label>
                    <select name="category_id" id="category_id" on-change="" class='form-control' required>
                        <option value="">Pilih Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <label for=''>Category</label>
                    <select name="category_detail_id" id="category_detail" class='form-control' required>
                        <option value="">Pilih Category</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for=''>Nominal</label>
                    <input type='text' class='form-control' name='nominal' id='' placeholder='Nominal' required>
                </div>
                <div class='form-group'>
                    <label for=''>Status</label>
                    <select name="status" id="" class='form-control' required>
                        <option value="">Pilih Status</option>
                        <option value="1">Finish</option>
                        <option value="2">Pending</option>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category_id').change(function() {
            var category_id = $(this).val();

            $.ajax({
                type: 'GET',
                url: '/category-detail/category/' + category_id,
                success: function(data) {
                    $('#category_detail').html(data);
                }
            });
        });
    });
</script>

