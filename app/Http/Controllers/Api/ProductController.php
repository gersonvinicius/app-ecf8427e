<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Movimentation;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Product::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CADASTRA PRODUTO
        $request->validate([
            'name' => 'required',
            'sku' => 'required|unique:products',
            'initial_qty' => 'required|numeric'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->sku = $request->sku;
        $product->initial_qty = $request->initial_qty;
        $product->total_qty = $request->initial_qty;
        return $product->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sku)
    {
        //MOSTRA PRODUTO PELO SKU
        return Product::where('sku', $sku)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sku)
    {
        //ATUALIZA PRODUTO PELO SKU
        $request->validate([
            'name' => 'required',
        ]);
        $product = Product::where('sku', $sku)->first();
        return $product->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($sku)
    {
        //DELETA PRODUTO PELO SKU
        $product = Product::where('sku', $sku)->first();
        $product->delete();
    }

    public function movimentation(Request $request)
    {
        $request->validate([
            'sku' => 'required',
            'qty' => 'required|numeric'
        ]);
        // return $request->all();
        $product = Product::where('sku', $request->sku)->first();
        // return $product;
        if($product){
            $date_hour = Carbon::now()->format('Y-m-d H:i:s');
            // return $date_hour;
            $movimentation = new Movimentation();
            $movimentation->sku = $request->sku;
            $total = $product->total_qty;
            $total += $request->qty;
            if($total < 0){
                $movimentation->qty -= $product->total_qty;
                $product->total_qty = 0;
            }else {
                $movimentation->qty = $request->qty;
                $product->total_qty += $request->qty;
            }
            $movimentation->date_hour = $date_hour;
            $movimentation->product_id = $product->id;
            $movimentation->save();
            $product->save();                      
        }
    }
}
