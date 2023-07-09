@extends('layouts.app')

@section('title', 'Power Link Budget')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Hasil Perhitungan PLB</div>
                <div class="card-body">
                    <div class="pdf-container">
                        <embed src="{{ $tempLink }}" type="application/pdf" width="100%" height="550px">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
