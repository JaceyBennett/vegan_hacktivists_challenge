<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Questions and Answers">
        <meta name="author" content="Jacey Bennett">
        <title>{{ $question->question }}</title>

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
            <h1>{{ $question->question }}</h1>
            <form action="/answers/{{ $question->id }}" method="POST">
                @csrf
                <div class="form-group">
                  <label for="answer">Can you answer this question?</label>
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
                        name="answer" 
                        id="answer" 
                        class="form-control {{ $errors->has('answer') ? 'is-invalid': '' }}" 
                        
                        aria-describedby="answerId" 
                        value="{{ old('answer') }}"
                    >
                </div>
                <button type="submit" class="btn btn-primary">Submit Answer</button>
            </form>
        </div>
    </section>

  <div class="album py-5 bg-light">
    <div class="container">
        @if($answers->isNotEmpty())
            @foreach($answers as $answer)
                <div class="row">          
                    <div class="col-12-md">
                        <div class="card mb-4">
                            <div class="card-header">
                                Answered on {{ $answer->created_at->format('l, F jS, Y') }} at {{ $answer->created_at->format('g:iA') }}
                            </div>
                            <div class="card-body">
                            <h4 class="card-text">{{ $answer->answer }}</h4>
                            </div>
                        </div>
                    </div>        
                </div>
            @endforeach
        @else
            <div class="row">
                <h2>This question has not been answered yet.</h2>
            </div>
        @endif
      <div class="row">
          <div class="col">
            {{ $answers->links() }}
        </div>
      </div>
    </div>
  </div>

</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="/docs/4.5/assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="/docs/4.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-LtrjvnR4Twt/qOuYxE721u19sVFLVSA4hf/rRt6PrZTmiPltdZcI7q7PXQBYTKyf" crossorigin="anonymous"></script></body>
</html>
