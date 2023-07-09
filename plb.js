// plb.js

document.addEventListener("DOMContentLoaded", function () {
    var infoIcon = document.getElementById("info-icon");

    infoIcon.addEventListener("click", function () {
        // Create the pop-up element
        var popup = document.createElement("div");
        popup.className = "popup";
        popup.innerHTML =
            "Power Link Budget adalah perhitungan daya yang dilakukan pada suatu sistem transmisi yang didasarkan pada karakteristik saluran, sumber optik, dan sensitivitas detektor. Daya yang diterima bergantung pada jumlah cahaya yang masuk ke dalam serat optik serta nilai redaman yang terjadi selama cahaya berada di serat, konektor dan splices. Perhitungan PLB ini sangat penting dalam suatu perancangan jaringan karena dengan PLB kita dapat mengetahui seberapa besar daya yang akan dipancarkan oleh pemancar agar dapat diterima dengan baik di sisi penerima.";

        // Append the pop-up element to the body
        document.body.appendChild(popup);

        // Close the pop-up when clicking outside of it
        window.addEventListener("click", function (event) {
            if (event.target !== infoIcon && event.target !== popup) {
                popup.remove();
            }
        });
    });
});

function updateInputs() {
    var alphaValue = document.getElementById("alpha").value;
    var spOptions = document.getElementsByName("Sp");
    var spValue;

    for (var i = 0; i < spOptions.length; i++) {
        if (spOptions[i].checked) {
            spValue = spOptions[i].value;
            break;
        }
    }

    var alphaInput = document.getElementById("alphaInput");
    var spInput = document.getElementById("spInput");

    alphaInput.value = alphaValue;
    spInput.value = spValue;
}

function calculateAlphaTotal() {
    // Retrieve input values
    var L = parseFloat(document.getElementById("L").value);
    var alpha = parseFloat(document.getElementById("alphaInput").value);
    var Nc = parseFloat(document.getElementById("Nc").value);
    var alpha_c = parseFloat(document.getElementById("alpha_c").value);
    var Ns = parseFloat(document.getElementById("Ns").value);
    var alpha_s = parseFloat(document.getElementById("alpha_s").value);
    var Sp = document.querySelector('input[name="Sp"]:checked').value;
    var alpha_i = parseFloat(document.getElementById("alpha_i").value);

    if (
        isNaN(L) ||
        isNaN(alpha) ||
        isNaN(Nc) ||
        isNaN(alpha_c) ||
        isNaN(alpha_s) ||
        isNaN(Sp) ||
        isNaN(Ns) ||
        isNaN(alpha_i)
    ) {
        alert("Please enter valid numeric values for all inputs!");
        return;
    }

    // Calculation
    var alphaTotal =
        L * alpha + Nc * alpha_c + Ns * alpha_s + parseFloat(Sp) + alpha_i;

    // Update alphaTotal input field
    document.getElementById("alphaTotal").value = alphaTotal;

    // Output
    document.getElementById("result-alphaTotal").innerHTML =
        alphaTotal + " " + " dB";
}

function calculatePr() {
    // Retrieve input values
    var Pt = parseFloat(document.getElementById("Pt").value);
    var alphaTotal = parseFloat(document.getElementById("alphaTotal").value);
    var Sm = parseFloat(document.getElementById("Sm").value);

    if (isNaN(Pt) || isNaN(alphaTotal) || isNaN(Sm)) {
        alert("Please enter valid numeric values for all inputs!");
        return;
    }
    // Calculation
    var Pr = Pt - alphaTotal - Sm;
    var Pr_approx = Pr.toFixed(0) - 1;

    // Output
    document.getElementById("resultPr").innerHTML = Pr + " " + " dBm";
    document.getElementById("approx-resultPr").innerHTML =
        Pr_approx + " " + "dBm";

    //update input fields
    document.getElementById("PtM").value = Pt;
    document.getElementById("SmM").value = Sm;
    document.getElementById("PrM").value = Pr_approx;
    document.getElementById("alphaTotalM").value = alphaTotal;
}

function calculateM() {
    // Retrieve input values
    var Pt = parseFloat(document.getElementById("PtM").value);
    var Pr = parseFloat(document.getElementById("PrM").value);
    var alphaTotal = parseFloat(document.getElementById("alphaTotalM").value);
    var Sm = parseFloat(document.getElementById("SmM").value);

    if (isNaN(Pt) || isNaN(Pr) || isNaN(alphaTotal) || isNaN(Sm)) {
        alert("Please enter valid numeric values for all inputs!");
        return;
    }
    // Calculation
    var M = Pt - Pr - alphaTotal - Sm;

    // Output
    document.getElementById("resultM").innerHTML = M.toFixed(5) + " " + "dBm";
}

document.addEventListener("DOMContentLoaded", function () {
    // Generate chart options
    var options = {
        chart: {
            type: "line",
            height: 300,
        },
        series: [],
        xaxis: {
            categories: [],
        },
    };

    // Create the chart
    var chart = new ApexCharts(
        document.querySelector("#chartContainer"),
        options
    );

    // Function to update the chart with data
    function updateChart(prValues, lValues) {
        chart.updateSeries([{ data: prValues }]);
        chart.updateOptions({ xaxis: { categories: lValues } });
    }

    // Example data
    var prValues = [];
    var lValues = [];

    // Function to simulate the chart
    function simulateChart() {
        // Retrieve L value from input field
        var lValue = parseFloat(document.getElementById("lValue").value);

        // Perform calculation for Pr based on lValue
        var prValue = calculatePr(lValue);

        // Update the chart data
        prValues.push(prValue);
        lValues.push(lValue);

        // Update the chart
        updateChart(prValues, lValues);
    }

    // Function to calculate Pr
    function calculatePr(lValue) {
        // Perform your calculation here based on lValue
        // Replace the code below with your actual calculation logic
        var prValue = Math.sin(lValue);

        return prValue;
    }

    // Initial chart setup
    chart.render();
});
