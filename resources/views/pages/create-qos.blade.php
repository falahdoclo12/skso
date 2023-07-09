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
                <form action="{{ route('qos.store') }}" method="POST" class="qos-form">
                <!-- Add additional buttons as needed -->
            </div>

            <form id="create-qos-form" action="{{ route('qos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">

                    <label for="availability" class="form-label">Availability</label>
                    <div class="input-group">
                        <input type="number" id="availability" name="availability" class="form-control" required>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="packet_loss" class="form-label">Packet Loss</label>
                    <div class="input-group">
                        <input type="text" id="packet_loss" name="packet_loss" class="form-control" required>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="throughput" class="form-label">Throughput</label>
                    <div class="input-group">
                        <input type="number" id="throughput" name="throughput" class="form-control" required>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="latency" class="form-label">Latency</label>
                    <input type="number" id="latency" name="latency" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="jitter" class="form-label">Jitter</label>
                    <input type="number" id="jitter" name="jitter" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="pm" class="form-label">PM</label>
                    <input type="number" id="pm" name="pm" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="ttr" class="form-label">TTR</label>
                    <input type="number" id="ttr" name="ttr" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="nilai_availability" class="form-label">Nilai Availability</label>
                    <div class="input-group">
                        <input type="number" id="nilai_availability" name="nilai_availability" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nilai_packet_loss" class="form-label">Nilai Packet Loss</label>
                    <div class="input-group">
                        <input type="number" id="nilai_packet_loss" name="nilai_packet_loss" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nilai_throughput" class="form-label">Nilai Throughput</label>
                    <div class="input-group">
                        <input type="number" id="nilai_throughput" name="nilai_throughput" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nilai_latency" class="form-label">Nilai Latency</label>
                    <div class="input-group">
                        <input type="number" id="nilai_latency" name="nilai_latency" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nilai_jitter" class="form-label">Nilai Jitter</label>
                    <div class="input-group">
                        <input type="number" id="nilai_jitter" name="nilai_jitter" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nilai_pm" class="form-label">Nilai PM</label>
                    <div class="input-group">
                        <input type="number" id="nilai_pm" name="nilai_pm" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="nilai_ttr" class="form-label">Nilai TTR</label>
                    <div class="input-group">
                        <input type="number" id="nilai_ttr" name="nilai_ttr" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="output_availability" class="form-label">Output Availability</label>
                    <div class="input-group">
                        <input type="number" id="output_availability" name="output_availability" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="output_performance" class="form-label">Output Performance</label>
                    <div class="input-group">
                        <input type="number" id="output_performance" name="output_performance" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="output_maintenance" class="form-label">Output Maintenance</label>
                    <div class="input-group">
                        <input type="number" id="output_maintenance" name="output_maintenance" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nilai_spm" class="form-label">SPM Max</label>
                    <div class="input-group">
                        <input type="number" id="nilai_spm" name="nilai_xpm" class="form-control" required disabled>
                        <span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .qos-buttons {
        margin-bottom: 20px;
    }
</style>
@endsection

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script>
    $(document).ready(function(){
        // Handle Availbality Logic
        $('#availability').on('input', function(){
            let output = 0;
            const val = $(this).val();

            if(val => 99){
                output = 100;
            }
            if(val < 99 ){
                output = 100-(99-val);
            }

            $('#nilai_availability').val(val);

            $('#output_availability').val(output);
        });

        // Handle Packet Loss Logic
        $('#packet_loss').on('input', function(){
            let pl = 0;
            const val = $(this).val();

            if(val <= 5){
                pl = 100;
            }
            if(val > 5 && val <= 20){
                pl = 100 - (val-5)
            }
            if(val > 20){
                pl = 0;
            }

            $('#nilai_packet_loss').val(pl);
        })


        // Handle throughput Logic
        $('#throughput').on('input', function(){
            let t = 0;
            const val = $(this).val();

            if(val >= 95){
                t = 100;
            }
            if(val < 95){
                t = 100 - (95-val);
            }
            if(val == 0){
                t = 0;
            }

            $('#nilai_throughput').val(t);

        })

        // Handle latency Logic
        $('#latency').on('input', function(){
            let l = 0;
            const val = $(this).val();

            if(val <= 20){
                l = 100;
            }
            if(val > 20 && val >= 250){
                l = 100 - (val/250);
            }

            $('#nilai_latency').val(l);
        })

        // Handle Jitter Logic
        $('#jitter').on('input', function(){
            let j = 0;
            const val = $(this).val();

            if(val <= 20){
                j = 100;
            }
            if(val > 20 && val <= 100){
                j = 100 - (val/250) - (100 - 99);
            }
            if(val > 100){
                j = 0;
            }

            $('#nilai_jitter').val(j);
        })

        // Handle PM Logic
        $('#pm').on('input', function(){
            let pm = 0;
            const val = $(this).val();

            if(val >= 4){
                pm = 100;
            }

            if(val < 4){
                pm = (val/4) * 100;
            }


            $('#nilai_pm').val(pm);
        })

        // Handle TTR Logic
        $('#ttr').on('input', function(){
            let ttr = 0;
            const val = $(this).val();

            if(val <= 4){
                ttr = 100;
            }

            if(val > 4){
                ttr = (4/val) * 100;
            }


            $('#nilai_ttr').val(ttr);
        })

        // Handle Performance
        $('#jitter').change(function(){
            // (80% x Nilai Avail) + (10% x (Nilai Packet Loss + Nilai Throughput + Nilai Latency, Nilai Jitter)) + 10% x ( Nilai PM +  Nilai TTR)
            var pl = document.getElementById("nilai_packet_loss").value;
            var tp = document.getElementById("nilai_throughput").value;
            var lt = document.getElementById("nilai_latency").value;
            var jit = document.getElementById("nilai_jitter").value;
            var performance = (parseInt(pl)+parseInt(tp)+parseInt(lt)+parseInt(jit))/4 ;
            $('#output_performance').val(performance);
        })

        // Handle Maintenance
        $('#ttr').change(function(){
            // (80% x Nilai Avail) + (10% x (Nilai Packet Loss + Nilai Throughput + Nilai Latency, Nilai Jitter)) + 10% x ( Nilai PM +  Nilai TTR)
            var pm = document.getElementById("nilai_pm").value;
            var ttr = document.getElementById("nilai_ttr").value;
            var maintenance = (parseInt(pm)+parseInt(ttr))/2 ;
            $('#output_maintenance').val(maintenance);

        })

        // Handle SPM Max
        $('#ttr').change(function(){
            // (80% x Nilai Avail) + (10% x (Nilai Packet Loss + Nilai Throughput + Nilai Latency, Nilai Jitter)) + 10% x ( Nilai PM +  Nilai TTR)
            var aval = document.getElementById("output_availability").value;
            var opm = document.getElementById("output_performance").value;
            var omt = document.getElementById("output_maintenance").value;
            // var lt = document.getElementById("nilai_latency").value;
            // var jit = document.getElementById("nilai_jitter").value;
            // var pm = document.getElementById("nilai_pm").value;
            // var ttr = document.getElementById("nilai_ttr").value;
            var hasil = (80/100)*parseInt(aval) + (10/100)*parseInt(opm) + (10/100)*parseInt(omt);

            console.log(omt);
            $('#nilai_spm').val(hasil.toFixed(2));
        })
    })
</script>

{{-- avail = 99% , PL = 5% , TP = 95% , LT = 20 , JIT = 20 , PM = 4 , TTR = 4 ( 100 ) --}}
