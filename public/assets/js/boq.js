// import XLSX from "xlsx";

let boqData = []; // Array to store BOQ data



function removeDesignatorRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}

function getDesignatorDetails(selectElement) {
    const designatorCode = selectElement.value;
    const row = selectElement.parentNode.parentNode;
    const descriptionCell = row.cells[2];
    const unitCell = row.cells[3];
    const unitPriceMaterialCell = row.cells[4];
    const unitPriceServicesCell = row.cells[5];

    // Replace the code below with your own logic to fetch designator details

    // Mock data based on designator code
    let designatorDetails = {};
    if (designatorCode === "D1") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 12 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "8994",
            unitPriceServices: "3247",
        };
    } else if (designatorCode === "D2") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 24 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "11699",
            unitPriceServices: "3247",
        };
    } else if (designatorCode === "D3") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 48 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "17178",
            unitPriceServices: "3247",
        };
    } else if (designatorCode === "D4") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 96 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "31133",
            unitPriceServices: "3247",
        };
    } else if (designatorCode === "D5") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 144 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "44054",
            unitPriceServices: "3924",
        };
    } else if (designatorCode === "D6") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Duct Fiber Optik Single Mode 288 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "79717",
            unitPriceServices: "3918",
        };
    } else if (designatorCode === "D7") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 12 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "12733",
            unitPriceServices: "4476",
        };
    } else if (designatorCode === "D8") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 24 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "15628",
            unitPriceServices: "4443",
        };
    } else if (designatorCode === "D9") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 48 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "21830",
            unitPriceServices: "4443",
        };
    } else if (designatorCode === "D10") {
        designatorDetails = {
            description:
                "Pengadaan dan pemasangan Kabel Udara Fiber Optik Single Mode 96 core G 652 D",
            unit: "meter",
            unitPriceMaterial: "33200",
            unitPriceServices: "4443",
        };
    }

    descriptionCell.textContent = designatorDetails.description;
    unitCell.textContent = designatorDetails.unit;
    unitPriceMaterialCell.textContent = designatorDetails.unitPriceMaterial;
    unitPriceServicesCell.textContent = designatorDetails.unitPriceServices;
}

function saveBoq(event) {
    event.preventDefault(); // Prevent form submission

    const title = document.getElementById("title").value;
    const description = document.getElementById("description").value;
    const sto = document.getElementById("sto").value;
    const locations = document.getElementById("locations").value;
    const supervisors = document.getElementById("supervisors").value;
    const designatorsTable = document.getElementById("designatorsTable");
    const designatorRows = designatorsTable.rows;

    // Collect designators data
    const designators = [];
    for (let i = 1; i < designatorRows.length; i++) {
        const row = designatorRows[i];
        const designatorCode = row.cells[1].querySelector("select").value;
        const description = row.cells[2].textContent;
        const unit = row.cells[3].textContent;
        const unitPriceMaterial = row.cells[4].textContent;
        const unitPriceServices = row.cells[5].textContent;

        designators.push({
            designatorCode,
            description,
            unit,
            unitPriceMaterial,
            unitPriceServices,
        });
    }

    // Save BOQ data to the array
    boqData.push({
        title,
        description,
        sto,
        locations,
        supervisors,
        designators,
    });

    saveBoqAsExcelFile(title);

    displayBoqFiles(); // Refresh the BOQ Files table

    closeBoqForm(); // Close the BOQ form
}

function displayBoqFiles() {
    const boqList = document.getElementById("boqList");
    boqList.innerHTML = "";

    boqData.forEach((boq, index) => {
        const row = document.createElement("tr");

        const noCell = document.createElement("td");
        noCell.textContent = index + 1;
        row.appendChild(noCell);

        const titleCell = document.createElement("td");
        titleCell.textContent = boq.title;
        row.appendChild(titleCell);

        const dateCreatedCell = document.createElement("td");
        const dateCreated = new Date().toLocaleDateString("en-US");
        dateCreatedCell.textContent = dateCreated;
        row.appendChild(dateCreatedCell);

        const actionsCell = document.createElement("td");
        actionsCell.innerHTML = `
          <button type="button" class="btn btn-primary" onclick="downloadBoq(${index})">Download</button>
          <button type="button" class="btn btn-secondary" onclick="editBoq(${index})">Edit</button>
          <button type="button" class="btn btn-secondary" onclick="deleteBoq(${index})">Delete</button>
        `;
        row.appendChild(actionsCell);

        boqList.appendChild(row);
    });
}
function saveBoqAsExcelFile(title) {
    // Create a new workbook
    const workbook = XLSX.utils.book_new();

    // Create a new worksheet
    const worksheet = XLSX.utils.json_to_sheet(boqData);

    // Add the worksheet to the workbook
    XLSX.utils.book_append_sheet(workbook, worksheet, "BOQ Data");

    // Generate a binary string from the workbook
    const excelFileBinary = XLSX.write(workbook, {
        type: "binary",
        bookType: "xlsx",
    });

    // Convert the binary string to a Blob
    const excelFileBlob = new Blob([s2ab(excelFileBinary)], {
        type: "application/octet-stream",
    });

    // Create a download link
    const downloadLink = document.createElement("a");
    downloadLink.href = URL.createObjectURL(excelFileBlob);
    downloadLink.download = `${title}.xlsx`;

    // Trigger the download
    downloadLink.click();
}

function s2ab(s) {
    const buf = new ArrayBuffer(s.length);
    const view = new Uint8Array(buf);
    for (let i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
    return buf;
}

function downloadBoq(index) {
    const boq = boqData[index];
    console.log("Downloading BOQ:", boq);
}

function editBoq(index) {
    const boq = boqData[index];
    console.log("Editing BOQ:", boq);
    // Add logic to populate the BOQ form with the selected BOQ data
}

function deleteBoq(index) {
    boqData.splice(index, 1);
    displayBoqFiles(); // Refresh the BOQ Files table
}

// Event listeners
document.getElementById("boqForm").addEventListener("submit", saveBoq);
