<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\Product;
use App\Models\Sales;
use Illuminate\Http\Request;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads = Lead::filter(request(['product_name', 'sales_name', 'month']))->get();
        return view('leads.index', [
            "leads" => $leads
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::all(['id', 'nama_produk']);
        $sales = Sales::all(['id', 'nama_sales']);

        return view('leads.create', [
            "products" => $products,
            "sales" => $sales
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "tanggal" => "required",
            "sales" => "required",
            "lead_name" => "required",
            "product" => "required",
            "no_wa" => "required",
            "city" => "required",
        ]);

        Lead::create([
            "tanggal" => $request->tanggal,
            "sales_id" => $request->sales,
            "product_id" => $request->product,
            "nama_lead" => $request->lead_name,
            "no_wa" => $request->no_wa,
            "kota" => $request->city
        ]);



        flash()->success('Leads baru berhasil ditambahkan.');
        return to_route('leads.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Lead $lead)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lead $lead)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lead $lead)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lead $lead)
    {
        //
    }
}
