<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Customer;

class AdminCartController extends Controller
{
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index(){
        return view('admin.carts.customer', [
            'title' => 'Danh sách đơn hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
