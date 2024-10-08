@extends('layouts.app')
@section('title', 'Leads')
@section('content')
    <h2 class="my-4">Data Leads</h2>

    <div class="d-flex justify-content-between items-center">
        <div>
            <a href="{{ route('leads.create') }}" class="btn btn-primary">Create New</a>
        </div>

        <form action="{{ route('leads.index') }}" method="get">
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Nama Produk">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="sales_name" name="sales_name" placeholder="Nama Sales">
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <select class="form-select" id="month" name="month">
                            <option selected value="">--Pilih Bulan--</option>
                            <option value="January">Januari</option>
                            <option value="February">Februari</option>
                            <option value="March">Maret</option>
                            <option value="April">April</option>
                            <option value="May">Mei</option>
                            <option value="June">Juni</option>
                            <option value="July">Juli</option>
                            <option value="August">Agustus</option>
                            <option value="September">September</option>
                            <option value="October">Oktober</option>
                            <option value="November">November</option>
                            <option value="December">Desember</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Cari</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">No.</th>
                <th scope="col">ID Input</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Sales</th>
                <th scope="col">Produk</th>
                <th scope="col">Nama Leads</th>
                <th scope="col">No Wa</th>
                <th scope="col">Kota</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leads as $item)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->tanggal }}</td>
                    <td>{{ $item->sales->nama_sales }}</td>
                    <td>{{ $item->product->nama_produk }}</td>
                    <td>{{ $item->nama_lead }}</td>
                    <td>{{ $item->no_wa }}</td>
                    <td>{{ $item->kota }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
