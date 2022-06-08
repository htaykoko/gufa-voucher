<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::paginate(10);
        return view('admin.orders.index', [
            'orders' => $order
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('admin.orders.create', [
            'customers' => $customers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $data = $request->validated();
        DB::transaction(function () use ($data) {
            // dd($data);
            $order = Order::create([
                'code' => str_pad(date("dmY") . "-" . $this->generateOrderCode(), 14, 0, STR_PAD_LEFT),
                'customer_id' => $data['customer_id'],
                'voucher_id' => $this->generateOrderCode(),
                'date' => $data['date'],
                "sub_totals" => 100,
                "net_total" => 100,
                'delivery_fee' => $data['delivery_fee'],
                "custom_fee" => $data['custom_fee'],
                "currency_exchange_rate" => $data['currency_exchange_rate'],
                'payment_type' => $data['payment_type'],
                'created_by' => auth()->id(),
            ]);
            for ($i = 0; $i < request('total_item'); $i++) {
                $data['invoice_id'] =  $invoice->id;
                $data['tracking_code'] = request('order_item_tracking_code')[$i];
                $data['volume_cbm'] = request('order_item_volume_cbm')[$i];
                $data['weigh_kg'] = request('order_item_weight_kg')[$i];
                $data['price'] = request('order_item_price')[$i];
                $data['amount'] = request('order_item_amount_ks')[$i];
                $order->orderDetail()->create([
                    "product_name" => $data['product_name'],
                    "quantity" => $data['quantity'],
                    "unit_id" => $data['unit_id'],
                    "unit_qty" => $data['unit_qty'],
                    "price" => $data['price'],
                    "amount" => $data['price'] * $data['unit_qty'],
                ]);
            }
        });

        return redirect()->route("admin.orders.index")->with('success', "Success");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        return view('admin.orders.edit', [
            'data' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function generateOrderCode()
    {
        $order = Order::all()->last();
        $code = optional($order)->voucher_id + 1;
        return $code;
    }
}
