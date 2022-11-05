@extends('app')

@section('content')
    <h1>Senarai polls</h1>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($polls as $poll)
                        <tr>
                            <td>{{ $poll->soalan }}</td>
                            <td><a href="/poll/{{$poll->id}}">Link</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3">
            <form action='/poll' method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Soalan</label>
                    <textarea name="soalan" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Daftar poll</button>
            </form>
        </div>
    </div>
@endsection
