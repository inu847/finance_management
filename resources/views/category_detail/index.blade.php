@extends('layouts.admin')

@section('title')
    Category Detail
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Finance Management</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Master Category</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Category Detail</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Category Detail</h4>
            </div>
        </div>
    </div>     
    <!-- end page title --> 

    <div class='card'>
        <div class='m-3'>
            <div class="float-left">
                <h4>Category Detail</h4>
            </div>
            <div class="float-right">
                <a href="{{ route('category-detail.create') }}" class="btn btn-primary">Buat Category Detail</a>
            </div>
        </div>
        <div class='card-body'>
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                <a href="{{ route('category-detail.edit', [$item->id]) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                <button onclick="$('#delete{{ $key }}').submit()" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                <form id="delete{{ $key }}" action="{{ route('category-detail.destroy', [$item->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method("DELETE")
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection