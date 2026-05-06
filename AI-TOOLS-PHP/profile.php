<?php
session_start();
require_once 'middleware/auth.php';
// Protected route: Ensure only logged-in users can view this page
checkAuth();

$username = $_SESSION['user_name'] ?? 'Student';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile | AI Tools PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">

    <?php include 'navbar.php'; ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="card shadow border-0 text-center p-4">
                    <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($username); ?>&background=0D8ABC&color=fff" alt="Profile Image" class="rounded-circle mx-auto mb-3" width="100">
                    <h4>Welcome, <?php echo htmlspecialchars($username); ?>!</h4>
                    <p class="text-muted">You are successfully logged in using PHP Sessions.</p>
                    <a href="logout.php" class="btn btn-outline-danger mt-3">Logout</a>
                </div>
            </div>

            <div class="col-md-8">
                <h2 class="mb-4">Session 5: Integrating OpenAI API with Laravel</h2>
                
                <!-- Session 5 Example: AI Controller -->
                <div class="card shadow border-0 mb-4">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">AI Controller Example</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">This is how you integrate the OpenAI API in a Laravel Controller.</p>
                        <pre><code>&lt;?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class OpenAIController extends Controller
{
    public function generate(Request $request)
    {
        $prompt = $request->input('prompt');
        $apiKey = env('OPENAI_API_KEY');

        // Integrating OpenAI API
        $response = Http::withToken($apiKey)->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo',
            'messages' => [
                ['role' => 'user', 'content' => $prompt]
            ],
            'temperature' => 0.7,
        ]);

        return response()->json($response->json());
    }
}
?&gt;</code></pre>
                    </div>
                </div>

                <!-- Session 5 Example: Blade Output -->
                <div class="card shadow border-0 mb-5">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Blade Output Example</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted small">Displaying the AI-generated response in a Laravel Blade view.</p>
                        <pre><code>&lt;!-- resources/views/ai-result.blade.php --&gt;
@extends('layouts.app')

@section('content')
&lt;div class="container"&gt;
    &lt;h2&gt;AI Generated Output&lt;/h2&gt;
    
    @if(isset($aiResponse))
        &lt;div class="alert alert-success"&gt;
            {{ $aiResponse['choices'][0]['message']['content'] }}
        &lt;/div&gt;
    @else
        &lt;p&gt;No response generated yet.&lt;/p&gt;
    @endif
&lt;/div&gt;
@endsection</code></pre>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
