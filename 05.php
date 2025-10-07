<?php
include('auth.php');

$user = $_SESSION['user'];
$total = 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dinner = $_POST['dinner'] ?? 'no';

    if ($user['role'] !== 'teacher') { // 老師免費
        $total = ($dinner === 'yes') ? 60 : 0;
    } else {
        $total = 0;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>迎新茶會</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: antiquewhite;">
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">迎新茶會報名表</h3>
        </div>
        <div class="card-body">

            <p>姓名：<?= htmlspecialchars($user['name']) ?></p>
            <p>身分：<?= htmlspecialchars($user['role']) ?></p>

            <form method="post" action="">
                <label class="form-label">是否需要晚餐：</label><br/>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dinner" value="yes" id="dinner_yes">
                    <label class="form-check-label" for="dinner_yes">需要晚餐($60)</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="dinner" value="no" id="dinner_no" checked>
                    <label class="form-check-label" for="dinner_no">不需要晚餐</label>
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
