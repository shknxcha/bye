@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Edit Jenis Tanaman</h3>
    <form method="POST" action="{{ route('jenis_tanaman.update', $jenis->id) }}">
        @csrf
        @method('PUT')
        @include('jenis_tanaman.form', ['jenisTanaman' => $jenis])
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('jenis_tanaman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection