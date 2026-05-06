<?php
session_start();

$ai_result = "";

// Session 6 Example: Mini Project - AI Product Description Generator
// Session 2 Example: CRUD Insert Mockup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'] ?? '';
    $features = $_POST['features'] ?? '';
    $action = $_POST['action'] ?? '';

    if ($action === 'generate_ai') {
        // Mocking an AI API call to OpenAI
        if (!empty($product_name)) {
            $ai_result = "Here is an AI-generated SEO-optimized description for '$product_name': \n\nIntroducing the revolutionary $product_name! Built with cutting-edge technology featuring $features. This product is designed to enhance your daily workflow and bring unparalleled efficiency.";
        }
    } elseif ($action === 'save_product') {
        // Mock CRUD Insert (Session 2)
        // require_once 'config/db.php';
        // $db = (new Database())->getConnection();
        // $stmt = $db->prepare("INSERT INTO products (name, description) VALUES (?, ?)");
        // $stmt->execute([$product_name, $_POST['description']]);
        $ai_result = "Product successfully saved to database! (Mock CRUD Insert)";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products & AI | AI Tools PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <!-- Session 6 Example: AI Product Description Generator Form -->
                <div class="card shadow border-0 mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">Session 6 Mini Project: AI Generator</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <input type="hidden" name="action" value="generate_ai">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control" placeholder="e.g., Smart Wireless Mouse" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Key Features (comma separated)</label>
                                <textarea name="features" class="form-control" rows="2" placeholder="e.g., Bluetooth 5.0, Ergonomic"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">✨ Generate with AI</button>
                        </form>
                    </div>
                </div>

                <!-- Session 2 Example: CRUD Insert Form -->
                <div class="card shadow border-0 mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Session 2: Save Product (CRUD Insert)</h5>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="">
                            <input type="hidden" name="action" value="save_product">
                            <div class="mb-3">
                                <label class="form-label">Product Name</label>
                                <input type="text" name="product_name" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="2" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-success w-100">Save to Database</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Session 6 Example: AI Generated Result Page -->
                <div class="card shadow border-0 h-100">
                    <div class="card-header bg-dark text-white">
                        <h5 class="mb-0">Result Output</h5>
                    </div>
                    <div class="card-body bg-white">
                        <?php if($ai_result): ?>
                            <div class="alert alert-success">
                                <strong>Success!</strong><br><br>
                                <?php echo nl2br(htmlspecialchars($ai_result)); ?>
                            </div>
                            
                            <!-- Session 6 Example: AI Route Example Snippet -->
                            <hr>
                            <h6 class="text-muted">Laravel API Route Equivalent:</h6>
                            <pre class="bg-light p-2 rounded"><code>// routes/api.php
Route::post('/generate-description', [OpenAIController::class, 'generate']);</code></pre>
                        <?php else: ?>
                            <p class="text-muted text-center mt-5">Submit a form to see the generated result here.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>