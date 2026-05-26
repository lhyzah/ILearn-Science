<?php

namespace App\Http\Controllers;

use App\Models\Order;
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

    private function blogStorePath(): string
    {
        return storage_path('app/ilearn-blog-posts.json');
    }

    private function fallbackOrderStorePath(): string
    {
        return storage_path('app/ilearn-orders.json');
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

    private function defaultBlogPosts(): array
    {
        return [
            [
                'id' => 'blog-digestive-system-lessons',
                'title' => 'Digestive System Lessons That Students Can Actually Visualize',
                'slug' => 'digestive-system-lessons-that-students-can-actually-visualize',
                'category' => 'Biology',
                'status' => 'Published',
                'meta' => 'Use diagrams, model cards, and quick checks to help students follow food as it moves through the human body.',
                'content' => 'The strongest digestive system lessons help students connect each organ to a specific task, then sequence the whole process from ingestion to absorption. Use diagrams, model cards, and short checks so learners can describe what happens in the mouth, stomach, small intestine, and large intestine with confidence.',
                'image' => '/images/shop/digestive-system-topic.svg',
                'views' => 980,
                'updatedAt' => '2026-05-24T10:00:00+08:00',
                'publishedAt' => '2026-05-24T10:00:00+08:00',
            ],
            [
                'id' => 'blog-heredity-family-traits',
                'title' => 'Teaching Heredity With Simple Family Trait Simulations',
                'slug' => 'teaching-heredity-with-simple-family-trait-simulations',
                'category' => 'Genetics',
                'status' => 'Published',
                'meta' => 'Make inheritance patterns easier to discuss with student-friendly trait cards and classroom scenarios.',
                'content' => 'Heredity becomes easier when students can model traits instead of memorizing vocabulary alone. Trait cards, parent-offspring scenarios, and guided predictions help learners connect dominant and recessive traits to real inheritance patterns.',
                'image' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuAZBMYNDXcOHEDnSv8aUbarKS9z-gDUK5nWzUl-CE8CXF46HW-YUafVsOhoheg7FBjLs_Bu2Nkx2TEX7j6aTlh85EHlCOL4bSFOinoye7AP0K7l3SiDtKSzlnbZ4wgnJmHGgD5VUBCGCg-8_Y1I1yvzgDA25FyHS9ffdzzyjNwvuHMwOCs8EXmuTh_vAh5XKS53qMlrryJ9EuJkOnUyBI9ZeOmusks8xeXrdgP2xMgSh4uV6F0bOXrD4rRjAFQXk1Rs3a8C7zF4bmE',
                'views' => 760,
                'updatedAt' => '2026-05-23T14:30:00+08:00',
                'publishedAt' => '2026-05-23T14:30:00+08:00',
            ],
            [
                'id' => 'blog-photosynthesis-process',
                'title' => 'Photosynthesis as a Process, Not a Memorized Formula',
                'slug' => 'photosynthesis-as-a-process-not-a-memorized-formula',
                'category' => 'Plants',
                'status' => 'Published',
                'meta' => 'Help students connect light, carbon dioxide, water, glucose, and oxygen through visual sequencing.',
                'content' => 'A process-first approach lets students explain what enters the plant, what changes inside the leaf, and why glucose matters for growth. Use visual sequencing to connect sunlight, chloroplasts, carbon dioxide, water, glucose, and oxygen into one coherent story.',
                'image' => '/images/shop/photosynthesis-process-topic.svg',
                'views' => 1140,
                'updatedAt' => '2026-05-22T09:15:00+08:00',
                'publishedAt' => '2026-05-22T09:15:00+08:00',
            ],
        ];
    }

    private function readBlogPosts(): array
    {
        $path = $this->blogStorePath();
        if (!File::exists($path)) {
            return $this->defaultBlogPosts();
        }

        $posts = json_decode(File::get($path), true);

        return is_array($posts) ? array_values($posts) : $this->defaultBlogPosts();
    }

    private function writeBlogPosts(array $posts): void
    {
        File::ensureDirectoryExists(dirname($this->blogStorePath()));
        File::put($this->blogStorePath(), json_encode(array_values($posts), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    private function writeFallbackOrder(array $order, string $emailStatus = 'pending', ?string $emailError = null): array
    {
        $path = $this->fallbackOrderStorePath();
        $orders = $this->readFallbackOrders();

        $orderRecord = [
            'order_number' => $order['orderNumber'],
            'customer_name' => $order['customer']['name'],
            'customer_email' => $order['customer']['email'],
            'customer_school' => $order['customer']['school'] ?? null,
            'payment_method' => $order['paymentMethod'],
            'payment_status' => $order['paymentStatus'] ?? 'verified',
            'email_status' => $emailStatus,
            'email_error' => $emailError,
            'items' => $order['items'],
            'totals' => $order['totals'],
            'checked_out_at' => $order['checkedOutAt'],
            'email_sent_at' => $emailStatus === 'sent' ? now()->toIso8601String() : null,
            'updated_at' => now()->toIso8601String(),
        ];

        $orders = array_values(array_filter($orders, fn ($item) => ($item['order_number'] ?? null) !== $order['orderNumber']));
        array_unshift($orders, $orderRecord);

        File::ensureDirectoryExists(dirname($path));
        File::put($path, json_encode($orders, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));

        return $orderRecord;
    }

    private function readFallbackOrders(): array
    {
        $path = $this->fallbackOrderStorePath();
        if (!File::exists($path)) {
            return [];
        }

        $orders = json_decode(File::get($path), true);

        return is_array($orders) ? $orders : [];
    }

    private function findFallbackOrder(string $orderNumber): ?array
    {
        foreach ($this->readFallbackOrders() as $order) {
            if (($order['order_number'] ?? null) === $orderNumber) {
                return $order;
            }
        }

        return null;
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

    private function validatedBlogPost(Request $request): array
    {
        $validated = $request->validate([
            'id' => ['nullable', 'string', 'max:160'],
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180'],
            'category' => ['required', 'string', 'max:80'],
            'status' => ['required', 'string', 'max:40'],
            'meta' => ['nullable', 'string', 'max:500'],
            'content' => ['required', 'string', 'max:12000'],
            'image' => ['nullable', 'string', 'max:2500000'],
            'views' => ['nullable', 'integer', 'min:0'],
            'publishedAt' => ['nullable', 'string', 'max:80'],
        ]);

        $validated['id'] = $validated['id'] ?: 'blog-' . Str::slug($validated['title']) . '-' . Str::lower(Str::random(5));
        $validated['slug'] = Str::slug($validated['slug'] ?: $validated['title']);
        $validated['views'] = (int) ($validated['views'] ?? 0);
        $validated['updatedAt'] = now()->toIso8601String();

        if (($validated['status'] ?? '') === 'Published' && empty($validated['publishedAt'])) {
            $validated['publishedAt'] = now()->toIso8601String();
        }

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

    public function blogsIndex()
    {
        return response()->json([
            'posts' => $this->readBlogPosts(),
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

    public function saveBlogPost(Request $request)
    {
        $post = $this->validatedBlogPost($request);
        $posts = $this->readBlogPosts();
        $index = collect($posts)->search(fn ($item) => ($item['id'] ?? null) === $post['id']);

        if ($index === false) {
            array_unshift($posts, $post);
        } else {
            $existing = $posts[$index];
            $post['views'] = (int) ($existing['views'] ?? $post['views'] ?? 0);
            if (($post['status'] ?? '') === 'Published' && empty($post['publishedAt']) && !empty($existing['publishedAt'])) {
                $post['publishedAt'] = $existing['publishedAt'];
            }
            $posts[$index] = $post;
        }

        $this->writeBlogPosts($posts);

        return response()->json([
            'post' => $post,
            'posts' => $posts,
        ]);
    }

    public function deleteBlogPost(string $id)
    {
        $posts = array_values(array_filter($this->readBlogPosts(), fn ($post) => ($post['id'] ?? '') !== $id));
        $this->writeBlogPosts($posts);

        return response()->json([
            'posts' => $posts,
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
            'paymentStatus' => ['nullable', 'string', 'max:40'],
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
            'paymentStatus' => $validated['paymentStatus'] ?? 'verified',
            'checkedOutAt' => $validated['checkedOutAt'] ?? now()->toIso8601String(),
        ];

        if (!in_array($order['paymentStatus'], ['verified', 'paid', 'success'], true)) {
            return response()->json([
                'sent' => false,
                'message' => 'Payment is not verified yet. Confirmation email was not sent.',
            ], 422);
        }

        $orderModel = null;
        try {
            $orderModel = Order::updateOrCreate(
                ['order_number' => $order['orderNumber']],
                [
                    'customer_name' => $order['customer']['name'],
                    'customer_email' => $order['customer']['email'],
                    'customer_school' => $order['customer']['school'] ?? null,
                    'payment_method' => $order['paymentMethod'],
                    'payment_status' => $order['paymentStatus'],
                    'email_status' => 'pending',
                    'items' => $order['items'],
                    'totals' => $order['totals'],
                    'checked_out_at' => $order['checkedOutAt'],
                ]
            );

            if ($orderModel->email_sent_at) {
                return response()->json([
                    'sent' => true,
                    'duplicate' => true,
                    'message' => 'Receipt email was already sent for this order.',
                ]);
            }
        } catch (Throwable $exception) {
            Log::warning('Order database save failed; using fallback order store.', [
                'order_number' => $order['orderNumber'],
                'error' => $exception->getMessage(),
            ]);

            $fallbackOrder = $this->findFallbackOrder($order['orderNumber']);
            if (($fallbackOrder['email_status'] ?? null) === 'sent') {
                return response()->json([
                    'sent' => true,
                    'duplicate' => true,
                    'message' => 'Receipt email was already sent for this order.',
                ]);
            }

            $this->writeFallbackOrder($order, 'pending');
        }

        try {
            Mail::send('emails.order-receipt', ['order' => $order], function ($message) use ($order) {
                $message
                    ->to($order['customer']['email'], $order['customer']['name'])
                    ->subject("Your iLearn Science order {$order['orderNumber']} is ready");
            });

            if ($orderModel) {
                $orderModel->forceFill([
                    'email_status' => 'sent',
                    'email_sent_at' => now(),
                    'email_failed_at' => null,
                    'email_error' => null,
                ])->save();
            } else {
                $this->writeFallbackOrder($order, 'sent');
            }
        } catch (Throwable $exception) {
            if ($orderModel) {
                $orderModel->forceFill([
                    'email_status' => 'failed',
                    'email_failed_at' => now(),
                    'email_error' => $exception->getMessage(),
                ])->save();
            } else {
                $this->writeFallbackOrder($order, 'failed', $exception->getMessage());
            }

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
