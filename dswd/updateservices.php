<?php

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    require_once 'connection/db_connect.php';


    // Fetch the user data for editing
    $sql = "SELECT * FROM services WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Fetch user data
        $row = $result->fetch_assoc();
        $services_name = $row['services_name'];
        $services_date = $row['services_date'];
        $services_client = $row['services_client'];

    } else {
        echo "User not found.";
        exit;
    }

    // Close the database connection
    $conn->close();
} else {
    echo "User ID not provided.";
    exit;

} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Update Person</title>
    <style>
        body,
        ul {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;

        }

        .btn-edit,
        .btn-delete {
            padding: 5px 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 5px;
        }

        .btn-delete {
            background-color: #ff3333;
        }

        /* Style the buttons on hover */
        .btn-edit:hover,
        .btn-delete:hover {
            background-color: #0056b3;
        }

        /* Style the buttons within table cells */
        td button {
            display: inline-block;
        }

        /* Center buttons within table cells */
        td {
            text-align: center;
            vertical-align: middle;
        }

        th,
        tr,
        td {
            border: 1px solid;
        }

        .navbar {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
        }

        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            text-decoration: none;
            color: #fff;
            font-size: 24px;
            font-weight: bold;
        }

        .nav-links {
            list-style: none;
            display: flex;
        }

        .nav-links li {
            margin-right: 20px;
        }

        .nav-links a {
            text-decoration: none;
            color: #fff;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #ff6f61;
        }


        .content {
            text-align: center;
            padding: 40px;
        }


        @media screen and (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: flex-start;
            }

            .nav-links {
                margin-top: 10px;
            }

            .nav-links li {
                margin-right: 0;
                margin-bottom: 10px;
            }

            .styled-table {
                width: 80%;
                border-collapse: collapse;
                margin: 20px auto;
            }

            .styled-table th,
            .styled-table td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
            }

            .styled-table th {
                background-color: #f2f2f2;
                font-weight: bold;
            }

            .styled-table tr:nth-child(even) {
                background-color: #f2f2f2;
            }

            .styled-table tr:hover {
                background-color: #ddd;
            }

        }



        .form-container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="container">
            <a href="dashboard.php" class="logo">logo</a>
            <ul class="nav-links">
                <li><a href="dashboard.php">person</a></li>
                <li><a href="services.php">services</a></li>
                <li><a href="addservices.php">add services</a></li>
                <li><a href="adduser.php">add user</a></li>
                <li><a href="monitor.php">monitor</a></li>
                <li><a href="logout.php">logout</a></li>

            </ul>
        </div>
    </nav>
    <div class="form-container">
        <form action="saveupdateservices.php" method="post">
            <div class="form-group">
                <label for="services_name">Services Name:</label>
                <input type="hidden" id="id" name="id" value="<?php echo $user_id; ?>" required>
                <input type="text" id="services_name" name="services_name" value="<?php echo $services_name; ?>"
                    required>
            </div>
            <div class="form-group">
                <label for="services_date">Services Date:</label>
                <input type="text" id="services_date" name="services_date" value="<?php echo $services_date; ?>">
            </div>
            <div class="form-group">
                <label for="services_client">Services Client:</label>
                <input type="text" id="services_client" name="services_client" value="<?php echo $services_client; ?>"
                    required>
            </div>
            <button type="submit">Submit</button>
        </form>

    </div>
</body>

</html>