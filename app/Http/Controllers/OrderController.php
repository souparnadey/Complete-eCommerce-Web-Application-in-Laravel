<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Shipping;
use App\User;
use PDF;
use Notification;
use Helper;
use Illuminate\Support\Str;
use App\Notifications\StatusNotification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $orders = Order::query();

        // 🔥 filter by status from query string
        if ($request->status) {
            $orders->where('status', $request->status);
        }

        $orders = $orders->orderBy('id', 'DESC')->paginate(10);

        return view('backend.order.index', compact('orders'));
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
        $request->validate(
            [
                'first_name'     => 'required|string|min:2|max:50',
                'last_name'      => 'required|string|min:2|max:50',
                'email'          => 'required|email',
                'phone'          => ['required', 'regex:/^[6-9]\d{9}$/'],
                'state'          => 'required|string',
                'address1'       => 'required|string|min:5',
                'address2'       => 'nullable|string|max:255',
                'post_code'      => 'required|digits:6',
                'shipping'       => 'required',
                'payment_method' => 'required|in:upi,cod,paypal',
            ],
            [
                'first_name.required' => 'Please enter your first name 😊',
                'last_name.required'  => 'Please enter your last name',
                'email.required'      => 'We need your email address',
                'email.email'         => 'Please enter a valid email address',
                'phone.required'      => 'Please enter your mobile number',
                'phone.regex'         => 'Enter a valid 10-digit Indian mobile number 🇮🇳',
                'state.required'      => 'Please select your state',
                'address1.required'   => 'Full address is required',
                'post_code.required'  => 'PIN code is required',
                'post_code.digits'    => 'PIN code must be 6 digits',
                'shipping.required'   => 'Please select a shipping option',
                'payment_method.required' => 'Please select a payment method',
            ]
        );

        if (
            empty(
                Cart::where('user_id', auth()->user()->id)
                    ->where('order_id', null)
                    ->first()
            )
        ) {
            return back()->with('error', 'Your cart is empty 🛒');
        }

        $order = new Order();
        $order_data = $request->all();

        $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
        $order_data['user_id'] = auth()->user()->id;
        $order_data['shipping_id'] = $request->shipping;
        $order_data['sub_total'] = Helper::totalCartPrice();
        $order_data['quantity'] = Helper::cartCount();
        $order_data['status'] = 'new';

        $shipping_price = Shipping::where('id', $request->shipping)->value('price') ?? 0;
        $coupon_value = session('coupon')['value'] ?? 0;

        $order_data['coupon'] = $coupon_value;
        $order_data['total_amount'] =
            Helper::totalCartPrice() + $shipping_price - $coupon_value;

        if ($request->payment_method === 'paypal') {
            $order_data['payment_method'] = 'paypal';
            $order_data['payment_status'] = 'paid';
        } elseif ($request->payment_method === 'upi') {
            $order_data['payment_method'] = 'upi';
            $order_data['payment_status'] = 'paid';
        } else {
            $order_data['payment_method'] = 'cod';
            $order_data['payment_status'] = 'Unpaid';
        }

        $order->fill($order_data);
        $order->save();

        Cart::where('user_id', auth()->user()->id)
            ->where('order_id', null)
            ->update(['order_id' => $order->id]);

        $admin = User::where('role', 'admin')->first();
        if ($admin) {
            Notification::send($admin, new StatusNotification([
                'title' => 'New order received',
                'actionURL' => route('order.show', $order->id),
                'fas' => 'fa-shopping-cart',
            ]));
        }

        session()->forget('cart');
        session()->forget('coupon');

        if ($request->payment_method === 'paypal') {
            return redirect()->route('payment')->with(['id' => $order->id]);
        }

        return redirect()->route('home')
            ->with('success', '🎉 Order placed successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order=Order::findOrFail($id);
        // return $order;
        return view('backend.order.show')->with('order',$order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order=Order::findOrFail($id);
        return view('backend.order.edit')->with('order',$order);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order=Order::findOrFail($id);
        $request->validate([
            'status'=>'required|in:new,process,delivered,cancel'
        ]);
        $data=$request->all();
        // return $request->status;
        if($request->status=='delivered'){
            foreach($order->cart as $cart){
                $product=$cart->product;
                // return $product;
                $product->stock -=$cart->quantity;
                $product->save();
            }
        }
        $status=$order->fill($data)->save();
        if($status){
            request()->session()->flash('success','Successfully updated order');
        }
        else{
            request()->session()->flash('error','Error while updating order');
        }
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order=Order::findOrFail($id);
        if($order){
            $status=$order->delete();
            if($status){
                request()->session()->flash('success','Order Successfully deleted');
            }
            else{
                request()->session()->flash('error','Order cannot be deleted');
            }
            return redirect()->route('order.index');
        }
        else{
            request()->session()->flash('error','Order can not found');
            return redirect()->back();
        }
    }

    public function orderTrack(){
        return view('frontend.pages.order-track');
    }

    public function productTrackOrder(Request $request){
        // return $request->all();
        $order=Order::where('user_id',auth()->user()->id)->where('order_number',$request->order_number)->first();
        if($order){
            if($order->status=="new"){
            request()->session()->flash('success','Your order has been placed. please wait.');
            return redirect()->route('home');

            }
            elseif($order->status=="process"){
                request()->session()->flash('success','Your order is under processing please wait.');
                return redirect()->route('home');
    
            }
            elseif($order->status=="delivered"){
                request()->session()->flash('success','Your order is successfully delivered.');
                return redirect()->route('home');
    
            }
            else{
                request()->session()->flash('error','Your order canceled. please try again');
                return redirect()->route('home');
    
            }
        }
        else{
            request()->session()->flash('error','Invalid order number, please try again');
            return back();
        }
    }

    // PDF generate
    public function pdf(Request $request){
        $order=Order::getAllOrder($request->id);
        // return $order;
        $file_name=$order->order_number.'-'.$order->first_name.'.pdf';
        // return $file_name;
        $pdf=PDF::loadview('backend.order.pdf',compact('order'));
        return $pdf->download($file_name);
    }
    // Income chart
    public function incomeChart(Request $request){
        $year=\Carbon\Carbon::now()->year;
        // dd($year);
        $items=Order::with(['cart_info'])->whereYear('created_at',$year)->where('status','delivered')->get()
            ->groupBy(function($d){
                return \Carbon\Carbon::parse($d->created_at)->format('m');
            });
            // dd($items);
        $result=[];
        foreach($items as $month=>$item_collections){
            foreach($item_collections as $item){
                $amount=$item->cart_info->sum('amount');
                // dd($amount);
                $m=intval($month);
                // return $m;
                isset($result[$m]) ? $result[$m] += $amount :$result[$m]=$amount;
            }
        }
        $data=[];
        for($i=1; $i <=12; $i++){
            $monthName=date('F', mktime(0,0,0,$i,1));
            $data[$monthName] = (!empty($result[$i]))? number_format((float)($result[$i]), 2, '.', '') : 0.0;
        }
        return $data;
    }
}
