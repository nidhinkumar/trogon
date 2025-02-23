<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

    <h2>Users List</h2>
    <div id="users-container">
        <p>Loading users...</p>
    </div>

    <script>
        $(document).ready(function() {
            $.ajax({
                url: "http://localhost/trogon_media/index.php/api/get_users",
                type: "GET",
                dataType: "json",
                success: function(response) {
                    if (response.status === "success") {
                        let itemsHtml = "<ul>";
                        $.each(response.data, function(index, item) {
                            itemsHtml += "<li>" + item.id + " - " + item.name + "</li>";
                        });
                        itemsHtml += "</ul>";
                        $("#users-container").empty().html(itemsHtml);
                    } else {
                        $("#users-container").html("<p>Error: " + response.message + "</p>");
                    }
                },
                error: function() {
                    $("#users-container").html("<p>Failed to load data. Please try again.</p>");
                }
            });
        });
    </script>

</body>
</html>
