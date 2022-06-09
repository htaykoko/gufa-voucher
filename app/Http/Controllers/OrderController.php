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
        $order = DB::transaction(function () use ($data) {
            // dd($data);
            $order = Order::create([
                'code' => str_pad(date("dmY") . "-" . $this->generateOrderCode(), 14, 0, STR_PAD_LEFT),
                'customer_id' => $data['customer_id'],
                'voucher_id' => $this->generateOrderCode(),
                'date' => $data['date'],
                'delivery_fee' => $data['delivery_fee'],
                "custom_fee" => $data['custom_fee'],
                "china_delivery_fee" => $data['china_delivery_fee'],
                "currency_exchange_rate" => $data['currency_exchange_rate'],
                'payment_type' => $data['payment_type'],
                'status' => 0,
                'created_by' => auth()->id(),
            ]);
            $sub_total = 0;
            for ($i = 0; $i < sizeof($data['product_name']); $i++) {
                $amount = $data['price'][$i] * $data['unit_qty'][$i];
                $sub_total += $amount;
                $order->orderDetail()->create([
                    "product_name" => $data['product_name'][$i],
                    "quantity" => $data['quantity'][$i],
                    "unit_id" => $data['unit_id'][$i],
                    "unit_qty" => $data['unit_qty'][$i],
                    "price" => $data['price'][$i],
                    "amount" => $data['price'][$i] * $data['unit_qty'][$i],
                ]);
            }
            $order->update([
                "sub_totals" => $sub_total,
                "net_total" => ($sub_total + $data['delivery_fee'] + $data['custom_fee']),
            ]);
            return $order;
        });
        return redirect()->route("admin.orders.show", $order->id)->with("success", config('messages.createSuccess'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        // dd($order->with('orderDetail', 'customer'));
        return view('admin.orders.show', [
            'data' => $order
        ]);
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
            'data' => $order,
            'customers' => Customer::all()
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
        $data = $request->validated();
        DB::transaction(function () use ($order, $data) {
            $sub_total = 0;
            $order->orderDetail()->delete();
            for ($i = 0; $i < sizeof($data['product_name']); $i++) {
                $amount = $data['price'][$i] * $data['unit_qty'][$i];
                $sub_total += $amount;
                $order->orderDetail()->create([
                    "product_name" => $data['product_name'][$i],
                    "quantity" => $data['quantity'][$i],
                    "unit_id" => $data['unit_id'][$i],
                    "unit_qty" => $data['unit_qty'][$i],
                    "price" => $data['price'][$i],
                    "amount" => $amount
                ]);
            }
            $order->update([
                'customer_id' => $data['customer_id'],
                'date' => $data['date'],
                "sub_totals" => $sub_total,
                "net_total" => ($sub_total + $data['delivery_fee'] + $data['custom_fee']),
                'delivery_fee' => $data['delivery_fee'],
                "custom_fee" => $data['custom_fee'],
                "china_delivery_fee" => $data['china_delivery_fee'],
                "currency_exchange_rate" => $data['currency_exchange_rate'],
                'payment_type' => $data['payment_type'],
                'updated_by' => auth()->id(),
            ]);
        });
        return redirect()->route("admin.orders.show", $order->id)->with("success", config('messages.updateSuccess'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return back()->with('success', config('messages.deleteSuccess'));
    }

    public function generateOrderCode()
    {
        $order = Order::all()->last();
        $code = optional($order)->voucher_id + 1;
        return $code;
    }
}
