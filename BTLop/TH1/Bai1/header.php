<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .navbar {
  background-color: #f8f9fa; /* Light gray background */
  padding: 10px 20px;
  display: flex;
  border-bottom: 1px solid #ddd;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Soft shadow */
  }

/* Navbar Logo Styling */
.logo h1 {
  font-size: 24px;
  font-weight: bold;
  margin: 0;
  color: #333; /* Dark text color */
}

/* Navbar Links Container */
.nav-links {
  display: flex;
  gap: 20px; 
  margin-left: 50px;
}


.nav-item {
  text-decoration: none; 
  color: #333;
  font-size: 16px;
  font-weight: normal;
  padding: 5px 10px;
  transition: color 0.3s ease, background-color 0.3s ease;
}

/* Hover Effect */
.nav-item:hover {
  color: #007bff;
  background-color: #e9ecef; 
  border-radius: 5px; 
}
.container {
  width: 80%;
  margin: 20px auto;
}
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo">
        <h1>FLOWERS</h1>
    </div>
    <div class="nav-links">
        <a href="#home" class="nav-item">Trang chủ</a>
        <a href="#external" class="nav-item">Trang ngoài</a>
        <a href="#categories" class="nav-item">Các loại hoa</a>
    </div>
</div>


</body>
</html>