@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="mb-4">Tambah Jenis Tanaman</h3>
    <form method="POST" action="{{ route('jenis_tanaman.store') }}">
        @csrf
        @include('jenis_tanaman.form')
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('jenis_tanaman.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection

{{-- resources/views/jenis_tanaman/edit.blade.php --}}
@extends('layouts.app')