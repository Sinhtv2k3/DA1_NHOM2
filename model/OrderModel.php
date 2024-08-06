<?php
class OrderModel {
    private $pdo; // PDO instance for database connection

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Thêm đơn hàng mới vào cơ sở dữ liệu
    public function createOrder($customerName, $customerEmail, $items) {
        $sql = "INSERT INTO orders (customer_name, customer_email, order_date) VALUES (:customerName, :customerEmail, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['customerName' => $customerName, 'customerEmail' => $customerEmail]);
        $orderId = $this->pdo->lastInsertId();

        foreach ($items as $item) {
            $this->addOrderItem($orderId, $item['productId'], $item['quantity'], $item['price']);
        }
        return $orderId;
    }

    // Thêm mặt hàng vào đơn hàng
    private function addOrderItem($orderId, $productId, $quantity, $price) {
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (:orderId, :productId, :quantity, :price)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['orderId' => $orderId, 'productId' => $productId, 'quantity' => $quantity, 'price' => $price]);
    }

    // Lấy danh sách đơn hàng
    public function getOrders() {
        $sql = "SELECT * FROM orders";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Lấy thông tin đơn hàng cụ thể
    public function getOrderById($orderId) {
        $sql = "SELECT * FROM orders WHERE id = :orderId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['orderId' => $orderId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Cập nhật trạng thái đơn hàng
    public function updateOrderStatus($orderId, $status) {
        $sql = "UPDATE orders SET status = :status WHERE id = :orderId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['status' => $status, 'orderId' => $orderId]);
    }

    // Xóa đơn hàng
    public function deleteOrder($orderId) {
        $sql = "DELETE FROM orders WHERE id = :orderId";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['orderId' => $orderId]);
    }
}
?>
