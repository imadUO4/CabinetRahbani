<?php 
  if(isset($_GET['t']))
    $table = $_GET['t'];
  elseif(!isset($table))
    $table = 'doctors';
  include './database/conn.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CabinetRahbani-dashboard</title>
    <link rel="stylesheet" href="./src/styles/dasboard/base.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  </head>
  <body>
    <?php
      // header
      include './src/components/header.php';

      // sidebar
      include './src/components/dashboard/sidebar.php';
    
      // main
      if (isset($_GET['delete'])) {
          remove_from_table($conn, $table, $_GET['id']);
      } elseif (!empty($_POST['id'])) {
          update_in_table($conn, $table, $_POST);
      } elseif (!empty($_POST["$headers[0]"])) {
          add_to_table($conn, $table, $_POST);
      }

      if (isset($_GET['add']) || isset($_GET['update'])) {
          include './src/components/dashboard/form.php';
      } else {
          include './src/components/dashboard/main.php';
      }

      // footer
      include './src/components/footer.php'; ?>
  </body>
</html>
