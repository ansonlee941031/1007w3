<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
  <meta charset="UTF-8">
  <title>首頁</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: antiquewhite;">
  
  <nav class="bg-dark p-3">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <a class="btn btn-secondary w-100" href="03.php" target="contentFrame">首頁</a>
        </div>
        <div class="col">
          <a class="btn btn-secondary w-100" href="05.php" target="contentFrame">迎新茶會</a>
        </div>
        <div class="col">
          <a class="btn btn-secondary w-100" href="02.php" target="contentFrame">資管一日營</a>
        </div>
        <div class="col">
          <?php if (isset($_SESSION["user"])): ?>
            <a class="btn btn-danger w-100" href="logout.php" target="_top">登出</a>
          <?php else: ?>
            <a class="btn btn-primary w-100" href="login.php" target="contentFrame">登入</a>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <iframe name="contentFrame" src="03.php" width="100%" height="800vh" style="border:none;"></iframe>
</body>
</html>
