<?php
session_start();

$users = [
    "root"  => ["password" => "password", "name" => "管理員", "role" => "teacher"],
    "user1" => ["password" => "pw1", "name" => "小明", "role" => "student"],
    "user2" => ["password" => "pw2", "name" => "小華", "role" => "student"],
    "user3" => ["password" => "pw3", "name" => "小美", "role" => "student"],
    "user4" => ["password" => "pw4", "name" => "小強", "role" => "student"],
];

// 登入後要跳轉的頁面
$redirectUrl = $_SESSION['redirect'] ?? '03.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        $_SESSION['user'] = [
            'name' => $users[$username]['name'],
            'role' => $users[$username]['role']
        ];
        unset($_SESSION['redirect']);

        // 如果在 iframe 中，刷新父頁面 iframe
        echo "<script>
            if (window.top !== window.self) {
                window.top.frames['contentFrame'].location.href = '$redirectUrl';
                // 更新導覽列右上角按鈕
                const btn = window.top.document.querySelector('nav .col-3:last-child a');
                btn.className = 'btn btn-danger w-100 nav-btn';
                btn.textContent = '登出 ({$_SESSION['user']['name']})';
                btn.href = 'logout.php';
            } else {
                window.location.href = '$redirectUrl';
            }
        </script>";
        exit;
    } else {
        $error = "帳號或密碼錯誤";
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>登入頁面</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: antiquewhite;">
<div class="container mt-5">
  <div class="card shadow-lg">
    <div class="card-header bg-dark text-white">
      <h3>登入</h3>
    </div>
    <div class="card-body">
      <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
      <form method="POST">
        <div class="mb-3">
          <label class="form-label">帳號</label>
          <input type="text" class="form-control" name="username" required>
        </div>
        <div class="mb-3">
          <label class="form-label">密碼</label>
          <input type="password" class="form-control" name="password" required>
        </div>
        <button type="submit" class="btn btn-dark w-100">登入</button>
      </form>
    </div>
  </div>
</div>
</body>
</html>
