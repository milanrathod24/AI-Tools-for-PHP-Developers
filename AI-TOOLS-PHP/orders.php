<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Orders | AI Tools PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h2>Session 3: GitHub Copilot in VS Code</h2>
                <p class="text-muted">Below are examples of code structures typically generated using GitHub Copilot.</p>
            </div>
        </div>

        <div class="row g-4">
            <!-- Session 3 Example: ProductController -->
            <div class="col-md-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">ProductController Example</h5>
                    </div>
                    <div class="card-body">
                        <pre><code>&lt;?php
namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Copilot can easily autocomplete standard CRUD methods
    public function index()
    {
        $products = Product::all();
        return response()->json($products);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric'
        ]);
        
        $product = Product::create($validated);
        return response()->json($product, 201);
    }
}
?&gt;</code></pre>
                    </div>
                </div>
            </div>

            <!-- Session 3 Example: Migration -->
            <div class="col-md-6">
                <div class="card shadow border-0 h-100">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0">Migration Example</h5>
                    </div>
                    <div class="card-body">
                        <pre><code>&lt;?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Copilot suggests columns based on table name 'orders'
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->decimal('total_amount', 8, 2);
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
?&gt;</code></pre>
                    </div>
                </div>
            </div>
            
            <!-- Session 3 Example: API Routes -->
            <div class="col-md-12">
                <div class="card shadow border-0 mb-5">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">API Routes Example</h5>
                    </div>
                    <div class="card-body">
                        <pre><code>&lt;?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

// Copilot helps group API routes efficiently
Route::prefix('v1')->group(function () {
    Route::apiResource('products', ProductController::class);
    Route::apiResource('orders', OrderController::class)->middleware('auth:sanctum');
});
?&gt;</code></pre>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>
