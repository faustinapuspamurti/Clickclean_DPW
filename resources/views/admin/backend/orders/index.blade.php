@extends('layouts.backend.master')
@section('title')
    Data Pembelian Product
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@yield('title')</h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-3">
                                <label for="invoice" class="form-label">Cari Invoice</label>
                                <div class="input-group">
                                    <span class="input-group-text" id="basic-addon1">#</span>
                                    <input type="text" class="form-control" autocomplete="off" name="invoice">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label for="cari" class="form-label">Cari Kata Kunci</label>
                                <input type="text" name="cari" class="form-control" autocomplete="off" id="cari">
                            </div>
                            <div class="col-md-3">
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="bi bi-search"></i> Search
                                    </button>
                                    <button onClick="window.location.reload()" class="btn btn-danger">
                                        <i class="bi bi-arrow-clockwise"></i> Reload
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Table with outer spacing -->
                    <div class="table-responsive">
                        <table class="table table-lg">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>INVOICE</th>
                                    <th>USER</th>
                                    <th>PRODUK</th>
                                    <th>HARGA</th>
                                    <th>STATUS</th>
                                    {{-- <th>ACTION</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
