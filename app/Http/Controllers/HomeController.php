<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Throwable;

class HomeController extends Controller
{
    private function productStorePath(): string
    {
        return storage_path('app/ilearn-products.json');
    }

    private function defaultProducts(): array
    {
        return [
            [
                'id' => 'cell-biology-interactive-powerpoint',
                'title' => 'Cell Biology Interactive PowerPoint',
                'category' => 'Presentation',
                'status' => 'Published',
                'price' => 450,
                'grade' => 'Grade 9-12',
                'format' => 'PPTX + PDF',
                'stock' => 'Digital / Unlimited',
                'subject' => 'Biology',
                'topic' => 'Cell Biology',
                'tags' => 'cells, organelles, biology',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuDB29hlsu6znAHyJwVa-GZ2GEL1qRnewIXPnir5KUIvPk3vY2FFuEYqNxWpbBb_S4i1_9cmj6hfXbbm0wq8LMsxrMXm3otjI_lesrFSTbydTwMWXd2Cgx9zkMYsIX8pugR8DnnL3y8EtZLVBl1HYoCZObeGk9hhHuXl2iqlfEy5qpaQUtNcVcZt18lXM0RWiJZuPFwCoH01n7k71hV_8pOjscUwmXnCjDxQgRKCdPBDeqczACKtuekX2CyfsEtKl8-YdFotM9lhUWc',
                'description' => 'A gamified journey through the microscopic world with animations and embedded quizzes.',
                'details' => 'Includes 120+ slides, editable teacher notes, printable worksheets, quiz checkpoints, and plant vs animal cell comparisons.',
                'updatedAt' => '2026-05-24T00:00:00+08:00',
            ],
            [
                'id' => 'photosynthesis-visual-pack',
                'title' => 'Photosynthesis Visual Pack',
                'category' => 'Visual Resource',
                'status' => 'Published',
                'price' => 280,
                'grade' => 'Grade 7-10',
                'format' => 'PNG + PDF',
                'stock' => 'Digital / Unlimited',
                'subject' => 'Biology',
                'topic' => 'Photosynthesis',
                'tags' => 'plants, chloroplast, visual',
                'image' => '/images/shop/photosynthesis-process-topic.svg',
                'description' => 'Process diagrams and classroom visuals for light-dependent reactions and glucose production.',
                'details' => 'Includes labeled process charts, vocabulary cards, exit ticket prompts, and printable student reference sheets.',
                'updatedAt' => '2026-05-24T00:00:00+08:00',
            ],
            [
                'id' => 'pedigree-analysis-quiz-set',
                'title' => 'Pedigree Analysis Quiz Set',
                'category' => 'Test/Quiz',
                'status' => 'Published',
                'price' => 190,
                'grade' => 'Grade 9-12',
                'format' => 'PDF + Google Forms',
                'stock' => 'Digital / Unlimited',
                'subject' => 'Biology',
                'topic' => 'Pedigree Analysis',
                'tags' => 'genetics, heredity, quiz',
                'image' => '/images/shop/pedigree-analysis-topic.svg',
                'description' => 'Assessment set for interpreting inherited traits using pedigree charts.',
                'details' => 'Contains 40 questions, answer key, rubric, printable charts, and digital form-ready quiz items.',
                'updatedAt' => '2026-05-24T00:00:00+08:00',
            ],
        ];
    }

    private function readProducts(): array
    {
        $path = $this->productStorePath();
        if (!File::exists($path)) {
            return $this->defaultProducts();
        }

        $products = json_decode(File::get($path), true);

        return is_array($products) ? array_values($products) : $this->defaultProducts();
    }

    private function writeProducts(array $products): void
    {
        File::ensureDirectoryExists(dirname($this->productStorePath()));
        File::put($this->productStorePath(), json_encode(array_values($products), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function validatedProduct(Request $request): array
    {
        $validated = $request->validate([
            'id' => ['nullable', 'string', 'max:160'],
            'title' => ['required', 'string', 'max:180'],
            'category' => ['required', 'string', 'max:80'],
            'status' => ['required', 'string', 'max:40'],
            'price' => ['required', 'numeric', 'min:0'],
            'grade' => ['nullable', 'string', 'max:80'],
            'format' => ['nullable', 'string', 'max:120'],
            'stock' => ['nullable', 'string', 'max:120'],
            'subject' => ['nullable', 'string', 'max:80'],
            'topic' => ['nullable', 'string', 'max:120'],
            'tags' => ['nullable', 'string', 'max:240'],
            'image' => ['nullable', 'string', 'max:2500000'],
            'downloadLink' => ['nullable', 'string', 'max:1200'],
            'description' => ['required', 'string', 'max:1200'],
            'details' => ['nullable', 'string', 'max:4000'],
        ]);

        $validated['id'] = $validated['id'] ?: Str::slug($validated['title']) . '-' . Str::lower(Str::random(5));
        $validated['price'] = (float) $validated['price'];
        $validated['updatedAt'] = now()->toIso8601String();

        return $validated;
    }

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

    public function productsIndex()
    {
        return response()->json([
            'products' => $this->readProducts(),
        ]);
    }

    public function saveProduct(Request $request)
    {
        $product = $this->validatedProduct($request);
        $products = $this->readProducts();
        $index = collect($products)->search(fn ($item) => ($item['id'] ?? null) === $product['id']);

        if ($index === false) {
            array_unshift($products, $product);
        } else {
            $products[$index] = $product;
        }

        $this->writeProducts($products);

        return response()->json([
            'product' => $product,
            'products' => $products,
        ]);
    }

    public function deleteProduct(string $id)
    {
        $products = array_values(array_filter($this->readProducts(), fn ($product) => ($product['id'] ?? '') !== $id));
        $this->writeProducts($products);

        return response()->json([
            'products' => $products,
        ]);
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
            'items.*.image' => ['nullable', 'string', 'max:600000'],
            'totals.subtotal' => ['required', 'numeric', 'min:0'],
            'totals.discount' => ['required', 'numeric', 'min:0'],
            'totals.tax' => ['nullable', 'numeric', 'min:0'],
            'totals.total' => ['required', 'numeric', 'min:0'],
            'customer.name' => ['required', 'string', 'max:160'],
            'customer.email' => ['required', 'email:rfc', 'max:255'],
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
