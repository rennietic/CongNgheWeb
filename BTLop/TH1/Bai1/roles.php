<?php
// Giả sử có một biến kiểm tra người dùng là admin hay không
// Bạn có thể thay đổi cách kiểm tra này, ví dụ như thông qua session hoặc database

// Nếu người dùng là quản trị viên
$isAdmin = true; // Thay đổi thành false nếu người dùng là khách

// Hoặc, bạn có thể làm một hệ thống phức tạp hơn như:
// if ($_SESSION['role'] == 'admin') {
//     $isAdmin = true;
// } else {
//     $isAdmin = false;
// }
?>
