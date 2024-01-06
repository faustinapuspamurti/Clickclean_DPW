@extends('layouts.backend.master')
@section('title')
    Data Pemesanan Layanan
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
                                    <th>NAMA</th>
                                    <th>PAKET</th>
                                    <th>PEMBAYARAN</th>
                                    <th>NO HP</th>
                                    <th>ALAMAT</th>
                                    {{-- <th>ACTION</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($booking as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-bold-500">{{ $item->nama }}</td>
                                        <td>
                                            <span
                                                class="badge {{ $item->paket_layanan == 'Paket Super','Paket Standar' ? 'bg-success' : 'bg-danger' }}">{{ $item->paket_layanan }}</span>
                                        </td>
                                        <td>
                                            <span
                                                class="badge {{ $item->metode_pembayaran == 'Transfer Bank' ? 'bg-success' : 'bg-danger' }}">{{ $item->metode_pembayaran }}</span>
                                        </td>
                                        <td class="text-bold-500">{{ $item->no_hp }}</td>
                                        <td class="text-bold-500">{{ $item->alamat }}</td>
                                        <td class="text-bold-500 d-flex">
                                            <form action="{{ route('booking.destroy', $item->id) }}" method="POST">
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
