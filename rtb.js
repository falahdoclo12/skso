function setLinkValues() {
    var linkType = document.getElementById("linkType").value;
    var λ = document.getElementById("λ");
    var Br = document.getElementById("Br");
    var Dm = document.getElementById("Dm");

    if (linkType === "Downlink") {
        λ.value = 1.49;
        Br.value = 2.4;
        Dm.value = 0.01364;
    } else if (linkType === "Uplink") {
        λ.value = 1.31;
        Br.value = 1.2;
        Dm.value = 0.00356;
    } else {
        λ.value = "";
        Br.value = "";
        Dm.value = "";
    }

    const tTotal = parseFloat(document.getElementById("resultTtotal").value);
    const tr = parseFloat(document.getElementById("resultTr").value);
    const metode = document.getElementById("linkType").value;
    const conclusionInput = document.getElementById("conclusion");

    if (metode === "Downlink") {
        if (tTotal < tr) {
            conclusionInput.value =
                "Dari hasil perhitungan total rise time budget downlink sebesar " +
                tTotal.toFixed(4) +
                " ns masih di bawah maksimum rise time dari bit rate sinyal downlink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem memenuhi rise time budget.";
        } else {
            conclusionInput.value =
                "Dari hasil perhitungan total rise time budget downlink sebesar " +
                tTotal.toFixed(4) +
                " ns melebihi nilai maksimum rise time dari bit rate sinyal downlink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem tidak memenuhi rise time budget.";
        }
    } else if (metode === "Uplink") {
        if (tTotal < tr) {
            conclusionInput.value =
                "Dari hasil perhitungan total rise time budget uplink sebesar " +
                tTotal.toFixed(4) +
                " ns masih di bawah maksimum rise time dari bit rate sinyal uplink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem memenuhi rise time budget.";
        } else {
            conclusionInput.value =
                "Dari hasil perhitungan total rise time budget uplink sebesar " +
                tTotal.toFixed(4) +
                " ns melebihi nilai maksimum rise time dari bit rate sinyal uplink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem tidak memenuhi rise time budget.";
        }
    }
}

function calculateTtotal() {
    var t_tx = parseFloat(document.getElementById("t_tx").value);
    var t_rx = parseFloat(document.getElementById("t_rx").value);
    var Δσ = parseFloat(document.getElementById("Δσ").value);
    var L = parseFloat(document.getElementById("L").value);
    var λ = parseFloat(document.getElementById("λ").value);
    var a = parseFloat(document.getElementById("a").value);
    var Dm = parseFloat(document.getElementById("Dm").value);

    var C = 3 * Math.pow(10, 8);
    var n1 = 1.48;
    var n2 = 1.46;

    var Δs = (n1 - n2) / n1;
    var V = ((2 * Math.PI) / λ) * a * n1 * Math.sqrt(2 * Δs);
    var UcSquared = Math.sqrt(2 * V);
    var dv = 1 + UcSquared ** 2 / V ** 2;
    var t_material = Δσ * L * Dm;
    var t_waveguide = (L / C) * (n1 * 2 + n2 * Δs * dv);
    var t_intramodal = t_material + t_waveguide;
    var t_total = Math.sqrt(t_tx ** 2 + t_intramodal ** 2 + t_rx ** 2);

    var resultElement = document.getElementById("resultTtotal");
    resultElement.innerHTML = "t_total:" + t_total.toFixed(4) + " " + "ns";
}

function calculateTr() {
    var Br = parseFloat(document.getElementById("Br").value);
    var Tr = 0.7 / Br;

    var resultElement = document.getElementById("resultTr");
    resultElement.innerHTML = "Tr:" + Tr.toFixed(4) + " " + "ns";

    var savePDFButton = document.getElementById("savePDFButton");
    savePDFButton.style.display = "block";
}

function saveAsPDF() {
    // Collect form data
    var linkType = document.getElementById("linkType").value;
    var t_tx = parseFloat(document.getElementById("t_tx").value);
    var t_rx = parseFloat(document.getElementById("t_rx").value);
    var Δσ = parseFloat(document.getElementById("Δσ").value);
    var L = parseFloat(document.getElementById("L").value);
    var λ = parseFloat(document.getElementById("λ").value);
    var a = parseFloat(document.getElementById("a").value);
    var Br = parseFloat(document.getElementById("Br").value);
    var Dm = parseFloat(document.getElementById("Dm").value);

    var C = 3 * Math.pow(10, 8);
    var n1 = 1.48;
    var n2 = 1.46;

    var Δs = (n1 - n2) / n1;
    var V = ((2 * Math.PI) / λ) * a * n1 * Math.sqrt(2 * Δs);
    var UcSquared = Math.sqrt(2 * V);
    var dv = 1 + UcSquared ** 2 / V ** 2;
    var t_material = Δσ * L * Dm;
    var t_waveguide = (L / C) * (n1 * 2 + n2 * Δs * dv);
    var t_intramodal = t_material + t_waveguide;
    var t_total = Math.sqrt(t_tx ** 2 + t_intramodal ** 2 + t_rx ** 2);

    var Tr = 0.7 / Br;

    var doc = new jspdf.jsPDF();

    doc.setFontSize(12);
    var margin = 10;

    // Add form data to the PDF document
    doc.setFont("Helvetica", "normal");
    doc.text("Hasil Kalkulasi Rise Time Budget", margin, margin);
    doc.text("Metode Perhitungan: " + linkType, margin, margin + 10);
    doc.text("Rise time transmitter OLT: " + t_tx + " ns", margin, margin + 20);
    doc.text("Rise time transmitter ONT: " + t_rx + " ns", margin, margin + 30);
    doc.text("Lebar Spektral: " + Δσ + " nm", margin, margin + 40);
    doc.text("Panjang Serat Optik: " + L + " Km", margin, margin + 50);
    doc.text("Panjang Gelombang: " + λ + " µm", margin, margin + 60);
    doc.text("Jari- jari inti: " + a + " µm", margin, margin + 70);
    doc.text("Bit rate: " + Br + " Gbps", margin, margin + 80);
    doc.text("Dispersi material: " + Dm + " ns/nm x km", margin, margin + 90);
    doc.text(
        "Tmaterial: " + t_material.toFixed(4) + " ns",
        margin,
        margin + 100
    );
    doc.text(
        "Twaveguide: " + t_waveguide.toFixed(4) + " ns",
        margin,
        margin + 110
    );
    doc.text(
        "Tintramodal: " + t_intramodal.toFixed(4) + " ns",
        margin,
        margin + 120
    );
    doc.text("Ttotal: " + t_total.toFixed(4) + " ns", margin, margin + 130);
    doc.text(
        "Maksimum rise time dari bit rate NRZ (Tr): " + Tr.toFixed(4) + " ns",
        margin,
        margin + 140
    );

    // Add conclusion message to the PDF document
    var tTotal = parseFloat(document.getElementById("resultTtotal").value);
    var tr = parseFloat(document.getElementById("resultTr").value);
    var metode = document.getElementById("linkType").value;
    var conclusionInput = document.getElementById("conclusion").value;

    var conclusionMessage;
    if (metode === "Downlink") {
        if (tTotal < tr) {
            conclusionMessage =
                "Dari hasil perhitungan total rise time budget downlink sebesar " +
                tTotal.toFixed(4) +
                " ns masih di bawah maksimum rise time dari bit rate sinyal downlink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem memenuhi rise time budget.";
        } else {
            conclusionMessage =
                "Dari hasil perhitungan total rise time budget downlink sebesar " +
                tTotal.toFixed(4) +
                " ns melebihi nilai maksimum rise time dari bit rate sinyal downlink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem tidak memenuhi rise time budget.";
        }
    } else if (metode === "Uplink") {
        if (tTotal < tr) {
            conclusionMessage =
                "Dari hasil perhitungan total rise time budget uplink sebesar " +
                tTotal.toFixed(4) +
                " ns masih di bawah maksimum rise time dari bit rate sinyal uplink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem memenuhi rise time budget.";
        } else {
            conclusionMessage =
                "Dari hasil perhitungan total rise time budget uplink sebesar " +
                tTotal.toFixed(4) +
                " ns melebihi nilai maksimum rise time dari bit rate sinyal uplink NRZ sebesar " +
                tr.toFixed(4) +
                " ns. Berarti dapat disimpulkan bahwa sistem tidak memenuhi rise time budget.";
        }
    }

    doc.text("Kesimpulan: " + conclusionMessage, margin, margin + 160);

    // Save the PDF document
    var timestamp = new Date().getTime();
    var fileName = "calculation_result_" + timestamp + ".pdf";
    doc.save(fileName);
}
