<?php

namespace App\Http\Controllers;

use App\Question;
use App\Answer;
use Illuminate\Support\Arr;
use Validator;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionArray = [
            'Isn’t it hard to be vegan?',
            'Where do you get your protein?',
            'I only eat free-range eggs. That’s okay, right?',
            'Isn’t it expensive to be vegan?',
            'I could never be vegan; I love the taste of meat too much.',
            'Doesn’t the bible endorse eating animals?',
            'Haven’t we evolved to eat meat? It’s natural!',
            'What would happen to all the animals if we stopped eating them?',
            'What’s wrong with honey?',
            'You don’t have to kill animals to get dairy and eggs, so what’s wrong with those products?',
        ];

        $randomQuestion = Arr::random($questionArray);
        
        $questions = Question::orderBy('created_at', 'desc')->paginate(10);
        return view('questions.index', compact('questions', 'randomQuestion'));
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
        // Validate the data
        $validator = $request->validate([
            'question' => 'required|string|min:5|unique:questions|regex:/\\?$/',
        ],
        [ 
            'question.regex' => 'Questions need to have a question mark at the end, silly!',
            'question.unique' => 'That question has already been asked.',
        ]
    );
      
        // Add the question to the database
        $question = Question::create(
            [
            'question' => request('question'),
            ]
        );

        return redirect('/')->with('success', 'Your Question has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::find($id);
        $answers = Answer::orderBy('created_at', 'asc')->where('question_id', '=', $id)->paginate(10);
        return view('questions.show', compact('question', 'answers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $Question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }

    /**
 * Get the error messages for the defined validation rules.
 *
 * @return array
 */
}
