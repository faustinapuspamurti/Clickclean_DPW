@extends('layouts.backend.master')
@section('title')
    Daftar Product
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="d-flex justify-content-start">
                        <div class="stats-icon purple mb-2">
                            <i class="bi bi-check-square-fill"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted font-semibold">Product Publish</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="d-flex justify-content-start">
                        <div class="stats-icon purple mb-2">
                            <i class="bi bi-info-square-fill"></i>
                        </div>
                        <div class="ms-3">
                            <h6 class="text-muted font-semibold">Product Draft</h6>
                            <h6 class="font-extrabold mb-0">112.000</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>@yield('title')</h4>
                </div>
                <div class="card-body">
                    <form action="" method="GET">
                        <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                <label for="cari" class="form-label">Cari Kata Kunci</label>
                                <input type="text" name="cari" class="form-control" autocomplete="off" id="cari">
                            </div>
                            <div class="col-md-3">
                                <label for="basicSelect" class="form-label">Status Order</label>
                                <select class="form-control" autocomplete="off" id="basicSelect" name="status">
                                    <option value="">-- Pilih --</option>
                                    <option {{ old('status') == 'publish' ? 'selected' : '' }} value="publish">
                                        Publish</option>
                                    <option {{ old('status') == 'draft' ? 'selected' : '' }} value="draft">Draft
                                    </option>
                                </select>
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
                                    <th>NAME</th>
                                    <th>CATEGORY</th>
                                    <th>PRICE</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-bold-500">{{ $item->title }}</td>
                                        <td>PHP</td>
                                        <td>Rp. {{ number_format($item->harga) }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $item->status == 'publish' ? 'bg-success' : 'bg-danger' }}">{{ $item->status }}</span>
                                        </td>
                                        <td class="text-bold-500 d-flex">
                                            <a href="{{ route('product.edit', $item->id) }}"
                                                class="btn icon btn-primary me-2"><i class="bi bi-pencil"></i></a>
                                            <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="btn icon btn-danger"><i
                                                        class="bi bi-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
