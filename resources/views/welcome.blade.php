<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form method="POST" action="{{ route('entries.store') }}"  class="container">
        @csrf

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <input id="prodId" name="survey_id" type="hidden" value="{{$survey['id']}}">
        @include('survey::standard', ['survey' => $survey])
    </form>
</body>

</html>
