@extends('layouts.admin')

@section('title')
    Dashboard
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Finance Management</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
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
                        <h3 class="font-weight-medium my-2">Rp. <span data-plugin="counterup">{{ number_format($data['saldo']) }}</span></h3>
                        <p class="m-0">All</p>
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
                        <h3 class="font-weight-medium my-2">Rp. <span data-plugin="counterup">{{ number_format($data['pengeluaran']) }}</span></h3>
                        <p class="m-0">All</p>
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
                        <h3 class="font-weight-medium my-2">Rp. <span data-plugin="counterup">{{ number_format($data['pemasukan']) }}</span></h3>
                        <p class="m-0">All</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->    
@endsection
