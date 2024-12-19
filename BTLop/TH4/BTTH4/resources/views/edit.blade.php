<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Chỉnh sửa thông tin máy tính</title>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Chỉnh sửa thông tin máy tính</h1>
        <form action="{{ route('computers.update', $computer->id) }}" method="POST">
            @csrf <!-- Token bảo mật -->
            @method('PUT') <!-- Sử dụng phương thức PUT -->
            
            <div class="mb-3">
                <label for="computer_name" class="form-label">Tên máy tính</label>
                <input type="text" class="form-control" id="computer_name" name="computer_name" value="{{ $computer->computer_name }}" required>
            </div>

            <div class="mb-3">
                <label for="model" class="form-label">Model</label>
                <input type="text" class="form-control" id="model" name="model" value="{{ $computer->model }}" required>
            </div>

            <div class="mb-3">
                <label for="operating_system" class="form-label">Hệ điều hành</label>
                <input type="text" class="form-control" id="operating_system" name="operating_system" value="{{ $computer->operating_system }}" required>
            </div>

            <div class="mb-3">
                <label for="processor" class="form-label">Bộ xử lý</label>
                <input type="text" class="form-control" id="processor" name="processor" value="{{ $computer->processor }}" required>
            </div>

            <div class="mb-3">
                <label for="memory" class="form-label">RAM (GB)</label>
                <input type="number" class="form-control" id="memory" name="memory" value="{{ $computer->memory }}" required>
            </div>

            <div class="mb-3">
                <label for="available" class="form-label">Trạng thái</label>
                <select class="form-control" id="available" name="available">
                    <option value="1" {{ $computer->available == 1 ? 'selected' : '' }}>Hoạt động</option>
                    <option value="0" {{ $computer->available == 0 ? 'selected' : '' }}>Không hoạt động</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Cập nhật</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AAgKAkT07fK6zEpbkXtM0DX6m2eWsFZC1E6jP1gxFlVlG6I4gKvkt94RdIwOf" crossorigin="anonymous"></script>
</body>
</html>
