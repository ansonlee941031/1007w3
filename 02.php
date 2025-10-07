<?php
include("auth.php");
$total = 0;
$selected = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $options = $_POST['option'] ?? [];
    foreach ($options as $price) {
        $total += (int)$price;
        $selected[] = $price;
    }
}
$user = $_SESSION['user'];
?>
<div class="container mt-5">
    <h3>資管一日營報名</h3>
    <p>姓名：<?= htmlspecialchars($user['name']) ?></p>
    <p>身分：<?= htmlspecialchars($user['role']) ?></p>
    <form method="POST">
        <div class="form-check">
            <input type="checkbox" name="option[]" value="150" class="form-check-input" id="am">
            <label class="form-check-label" for="am">上午場($150)</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="option[]" value="100" class="form-check-input" id="pm">
            <label class="form-check-label" for="pm">下午場($100)</label>
        </div>
        <div class="form-check">
            <input type="checkbox" name="option[]" value="60" class="form-check-input" id="lunch">
            <label class="form-check-label" for="lunch">午餐($60)</label>
        </div>
        <button type="submit" class="btn btn-dark mt-3">送出</button>
    </form>
    <?php if ($_SERVER['REQUEST_METHOD']==='POST'): ?>
        <p class="mt-3"><strong>總費用：$<?= $total ?></strong></p>
    <?php endif; ?>
</div>
