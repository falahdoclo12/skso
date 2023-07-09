@extends('layouts.app')

@section('title', 'Power Link Budget')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">Power Link Budget</div>
                    <div class="card-body">
                        <div class="calculation-form">
                            <h2>Redaman</h2>
                            <form id="alphaCalculationForm">
                                @csrf
                                <div class="input-group">
                                    <label for="alpha">Metode Perhitungan:</label>
                                    <select id="alpha" name="alpha" onchange="updateInputs()" required>
                                        <option value="">Choose an option</option>
                                        <option value="0.28">Downlink</option>
                                        <option value="0.35">Uplink</option>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="L">Panjang Serat Optik(L):</label>
                                    <input type="number" id="L" name="L" step="0.001" required /><span>Km</span><br />
                                </div>

                                <div class="input-group">
                                    <Label for="alphaInput">Redaman Serat Optik (αserat):</Label>
                                    <input type="number" id="alphaInput" readonly /><span>dB/Km</span>
                                </div>

                                <div class="input-group">
                                    <label for="Nc">Jumlah Konektor (Nc):</label>
                                    <input type="number" id="Nc" name="Nc" step="1" required /><br />
                                </div>

                                <div class="input-group">
                                    <label for="alpha_c">Redaman Konektor (αc):</label>
                                    <input type="number" id="alpha_c" name="alpha_c" step="0.001" required /><span>dB/buah</span><br />
                                </div>

                                <div class="input-group">
                                    <label for="Ns">Jumlah Sambungan (Ns):</label>
                                    <input type="number" id="Ns" name="Ns" step="1" required /><br />
                                </div>

                                <div class="input-group">
                                    <label for="alpha_s">Redaman Sambungan (αs):</label>
                                    <input type="number" id="alpha_s" name="alpha_s" step="0.001" required /><span>dB/sambungan</span><br />
                                </div>

                                <div class="input-group">
                                    <label>Redaman Splitter (Sp):</label>
                                
                                    <div class="radio-group">
                                        <label for="sp_1_2">1:2</label>
                                        <input type="radio" id="sp_1_2" name="Sp" value="3.70" onclick="updateInputs()" required />
                                    </div>
                                
                                    <div class="radio-group">
                                        <label for="sp_1_4">1:4</label>
                                        <input type="radio" id="sp_1_4" name="Sp" value="7.25" onclick="updateInputs()" required />
                                    </div>
                                
                                    <div class="radio-group">
                                        <label for="sp_1_8">1:8</label>
                                        <input type="radio" id="sp_1_8" name="Sp" value="10.38" onclick="updateInputs()" required />
                                    </div>
                                
                                    <div class="radio-group">
                                        <label for="sp_1_16">1:16</label>
                                        <input type="radio" id="sp_1_16" name="Sp" value="14.10" onclick="updateInputs()" required />
                                    </div>
                                
                                    <div class="radio-group">
                                        <label for="sp_1_32">1:32</label>
                                        <input type="radio" id="sp_1_32" name="Sp" value="17.45" onclick="updateInputs()" required />
                                    </div>
                                
                                    <div class="radio-group">
                                        <label for="sp_1_64">1:64</label>
                                        <input type="radio" id="sp_1_64" name="Sp" value="20" onclick="updateInputs()" required />
                                    </div>
                                
                                    <div class="input-group">
                                        <label for="spInput">Redaman Splitter (Sp):</label>
                                        <input type="number" id="spInput" readonly /><span>dB</span><br />
                                    </div>
                                </div>

                                <div class="input-group">
                                    <label for="alpha_i">Redaman Instalasi (αi):</label>
                                    <input type="number" id="alpha_i" name="alpha_i" step="0.00001" required /><span>dB</span><br />
                                </div>

                                <button type="button" class="btn-calculate" onclick="calculateAlphaTotal()">Calculate</button>
                            </form>
                            <div id="result-container">
                                <label for="alphaTotal" class="result-label">Redaman Total Sistem (αtotal):
                                    <span id="result-alphaTotal"></span>
                                </label>
                            </div>
                        </div>

                        <div class="pr-calculation-form">
                            <h2>Sensitivitas</h2>
                            <form id="prCalculationForm">
                                @csrf
                                <div class="input-group">
                                    <label for="Pt">Daya Keluaran Sumber Optik (Pt):</label>
                                    <input type="number" id="Pt" name="Pt" required /><span>dBm</span><br />
                                </div>

                                <div class="input-group">
                                    <label for="alphaTotal">Redaman Total Sistem (αtotal):</label>
                                    <input type="number" id="alphaTotal" name="alphaTotal" readonly /><br />
                                </div>

                                <div class="input-group">
                                    <label for="Sm">Safety Margin (SM):</label>
                                    <input type="number" id="Sm" name="Sm" required /><span>dB</span><br />
                                </div>

                                <button type="button" class="btn-calculate" onclick="calculatePr()">Calculate</button>
                            </form>

                            <div id="result-container">
                                <label for="Pr" class="result-label">Sensitivitas Daya Maksimum Detektor(Pr):
                                    <span id="resultPr"></span>
                                </label>
                                <label for="Pr" class="result-label">
                                    <span id="approx-resultPr">≈</span>
                                </label>
                            </div>
                        </div>

                        <div class="m-calculation-form">
                            <h2>Margin Daya</h2>
                            <form id="mCalculationform">
                                @csrf
                                <div class="input-group">
                                    <label for="PtM">Daya Keluaran Sumber Optik (Pt):</label>
                                    <input type="number" name="PtM" id="PtM" readonly />
                                    <p>dBm</p>
                                </div>

                                <div class="input-group">
                                    <label for="PrM">Sensitivitas Daya Maksismum Detektor (Pr):</label>
                                    <input type="number" name="PrM" id="PrM" readonly />
                                    <p>dBm</p>
                                    <div class="input-group">
                                        <label for="alphaTotalM">Redaman Total Sistem (αtotal):</label>
                                        <input type="number" id="alphaTotalM" name="alphaTotalM" readonly />
                                    </div>

                                    <div class="input-group">
                                        <label for="SmM">Safety Margin (SM):</label>
                                        <input type="number" id="SmM" name="SmM" readonly />
                                        <p>dB</p>
                                    </div>

                                    <button type="button" class="btn-calculate" onclick="calculateM()">Calculate</button>
                            </form>
                            
                            <div id="result-container">
                                <label for="M" class="result-label">Margin Daya (M):
                                    <span id="resultM"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Add a container for the diagram -->
                    <div id="chartContainer"></div>
                    <!-- Add the Simulation button -->
                    <button class="btn-primary" onclick="simulate()">Simulation</button>

                    <button type="button" class="btn-primary" onclick="savePdf()">Save as Pdf</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- plb js -->
<script src="{{ url('assets/js/plb.js')}}"></script>
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection