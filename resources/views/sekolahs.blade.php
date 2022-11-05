@extends('app')

@section('content')
    <h1>Senarai Sekolahs</h1>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Latitude</th>
                        <th scope="col">Longitude</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sekolahs as $sekolah)
                        <tr>
                            <td>{{ $sekolah->nama }}</td>
                            <td>{{ $sekolah->latitude }}</td>
                            <td>{{ $sekolah->longitude }}</td>
                            <td><a href="/sekolah/{{$sekolah->id}}">Link</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3">
            <form action='/sekolah' method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control" aria-describedby="emailHelp">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="mb-3">
                    <label class="form-label">Latitude</label>
                    <input type="number" step="0.000001" name="latitude" class="form-control" aria-describedby="emailHelp">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <div class="mb-3">
                    <label class="form-label">Longitude</label>
                    <input type="number" step="0.000001" name="longitude" class="form-control"
                        aria-describedby="emailHelp">
                    {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                </div>
                <button type="submit" class="btn btn-primary">Daftar Sekolah</button>
            </form>
        </div>
    </div>
@endsection
