@extends('layouts.app')

@section('title', 'Rise Time Budget')

@section('content')

<div class="container">
    <h3>Total Rise Time</h3>
    <form id="tCalculationForm">
        <div class="form-group">
            <label for="linkType">Metode Perhitungan:</label>
            <select id="linkType" onchange="setLinkValues()">
                <option value="">Choose</option>
                <option value="Downlink">Downlink</option>
                <option value="Uplink">Uplink</option>
            </select>
        </div>

        <div class="form-group">
            <label for="t_tx">Rise Time Transmitter OLT (t<sub>tx</sub>):</label>
            <input type="number" id="t_tx" step="any" required>
            <span class="unit">ns</span>
        </div>

        <div class="form-group">
            <label for="t_rx">Rise Time Transmitter ONT (t<sub>rx</sub>):</label>
            <input type="number" id="t_rx" step="any" required>
            <span class="unit">ns</span>
        </div>

        <div class="form-group">
            <label for="Δσ">Lebar Spektral (Δσ):</label>
            <input type="number" id="Δσ" step="any" required>
            <span class="unit">nm</span>
        </div>

        <div class="form-group">
            <label for="L">Panjang Serat Optik (L):</label>
            <input type="number" id="L" step="any" required>
            <span class="unit">Km</span>
        </div>

        <div class="form-group">
            <label for="a">Jari- Jari Inti (a):</label>
            <input type="number" id="a" step="any" required>
            <span class="unit">µm</span>
        </div>

        <div class="form-group">
            <label for="λ">Panjang Gelombang (λ):</label>
            <input type="number" id="λ" step="any" required>
            <span class="unit">µm</span>
        </div>

        <div class="form-group">
            <label for="Dm">Dispersi Material (D<sub>m</sub>):</label>
            <input type="number" id="Dm" step="any" required>
            <span class="unit">ns/nm.km</span>
        </div>

        <button type="button" class="btn-calculate" onclick="calculateTtotal()">Calculate</button>
    </form>
    <br>
    <div class="form-group">
        <label for="t_total">T<sub>total</sub>:</label>
        <input type="text" id="resultTtotal">
        <span class="unit">ns</span>
    </div>

    <h3>Maximum Rise Time Bit Rate NRZ</h3>
    <form id="trCalculationForm">
        <div class="form-group">
            <label for="Br">Bit Rate (B<sub>r</sub>):</label>
            <input type="number" id="Br" step="any" required>
            <span class="unit">Gbps</span>
        </div>
        <button type="button" class="btn-calculate" onclick="calculateTr()">Calculate</button>
    </form>
    <br>
    <div class="form-group">
        <label for="Tr">T<sub>r</sub>:</label>
        <input type="text" name="Tr" id="resultTr">
        <span class="unit">ns</span>
    </div>
</div>
<div class="conclusion-container">
    <h3>Kesimpulan:</h3>
    <textarea id="conclusion" readonly></textarea>
    <button id="savePDFButton" class="btn-calculate" onclick="saveAsPDF()" style="display: none;">Save as PDF</button>
</div>
<!-- rtb js -->
<script src="{{ url('assets/js/rtb.js')}}"></script>
@endsection
