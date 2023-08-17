<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Models\order;
use App\Models\Menu;
use App\Models\Product;
use App\Models\Business;
use App\Models\Customer;
use App\Http\Resources\OrderResource;
use App\Mail\welcomemail;
use App\Mail\NotifyCustomerOrder;
use App\Mail\NotifyBusinessOrder;
use \Illuminate\Support\Facades\Mail;
use \Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\email;
use App\Models\cart;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (strpos($request->path(), 'api/') === 0) {            
            return OrderResource::collection(
                order::all());
        }
        else
        {
            $order = order::all();
            return view('resturant.order')->with('Orders', $order);
        }
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

        // Validation passed, proceed with further processing
        $CustomerID = $request->customer['customerid'];
        $BusinessID = $request->businessId;
        $customerCellNumber = $request->customer['cellnumber'];
        $customerEmail = $request->customer['email'];    
        $customerFirstName = $request->customer['firstname'];
        $customerLastName = $request->customer['lastname'];
        $deliveryAddress = $request->delivery['deliveryAddress'];
        $deliveryOption = $request->delivery['deliveryoption'];
        $deliverylatitude = $request->delivery['deliverylatitude'];
        $deliverylongitude = $request->delivery['deliverylongitude'];
        $paymentMethod = $request->payment['Paymentmethod'];
        $paymentDetails = $request->payment['Paymentdetails'];

        $Business = Business::find($BusinessID);        
        $products = $request->products;

        //Holding the data in session variables
        Session::put('cart', $products);
        Session::put('payment', $request->payment);
        Session::put('customer', $request->customer);
        Session::put('delivery', $request->delivery);           

        // Create a new order instance
        $order = new order();                
        $order->user_id = $CustomerID;
        //$order->user_id = Auth::id();
        $order->business_id = $BusinessID;
        $order->order_number = $this->generateUniqueOrderNumber();
        $order->status = 'Order Placed';
        $order->cartsession = 'empty';
        $order->total_amount = 0; //  Update this with the actual total amount
        $order->delivery_address = $deliveryAddress;
        $order->latitude = $deliverylatitude;
        $order->longitude = $deliverylongitude;
        $order->contact_phone = $customerCellNumber;
        $order->delivery_time = '2023-06-15T15:30:00';
        $order->note = 'notes';

        // Save the order
        $order->save();      
        
        $ProductArray = [];

        foreach ($products as $cart) {
            $price = $cart['price'];
            $quantity = $cart['quantity'];
            $menuid = $cart['id'];

            $cart = new cart();
            $cart->price = $price;
            $cart->menu_id = $menuid;
            $cart->order_id = $order->id;
            $cart->user_id = 1;
            $cart->quantity = $quantity;
            $cart->session_id = 1;

            $cart->save();

            $savedcart = Cart::with(['user', 'menu', 'order'])->find($cart->id);

            $user = $cart->user; // Access the associated User model
            $menu = $cart->menu; // Access the associated Menu model
            $order = $cart->order; // Access the associated Order model

            $Product = new Product();
            $Product->name = $menu->name;
            $Product->description = $menu->description;
            $Product->price = $menu->price;
             
            $ProductArray[] = $Product;
        }


        $data = [
            'firstname' => $customerFirstName, 
            'middlename' => "",
            'lastname' => $customerLastName,
            'cellnumber' => $customerCellNumber, 
            'telephonenumber' => $customerCellNumber,
            'emailaddress' => $customerEmail,
            'ordernumber' => $order->order_number,
            'physicaladdress' => $deliveryAddress, 
            'contactaddress' => $deliveryAddress,
            'longitude' => $deliverylongitude,
            'latitude' => $deliverylatitude, 
            'deliveryaddress' => $deliveryAddress,
            'products' => $ProductArray,
            'notes' => 'john@example.com',
        ];

        //saving the customer details
        $customerController = new CustomerController();
        $request = new Request();

        $request->merge($data);
        $response = $customerController->store($request);

        //Send an Email for the New Order Placed with all the details
        $Message = $order->order_number;
    
        //$email = new welcomemail("Testing using Dynamic Messages from Email Controller");
        Mail::to($Business->email)->send(new NotifyBusinessOrder($data));                
        Mail::to($customerEmail)->send(new NotifyCustomerOrder($data));

        //return OrderResource::collection($order);
        return response()->json(['message' => 'Order created successfully', 'order_Number' => $order->order_number], 201);

    // Define the validation rules
       /* $rules = [
            'businessId' => 'required',
            'customer.cellnumber' => 'required',
            'email' => 'required|email',
            'firstName' => 'required',
            'lastName' => 'required',
            'deliveryAddress' => 'required',
            'deliveryoption' => 'required',
            'Paymentmethod' => 'required',
            'paymentDetails' => 'required',
            'products' => 'required|array',
        ];

        // Perform the validation
        $validator = Validator::make($request->all(), $rules);
        // Check if the validation fails
        if ($validator->fails()) {
            // Handle the validation errors
            $errors = $validator->errors();

            // Return the validation errors as a response
            return response()->json(['errors' => $errors], 400);
        }

        else
        {

        // Validation passed, proceed with further processing

        //Business ID
        //$BusinessID = $request->input('businessId');
        $Business = Business::find($BusinessID);

        //Customer Data
        $customerCellNumber = $request->input('customer.cellnumber');
        $customerEmail = $request->input('customer.email');
        $customerFirstName = $request->input('customer.firstname');
        $customerLastName = $request->input('customer.lastname');

        //Delivery Data
        //return $request->input('delivery.deliveryAddress');;
        $deliveryAddress = $request->input('delivery.deliveryAddress');
        $deliveryoption = $request->input('delivery.deliveryoption');
        //Payment Data
        $paymentMethod = $request->input('payment.Paymentmethod');
        $paymentDetails = $request->input('payment.paymentDetails');*/



        /*$CustomerDetails = $request->customer;
        $DeliveryDetails = $request->delivery;
        $PaymentDetais = $request->payment;
        $Shoppingcart = $request->products;*/

        //return $Shoppingcart;

            // Validate the request data
            /*$validatedData = $request->validate([
                'menu_id' => 'required|exists:menus,id',
                'delivery_address' => 'required|string',
                'contact_phone' => 'required|string',
                'delivery_time' => 'required|date',
                'note' => 'nullable|string',
                // Add more validation rules for other fields if needed
            ]);*/

            /*$ShoppingCart = $request->cartdetails;
            $PaymentDetails = $request->paymentdetails;
            $CustomerDetails = $request->customerdetails;
            $DeliveryDetails = $request->deliverydetails;*/        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, order $order)
    {
        $order->load('cart');

        if (strpos($request->path(), 'api/') === 0) {          
            return new OrderResource($order);
        }
        else
        {
            $order = order::all();
            return view('resturant.order')->with('Orders', $order);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        if (strpos($request->path(), 'api/') === 0) {      
            $userId = Auth::id();      
            return BusinessResource::collection(
                Business::where('user_id', $userId)->get());
        }
        else
        {
            $intValue = intval($id);
            //$id = 123; // Example value
            //dd($id);

            // Redirect to another controller action with route parameters
            return redirect()->action('\App\Http\Controllers\CartController@index', ['id' => $intValue]);
            //dd($carts);
            //return redirect()->route('businessaddress.edit');
            //return View::make('admin.businessAddressEdit')->withLayout('layouts.backend')->with('businessoptions', $businessoptions)->with('categoryoptions', $categoryoptions)->with('businessaddresses', $businessaddresses);
           //return view('resturant.orderEdit', compact('carts'));
        }
    }

    public function ordersForUser(Request $request, $userId)
    {
        $userOrders = Order::where('user_id', $userId)->with('cart.menu')->get();
    
        if (strpos($request->path(), 'api/') === 0) {
            return OrderResource::collection($userOrders);
        } else {
            return view('resturant.user_orders')->with('UserOrders', $userOrders);
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function generateUniqueOrderNumber()
    {
        // Implement your logic to generate a unique order number here
        // You can use any combination of letters, numbers, or other characters
        // Example: return 'ORD' . uniqid();

        $prefix = 'ORD'; // You can set a custom prefix for the order number
        $timestamp = now()->format('YmdHis');
        $random = strtoupper(substr(md5(uniqid(rand(), true)), 0, 4));

        return $prefix . $timestamp . $random;        
    }
}
