<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <h2>Question 2</h2>
    <p>
    <p><img src="<?php echo base_url('images/question2.png'); ?>"></p>
    </p>

    <h3>Explanation</h3>
    <strong>1.Fixes the Logical Error</strong>
    <p>The correct discounted amount is now calculated as:</p>
    <p>$discounted_amount = $total_amount - ($total_amount * $discount_rate);</p>
    <strong>2.Improved Error Handling</strong>
    <p>Ensures total_amount is numeric and positive</p>
    if (!is_numeric($total_amount) || $total_amount < 0) { die("Error: Total amount must be a positive number."); } <p>
        his prevents negative amounts or non-numeric values, improving security and reliability.</p>
        <strong>3.Validates customer_type input</strong>
        <p>if (!in_array($customer_type, ["VIP", "Regular"])) { die("Error: Invalid customer type.");</p>



        <h2>Question 5</h2>
        <p>
        <p><img src="<?php echo base_url('images/question5.png'); ?>"></p>
        </p>

        <h3> Logic Behind Each Condition in the CASE Statement</h3>
        <strong>Pending Review:</strong>

        <p>Orders with status 'Pending' and placed within the last 7 days.</p>
        <p>DATEDIFF(NOW(), order_date) <= 7 calculates the days between the order date and today. </p>
                <strong> Urgent Review:</strong>
                <p>Orders
                    with status 'Pending' and placed more than 7 days ago.
                <p> DATEDIFF(NOW(), order_date)> 7 ensures these orders
                    are flagged for urgent review.</p>

                <strong> Delayed:</strong>

                <p>Orders with status 'Processing' that were placed more than 10 days ago.</p>
                <p>DATEDIFF(NOW(), order_date) > 10 flags delayed orders.</p>
                <strong> Processing:</strong>

                <p>All orders with status 'Processing' (not delayed).</p>
                <strong> Shipped:</strong>

                <p> All orders with status 'Shipped'.</p>
                <strong> Cancelled:</strong>

                <p> Orders with status 'Cancelled', regardless of order date.</p>


                <strong>The CASE statement checks status multiple times.
                    If status is not indexed, MySQL must scan all rows to evaluate the condition.
                    A full table scan on a large dataset is slow.</strong>

                      <h2>Question 6</h2>
        <p>
        <p><img src="<?php echo base_url('images/example6.png'); ?>"></p>
        </p>
</body>

</html>