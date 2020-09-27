<?php

namespace App\Http\Controllers;

/*use Gloudemans\Shoppingcart\Cart;*/

use App\Customer;
use App\DirectSell;
use Illuminate\Http\Request;
use Codexshaper\WooCommerce\Facades\WooCommerce;
use Product;
use Report;
use App\AllProduct;
use Cart;
use DB;
use App\OnlineSale;
use Illuminate\Support\Facades\Auth;
use PDF;
class ProductController extends Controller
{
    public function index(){
        /*$products =  Product::all();
        return response()->json($products);*/
        for($i=1;$i<1000;$i++){
            $products= WooCommerce::all('products',array('per_page'=>100,'page'=>$i));
            $result = (array) $products;
            if(!empty($result)){
            foreach($result as $item)
            {
                $res=(array) $item;
                /*if (is_numeric($res['price'])) {
                    continue;
                }*/
                $data=AllProduct::where('product_id','=',$res['id'])->first();
                if($data==null){
                    $data=new AllProduct();
                    $data->product_id=$res['id'];
                    $data->name=$res['name'];
                    $data->price=$res['price'];
                    $data->save();
                }else{
                    $data->product_id=$res['id'];
                    $data->name=$res['name'];
                    $data->price=$res['price'];
                    $data->save();
                }



            }

            }else{
                break;
            }

        }

        return response()->json([
            'success'=>'Product updated successfully'
        ]);


    }

    public function pos(){
        $data=AllProduct::all();
        return view('admin.dashboard.pos',compact('data'));
    }

    public function addProduct(Request $request){
       /*Cart::add('"'.$request->product_id.'"','"'.$request->product_name.'"','"'.$request->quantity.'"','"'.$request->price.'"');*/
        if($request->quantity==null){
            return response()->json([
                'error'=>'Please specify the quantity'
            ]);
        }

       $message= Cart::add(['id' => '"'.$request->product_id.'"', 'name' => '"'.$request->product_name.'"',
           'qty' => $request->quantity, 'price' => $request->price, 'weight' => 550]);
        return response()->json([
            'success'=>'Product added successfully'
        ]);
    }

    public function cartItem(){
        $total=Cart::priceTotal();
        $count=Cart::count();
        $content=Cart::content();
        return response()->json([
            'total'=>$total,
            'content'=>$content,
            'count'=>$count
        ]);
    }

    public function deleteItem(Request $request){
        Cart::remove($request->rowId);
        return response()->json([
            'success'=>'Product removed successfully'
        ]);
    }

    public function manualProduct(Request $request)
    {

        if ($request->ajax()) {

            $product_name = $request->product_name;
            $unit_price = $request->unit_price;
            $quantity = $request->quantity;

            for ($count = 0; $count < count($unit_price); $count++) {
                $t = rand(10,1000 ).$product_name[$count];
                Cart::add(['id' => $t, 'name' => $product_name[$count],
                    'qty' => $quantity[$count], 'price' => $unit_price[$count], 'weight' => 550]);
            }

            return response()->json([
                'success' => $product_name
            ]);
        }
    }

    public function addCustomer(Request $request){
        $customer=new Customer();
        $customer->name=$request->name;
        $customer->phone_no=$request->phone_no;
        $customer->address=$request->address;
        $customer->save();

        return response()->json([
            'success' => 'Customer added successfully'
        ]);
    }

    public function autocomplete(Request $request){
        $query=$request->keyword;
        $data = DB::table('customers')
            ->where('phone_no', 'LIKE', "%{$query}%")
            ->get();


        return response()->json([
            'result'=>$data
        ]);

    }

    public function directSell($request){
        $data=new DirectSell();
        $data->customer_name=$request->customer." ".$request->phone_no;
        $data->amount=$request->payment;
        $data->cash_type=$request->cash_type;
        $data->due=$request->due;
        $data->due_source="This from system ";
        $data->date=$request->date;
        $data->save();
    }

    public function onlineSell($request){
        $data=new OnlineSale();
        $data->order_number=$request->order_number;
        $data->amount=$request->payment;
        $data->cash_type=$request->cash_type;
        $data->due=$request->due;
        $data->due_source="This from system ";
        $data->date=$request->date;
        $data->save();
    }

    public function sellProduct(Request $request){
        $type=$request->sales_type;
        if($request->payment==null){
            $request->payment=0;
        }

        if($type==null){
            return response()->json([
                'error'=>'Please select sales type'
            ]);
        }
        if($type=="online"){
            $this->onlineSell($request);
        }else{
            $this->directSell($request);
        }

        $total=Cart::priceTotal();
        $count=Cart::count();
        $content=Cart::content();
        $deliveryCharge=$request->delivery_charge;
        $payment=$request->payment;
        $processingCost=$request->processing_cost;
        $due=$request->due;
        $date=$request->date;
        $orderNumber=$request->order_number;
        $pdf = PDF::loadView('admin.report.invoice', compact(['content','total','deliveryCharge','payment','processingCost','due','orderNumber','date']));
        return $pdf->stream('admin.report.invoice');

    }
    public function logOut(){
        Auth::logout();
        return redirect('/login');
    }


}
