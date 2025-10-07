<?php session_start(); ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>主頁</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    .btn.active {
      background-color: #0d6efd !important;
      border-color: #0d6efd !important;
      color: white !important;
    }
  </style>
</head>
<body style="background-color:antiquewhite">

<nav class="bg-dark p-3">
  <div class="container">
    <div class="row text-center">
      <div class="col-3">
        <a class="btn btn-secondary w-100 nav-btn" href="03.php" target="contentFrame">首頁</a>
      </div>
      <div class="col-3">
        <a class="btn btn-secondary w-100 nav-btn" href="05.php" target="contentFrame">迎新茶會</a>
      </div>
      <div class="col-3">
        <a class="btn btn-secondary w-100 nav-btn" href="02.php" target="contentFrame">資管一日營</a>
      </div>
      <div class="col-3">
        <?php if (isset($_SESSION["user"])): ?>
          <a class="btn btn-danger w-100 nav-btn" href="logout.php">登出 (<?= htmlspecialchars($_SESSION["user"]["name"]) ?>)</a>
        <?php else: ?>
<a class="btn btn-primary w-100 nav-btn" href="login.php">登入</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>

<iframe name="contentFrame" src="03.php" width="100%" height="800vh" style="margin-top: 20px; border: none;"></iframe>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.querySelectorAll('.nav-btn').forEach(link => {
  link.addEventListener('click', function() {
    document.querySelectorAll('.nav-btn').forEach(l => l.classList.remove('active'));
    this.classList.add('active');
  });
});
document.querySelector('.nav-btn').classList.add('active');
</script>

</body>
</html>
