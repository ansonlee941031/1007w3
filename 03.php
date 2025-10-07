<!DOCTYPE html>
<?php

session_start();
?>

<html>
<head>
  <meta charset="UTF-8">
  <title>首頁</title>
  <link rel="stylesheet" href="06.css" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    table {
      margin: auto;              
      border-collapse: collapse; 
      width: 80%;                
    }
    td {
      padding: 10px;
      text-align: center;        
      vertical-align: middle;    
    }
    td.title {
      background-color: darkblue;
      color: white;
      font-weight: bold;
    }
    body {
      background-color: transparent !important;
    }
  </style>
</head>
<body>
  <div class="container mt-4">
    <div class="row g-4"> <!-- g-4 = 每個 col 間距 -->
      
      <!-- 卡片 1 -->
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body text-center">
            <h2 class="card-title">迎新茶會</h2>
            <p>報名請按下面按鈕前往</p>
            <a class="btn btn-primary w-100" href="05.php" target="contentFrame">我要報名</a>
          </div>
        </div>
      </div>

      <!-- 卡片 2 -->
      <div class="col-md-6">
        <div class="card shadow">
          <div class="card-body text-center">
            <h2 class="card-title">資管一日營</h2>
            <p>報名請按下面按鈕前往</p>
            <a class="btn btn-primary w-100" href="02.php" target="contentFrame">我要報名</a>
          </div>
        </div>
      </div>