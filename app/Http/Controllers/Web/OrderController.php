<?php

namespace App\Http\Controllers\Web;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function placeOrder(Request $request){
    
        DB::beginTransaction();

        try {
            $order = new Order();
            $order->order_no = rand();
            $order->payment_type = $request->payment_type == 1 ? 'Cash On Delivery' : 'Online Payment';
            $order->order_status = $request->payment_type == 1 ? '1' : 0 ;
            $order->name = $request->name;
            $order->mobile_no = $request->mobile;
            $order->address = $request->address;
            $order->shipping_charge = $request->shipping_charge;
            $order->sub_total = $request->sub_total; 
            $order->total_amount = $request->total_amount;
            $order->save();

            $products = array();
            if(session('cart')){
                foreach(session('cart') as $id => $details){
                    $product['order_id'] = $order->id;
                    $product['product_name'] = $details['name'];
                    $product['product_image'] = $details['photo'];
                    $product['product_price'] = $details['price'];
                    $product['product_qty'] = $details['quantity'];
                    $product['total_price'] = $details['price'] * $details['quantity'];
                    $products[] = $product;
                }
            }
            OrderDetail::insert($products); 
            DB::commit();
            Session::flush();
            
        } catch (\Throwable $e) {
            DB::rollback();

            Log::error('Unable to place order');
            Log::error($e->getFile());
            Log::error($e->getLine());
            Log::error($e->getMessage());
        }
        
        return redirect()->route('order-details', $order->id);
        
    }

    public function orderDetails($order_id)
    {
        $order_details = Order::with('OrderDetails')->where('id',$order_id)->first();
        return view('order', compact('order_details'));
    }
}
