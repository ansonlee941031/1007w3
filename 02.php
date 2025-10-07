<?php
include('auth.php'); // 必須放在最前面

$user = $_SESSION['user']; // session 取得登入者
$total = 0;
$selected = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $options = $_POST['option'] ?? [];

    if ($user['role'] !== 'teacher') { // 老師免費
        foreach ($options as $price) {
            $total += (int)$price;
            $selected[] = $price;
        }
    } else {
        $total = 0; // 老師免費
        $selected = $options;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>一日資管營</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: antiquewhite;">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">一日資管營報名表</h3>
        </div>
        <div class="card-body">

            <p>姓名：<?= htmlspecialchars($user['name']) ?></p>
            <p>身分：<?= htmlspecialchars($user['role']) ?></p>

            <form method="post" action="">
                <label class="form-label">報名場次：</label><br/>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="option1" name="option[]" value="150">
                    <label class="form-check-label" for="option1">上午場($150)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="option2" name="option[]" value="100">
                    <label class="form-check-label" for="option2">下午場($100)</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="option3" name="option[]" value="60">
                    <label class="form-check-label" for="option3">午餐($60)</label>
                </div>

                <div class="text-center mt-3">
                    <button type="submit" class="btn btn-dark w-50">送出</button>
                </div>
            </form>

            <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                <hr>
                <p><strong>報名成功，總費用：$<?= $total ?>元</strong></p>
            <?php endif; ?>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
