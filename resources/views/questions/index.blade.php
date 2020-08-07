<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Questions and Answers">
        <meta name="author" content="Jacey Bennett">
        <title>Vegan Q & A</title>

        <!-- Bootstrap core CSS -->
        <link 
            rel="stylesheet" 
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
            integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" 
            crossorigin="anonymous"
        >

    </head>
  <body>
    <main role="main">
    <section class="jumbotron text-center">
        <div class="container">
            <a href="/">
                <h1>Vegan Q&A</h1>
            </a>
            <p class="lead text-muted">Answering your burning questions about veganism.</p>
            <form action="/" method="POST">
                @csrf
                <div class="form-group">
                  <label for="question">Ask A Question</label>
                @if (count($errors)>0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <ul>
                                <li>{{ $error }}</li>
                            </ul>
                        @endforeach
                    </div>
                @elseif (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <input 
                        type="text" 
                        name="question" 
                        id="question" 
                        class="form-control {{ $errors->has('question') ? 'is-invalid': '' }}" 
                        placeholder="e.g. {{ $randomQuestion }}" 
                        aria-describedby="questionId" 
                        value="{{ old('question') }}"
                    >
                  <small id="helpId" class="text-muted">The more you know, the more you grow!</small>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">
            @if($questions->isNotEmpty())
                @foreach($questions as $question)
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                Question asked on {{ $question->created_at->format('l, F jS, Y') }} at {{ $question->created_at->format('g:iA') }}
                            </div>
                            <div class="card-body">
                            <h4 class="card-text">{{ $question->question }}</h4>
                            <a class="btn btn-info btn-block" href="/questions/{{ $question->id }}" role="button"">
                                @if ($question->answer->count())
                                    {{ $question->answer->count() }} Answer(s)
                                @else
                                    {{ $question->answer->count() }} Answer(s)
                                @endif
                            </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="row">
                    <h2>There are no questions yet.</h2>
                </div>
            @endif
      </div>
      <div class="row">
          <div class="col">
            {{ $questions->links() }}
        </div>
      </div>
    </div>
  </div>

</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script></body>
</html>
