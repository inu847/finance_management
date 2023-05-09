@extends('layouts.admin')

@section('title')
    Transaction
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Finance Management</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">List Transaction</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Transaction</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Transaction</h4>
            </div>
        </div>
    </div>
         
    <!-- end page title --> 
    <div class="row">
        <div class="col-xl-4 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Saldo</p>
                        <h3 class="font-weight-medium my-2">Rp. <span data-plugin="counterup">{{ number_format($report['saldo']) }}</span></h3>
                        <p class="m-0">{{ $report['start_date']." - ".$report['end_date']}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Pengeluaran</p>
                        <h3 class="font-weight-medium my-2">Rp. <span data-plugin="counterup">{{ number_format($report['pengeluaran']) }}</span></h3>
                        <p class="m-0">{{ $report['start_date']." - ".$report['end_date']}}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-sm-6">
            <div class="card-box widget-box-two widget-two-custom">
                <div class="media">
                    <div class="avatar-lg rounded-circle bg-primary widget-two-icon align-self-center">
                        <i class="mdi mdi-currency-usd avatar-title font-30 text-white"></i>
                    </div>

                    <div class="wigdet-two-content media-body">
                        <p class="m-0 text-uppercase font-weight-medium text-truncate" title="Statistics">Pemasukan</p>
                        <h3 class="font-weight-medium my-2">Rp. <span data-plugin="counterup">{{ number_format($report['pemasukan']) }}</span></h3>
                        <p class="m-0">{{ $report['start_date']." - ".$report['end_date']}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class='card'>
        <div class='m-3'>
            <div class="float-left">
                <h4>Transaction</h4>
            </div>
            <div class="float-right">
                <a href="{{ route('transaction.create') }}" class="btn btn-primary">Buat Transaction</a>
                <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal" data-target="#filter-modal">Filter</button>
            </div>
        </div>
        <div class='card-body'>
            <table id="datatable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Type Transaction</th>
                        <th>Category</th>
                        <th>Nominal</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $key => $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->category->name }}</td>
                            <td>{{ $item->categoryDetail->name }}</td>
                            <td>{{ number_format($item->nominal) }}</td>
                            <td>{{ $item->description }}</td>
                            <td>
                                @if ($item->status == 1)
                                    <span class="badge badge-success">Finish</span>
                                @elseif ($item->status == 2)
                                    <span class="badge badge-info">Pending</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('transaction.edit', [$item->id]) }}" class="btn btn-info"><i class="fas fa-pencil-alt"></i></a>
                                <button onclick="$('#delete{{ $key }}').submit()" type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                @if ($item->status == 2)
                                    <button onclick="$('#finish{{ $key }}').submit()" type="button" class="btn btn-success"><i class="fa fa-check"></i></button>
                                @elseif ($item->status == 1)
                                    <button onclick="$('#pending{{ $key }}').submit()" type="button" class="btn btn-primary"><i class="fas fa-circle-notch"></i></button>
                                @endif

                                <form id="delete{{ $key }}" action="{{ route('transaction.destroy', [$item->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method("DELETE")
                                </form>
                                <form id="finish{{ $key }}" action="{{ route('transaction.updateStatus', [$item->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="status" value="1">
                                </form>
                                <form id="pending{{ $key }}" action="{{ route('transaction.updateStatus', [$item->id]) }}" enctype="multipart/form-data" method="POST">
                                    @csrf
                                    @method("PUT")
                                    <input type="hidden" name="status" value="2">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    {{-- MODALS FILTER --}}
    <div id="filter-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-body p-3">
                    <form class="form-horizontal" action="{{ route('transaction.index') }}" method="GET">
                        <div class="form-group row">
                            <div class="col-12">
                                <label for="start_date">Start Date</label>
                                <input class="form-control" type="date" id="start_date" name="start_date" value="{{ \Request::get('start_date') }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <label for="end_date">End Date</label>
                                <input class="form-control" type="date" id="end_date" name="end_date" value="{{ \Request::get('end_date') }}">
                            </div>
                        </div>

                        <div class="form-group account-btn row text-center mb-0">
                            <div class="col-12">
                                <button class="btn width-lg btn-rounded btn-lg btn-primary waves-effect waves-light" type="submit">Submit</button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection