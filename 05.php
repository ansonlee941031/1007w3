<?php

include("auth.php");
$total = 0;
$selected = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dinner = $_POST['dinner'] ?? 'no';
    $total = ($dinner === 'yes') ? 100 : 0; // 晚餐假設 100 元
}
$user = $_SESSION['user'];
?>
<div class="container mt-5">
    <h3>迎新茶會報名</h3>
    <p>姓名：<?= htmlspecialchars($user['name']) ?></p>
    <p>身分：<?= htmlspecialchars($user['role']) ?></p>
    <form method="POST">
        <div class="form-check">
            <input type="radio" name="dinner" value="yes" class="form-check-input" id="dinner_yes">
            <label class="form-check-label" for="dinner_yes">需要晚餐</label>
        </div>
        <div class="form-check">
            <input type="radio" name="dinner" value="no" class="form-check-input" id="dinner_no" checked>
            <label class="form-check-label" for="dinner_no">不需要晚餐</label>
        </div>
        <button type="submit" class="btn btn-dark mt-3">送出</button>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD']==='POST'): ?>
        <p class="mt-3"><strong>總費用：$<?= $total ?></strong></p>
    <?php endif; ?>
</div>
