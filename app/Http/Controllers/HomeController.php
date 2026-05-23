<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function blog()
    {
        return view('blog');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function dashboard()
    {
        return view('dashboard');
    }

    public function adminLogin()
    {
        return view('admin-login');
    }

    public function adminDashboard()
    {
        return view('admin-dashboard');
    }

    public function blogAdmin()
    {
        return view('blog-admin');
    }

    public function missionControl()
    {
        return view('mission-control');
    }

    public function orders()
    {
        return view('orders');
    }

    public function orderSuccess()
    {
        return view('order-success');
    }

    public function sendReceiptEmail(Request $request)
    {
        $validated = $request->validate([
            'orderNumber' => ['required', 'string', 'max:80'],
            'items' => ['required', 'array', 'min:1'],
            'items.*.title' => ['required', 'string', 'max:160'],
            'items.*.meta' => ['nullable', 'string', 'max:160'],
            'items.*.price' => ['required', 'numeric', 'min:0'],
            'items.*.quantity' => ['required', 'integer', 'min:1', 'max:999'],
            'items.*.image' => ['nullable', 'url', 'max:2048'],
            'totals.subtotal' => ['required', 'numeric', 'min:0'],
            'totals.discount' => ['required', 'numeric', 'min:0'],
            'totals.tax' => ['nullable', 'numeric', 'min:0'],
            'totals.total' => ['required', 'numeric', 'min:0'],
            'customer.name' => ['required', 'string', 'max:160'],
            'customer.email' => ['required', 'email:rfc,dns', 'max:255'],
            'customer.school' => ['nullable', 'string', 'max:180'],
            'paymentMethod' => ['required', 'string', 'max:80'],
            'checkedOutAt' => ['nullable', 'string', 'max:120'],
        ]);

        $order = [
            'orderNumber' => $validated['orderNumber'],
            'items' => collect($validated['items'])->map(fn ($item) => [
                'title' => $item['title'],
                'meta' => $item['meta'] ?? 'Digital Science Resource',
                'price' => (float) $item['price'],
                'quantity' => (int) $item['quantity'],
                'image' => $item['image'] ?? null,
            ])->values()->all(),
            'totals' => [
                'subtotal' => (float) $validated['totals']['subtotal'],
                'discount' => (float) $validated['totals']['discount'],
                'tax' => (float) ($validated['totals']['tax'] ?? 0),
                'total' => (float) $validated['totals']['total'],
            ],
            'customer' => $validated['customer'],
            'paymentMethod' => $validated['paymentMethod'],
            'checkedOutAt' => $validated['checkedOutAt'] ?? now()->toIso8601String(),
        ];

        try {
            Mail::send('emails.order-receipt', ['order' => $order], function ($message) use ($order) {
                $message
                    ->to($order['customer']['email'], $order['customer']['name'])
                    ->subject("Your iLearn Science order {$order['orderNumber']} is ready");
            });
        } catch (Throwable $exception) {
            Log::error('Checkout receipt email failed.', [
                'order_number' => $order['orderNumber'],
                'customer_email' => $order['customer']['email'],
                'error' => $exception->getMessage(),
            ]);

            return response()->json([
                'sent' => false,
                'message' => 'Receipt email could not be sent right now.',
            ], 500);
        }

        return response()->json([
            'sent' => true,
            'message' => 'Receipt email sent.',
        ]);
    }

    public function shop()
    {
        return view('shop');
    }

    public function cellBiology()
    {
        return view('resources.cell-biology');
    }

    public function generate(Request $request)
    {
        $request->validate([
            'business_type' => ['required', 'string', 'max:255'],
        ]);

        return 'Generated successfully';
    }
}
