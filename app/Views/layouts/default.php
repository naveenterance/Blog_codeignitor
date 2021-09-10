<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= $this->renderSection("title") ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" type="(text/css)" href="<?= site_url('/css/auto-complete.css') ?>">
    <link rel="stylesheet" href="<?= site_url('css/components.css')?>">
      <link rel="stylesheet" href="<?= site_url('css/responsee.css')?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
      <!-- CUSTOM STYLE -->       
      <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,700&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="<?= site_url('css/template-style.css')?>">
      <script type="text/javascript" src="<?= site_url('js/jquery-1.8.3.min.js')?>"></script>
      <script type="text/javascript" src="<?= site_url('js/jquery-ui.min.js')?>"></script>    
      <script type="text/javascript" src="<?= site_url('js/modernizr.js')?>"></script>
      <script type="text/javascript" src="<?= site_url('js/responsee.js')?>"></script>        

    
</head>

<body class="size-1140">

    <?php if (session()->has('warning')): ?>
        <div class="warning">
            <?= session('warning') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->has('info')): ?>
        <div class="info">
            <?= session('info') ?>
        </div>
    <?php endif; ?>

    <?= $this->renderSection("content") ?>
    
</body>
</html>