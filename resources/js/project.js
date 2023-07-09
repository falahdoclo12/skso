// resources/js/project.js

$(document).ready(function () {
    // Show Create Project Form
    $("#createButton").click(function () {
        $("#createFormContainer").show();
        $("#editFormContainer").hide();
    });

    // Show Edit Project Form
    $(".edit-button").click(function () {
        var projectId = $(this).data("project-id");
        var editUrl = "{{ route('admin.projects.edit', ':id') }}".replace(
            ":id",
            projectId
        );

        $.ajax({
            url: editUrl,
            method: "GET",
            success: function (response) {
                $("#editTitle").val(response.title);
                $("#editDescription").val(response.description);
                $("#editProjectForm").attr(
                    "action",
                    "{{ route('admin.projects.update', ':id') }}".replace(
                        ":id",
                        projectId
                    )
                );

                $("#createFormContainer").hide();
                $("#editFormContainer").show();
            },
            error: function (xhr) {
                console.log(xhr.responseText);
            },
        });
    });
});
