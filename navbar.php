<?php
?>
<nav class="bg-dark p-3">
  <div class="container">
    <div class="row text-center">
      <div class="col-3"><a class="btn btn-secondary w-100" href="03.php" target="contentFrame">首頁</a></div>
      <div class="col-3"><a class="btn btn-secondary w-100" href="05.php" target="contentFrame">迎新茶會</a></div>
      <div class="col-3"><a class="btn btn-secondary w-100" href="02.php" target="contentFrame">資管一日營</a></div>
      <div class="col-3">
        <?php if (isset($_SESSION['user'])): ?>
          <a class="btn btn-danger w-100" href="logout.php">登出 (<?= $_SESSION['user']['name'] ?>)</a>
        <?php else: ?>
          <a class="btn btn-primary w-100" href="login.php" target="contentFrame">登入</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
