@extends('layouts.admin')

@section('title')
    Edit Transaksi
@endsection

@section('content')
    <div class='card'>
        <h4>Edit Transaksi</h4>
        <div class='card-body'>
            <form action='{{ route('transaction.update', [$data->id]) }}' method='POST' enctype='multipart/form-data'>
                @csrf
                @method("PUT")
                <div class='form-group'>
                    <label for=''>Category</label>
                    <select name="category_id" id="category_id" on-change="" class='form-control' required>
                        <option value="">Pilih Category</option>
                        @foreach ($category as $item)
                            <option value="{{ $item->id }}" {{ ($item->id == $data->category_id) ? 'selected' : '' }}>{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class='form-group'>
                    <label for=''>Category</label>
                    <select name="category_detail_id" id="category_detail" class='form-control' required>
                        <option value="{{ $data->category_detail_id }}">{{ $data->categoryDetail->name ?? null }}</option>
                    </select>
                </div>
                <div class='form-group'>
                    <label for=''>Nominal</label>
                    <input type='text' class='form-control' name='nominal' id='' placeholder='Nominal' value="{{ $data->nominal }}" required>
                </div>
                <div class='form-group'>
                    <label for=''>Status</label>
                    <select name="status" id="" class='form-control' required>
                        <option value="">Pilih Status</option>
                        <option value="1" {{ ($item->status == 1) ? 'selected' : '' }}>Finish</option>
                        <option value="2" {{ ($item->status == 2) ? 'selected' : '' }}>Pending</option>
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

