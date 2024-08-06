<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
</head>
<body>
    <h1>Place Your Order</h1>
    <form action="/orderController.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="phone">Phone:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br><br>

        <input type="hidden" name="totalAmount" value="1350000"> <!-- Thay giá trị này bằng giá trị thực tế -->

        <h2>Products</h2>
        <!-- Đây là ví dụ cho sản phẩm, cần phải có thông tin sản phẩm thực tế -->
        <input type="hidden" name="products[0][id_sp]" value="19">
        <input type="hidden" name="products[0][ten_sp]" value="Áo khoác lông cừu nam">
        <input type="hidden" name="products[0][gia]" value="1350000">
        <input type="hidden" name="products[0][sl]" value="1">
        <input type="hidden" name="products[0][tongtien]" value="1350000">

        <button type="submit">Submit Order</button>
    </form>
</body>
</html>
