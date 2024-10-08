@extends('layouts.app')

@section('title', 'Create Leads')

@section('content')
    <h2 class="my-4">Selamat Datang Di Tambah Leads</h2>
    <div class="card">
        <div class="card-header">
            <a href="{{ route('leads.index') }}" class="btn btn-success">Kembali</a>
        </div>
        <div class="card-body">
            <form action="{{ route('leads.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="sales" class="form-label">Sales</label>
                            <select class="form-select" id="sales" name="sales">
                                <option selected>--Pilih Sales--</option>
                                @foreach ($sales as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_sales }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="lead_name" class="form-label">Nama Lead</label>
                            <input type="text" class="form-control" id="lead_name" name="lead_name" placeholder="Nama Lead">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="product" class="form-label">Produk</label>
                            <select class="form-select" id="product" name="product">
                                <option selected>--Pilih Product--</option>
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="no_wa" class="form-label">No. Whatsapp</label>
                            <input type="text" class="form-control" id="no_wa" name="no_wa" placeholder="No. Whatsapp">
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="city" class="form-label">Kota</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Asal Kota">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center gap-3">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                </div>
            </form>
        </div>
    </div>
@endsection
