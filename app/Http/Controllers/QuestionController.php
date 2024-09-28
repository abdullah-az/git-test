<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Services\AIService;

class QuestionController extends Controller
{
    protected $aiService;

    public function __construct(AIService $aiService)
    {
        $this->aiService = $aiService;
    }

    /**
     * Display the form for generating questions.
     *
     * @return \Illuminate\View\View
     */
    public function showGenerateForm()
    {
        return view('generate_question');
    }

    /**
     * Handle the submission of the question generation form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generateQuestion(Request $request)
    {
        $validated = $request->validate([
            'topic' => 'required|string|max:255',
        ]);

        $questionData = $this->aiService->generateQuestion($validated['topic']);

        $question = Question::create([
            'text' => $questionData['text'],
            'answer' => $questionData['answer'],
            'explanation' => $questionData['explanation'],
        ]);

        return redirect()->route('questions.show', $question->id);
    }

    /**
     * Display a specific question and its explanation.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function showQuestion($id)
    {
        $question = Question::findOrFail($id);

        return view('question', compact('question'));
    }

    /**
     * List all questions.
     *
     * @return \Illuminate\View\View
     */
    public function listQuestions()
    {
        $questions = Question::all();

        return view('questions.index', compact('questions'));
    }
}

