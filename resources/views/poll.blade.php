@extends('app')

@section('content')
    <h1>Senarai Options</h1>

    <div class="row">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Sekolah</th>
                        <th scope="col">Nama</th>                        
                        <th scope="col"></th>                    
                    </tr>
                </thead>
                <tbody>
                    @foreach ($options as $option)
                        <tr>
                            <td>{{ $option->sekolah->nama }}</td>
                            <td>{{ $option->nama }}</td>                            
                            <td>
                                <form action="/poll/{{$option->poll->id}}/pilihan/{{$option->id}}" method="POST">
                                    @csrf
                                    <button type="submit">Vote</button>
                                </form>
                                {{ $option->votes->count() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-3">
            <form action='/poll/{{$poll->id}}/pilihan' method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Nama Pilihan</label>
                    <input type="text" name="nama" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label">Sekolah</label>
                    <input type="number" name="sekolah_id" class="form-control">
                </div>                
                <button type="submit" class="btn btn-primary">Daftar Pilihan</button>
            </form>
        </div>
    </div>
@endsection
