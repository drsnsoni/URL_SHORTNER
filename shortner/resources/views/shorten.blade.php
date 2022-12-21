<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ShortLink | Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>

    <div class="container mt-5">
        <h1 style="text-align: center">Url Shortner</h1>
        @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif
        <div class="card">
            <div class="card-header ">
                <form action="{{ route('generate.shorten.link.post') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="link" class="form-control" placeholder="Enter Link">

                        <div class="input-group-addon">
                            <button class="btn btn-success">
                                Generate Shorten Link
                            </button>

                        </div>
                        <br>

                    </div>

                </form>
                @error('link')
                           <p class="text text-danger">{{ $message }}</p>
                        @enderror
            </div>
        </div>


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Short Link</th>
                    <th>Link</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($shortenLinks as $row)
                    <tr>
                        <td>{{ $row -> id }}</td>
                        <td>
                            <a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a>
                        </td>
                        <td>{{ $row->link }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
