@extends('layouts.app')

@section('title', 'Quality of Service')

@section('content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Quality of Service</h4>
                    </div>
                </div>
            </div>
            <div class="qos-buttons">
                <a href="{{ route('qos.create') }}" class="btn btn-primary">Create New</a>
                <!-- Add additional buttons as needed -->
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Availability</th>
                            <th>Packet Loss</th>
                            <th>Throughput</th>
                            <th>Latency</th>
                            <th>Jitter</th>
                            <th>PM</th>
                            <th>TTR</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($qosData as $qos)
                        <tr>
                            <td>{{ $qos->availability }}</td>
                            <td>{{ $qos->packet_loss }}</td>
                            <td>{{ $qos->throughput }}</td>
                            <td>{{ $qos->latency }}</td>
                            <td>{{ $qos->jitter }}</td>
                            <td>{{ $qos->pm }}</td>
                            <td>{{ $qos->ttr }}</td>
                            <td>
                                <a href="{{ route('qos.download', $qos->id) }}" class="btn btn-primary">Download</a>
                                <a href="#" class="btn btn-danger" onclick="event.preventDefault(); deleteQos({{ $qos->id }})">Delete</a>
                                <form id="delete-form-{{ $qos->id }}" action="{{ route('qos.destroy', $qos->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function deleteQos(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            event.preventDefault();
            document.getElementById('delete-form-' + id).submit();
        }
    }
</script>

@endsection
