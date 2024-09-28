<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interactive Question Viewer</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Questions and Explanations</h1>
        
        <!-- Form to generate new questions -->
        <form action="{{ route('questions.generate') }}" method="POST">
            @csrf
            <button type="submit" class="btn btn-primary">Generate New Question</button>
        </form>

        <!-- Display list of questions -->
        <div class="questions-list">
            @foreach($questions as $question)
                <div class="question-item">
                    <h2>Question: {{ $question->text }}</h2>
                    <p><strong>Answer:</strong> {{ $question->answer }}</p>
                    <p><strong>Explanation:</strong> {{ $question->explanation }}</p>
                </div>
            @endforeach
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

