// Function to handle project creation via AJAX
function createProject() {
    // Get the form data
    var formData = new FormData(document.getElementById("projectForm"));

    // Send the AJAX request
    $.ajax({
        url: "/admin/project",
        type: "POST",
        data: formData,
        dataType: "json",
        processData: false,
        contentType: false,
        success: function (response) {
            // Handle the successful response
            console.log("Project created:", response);
            // Update the UI or perform any other necessary actions
        },
        error: function (xhr, status, error) {
            // Handle the error response
            console.log("Error:", error);
            // Display an error message or handle the error case
        },
    });
}
