<?=$this->extend('layouts/default')?>

<?=$this->section('title')?>New user<?=$this->endSection()?>

<?=$this->section('content')?>

<h1>New user</h1>

<?php if (session()->has('errors')): ?>
<ul>
    <?php foreach (session('errors') as $error): ?>
    <li><?=$error?></li>
    <?php endforeach;?>
</ul>
<?php endif?>

<?=form_open("/admin/users/create")?>

<?=$this->include('Admin/Users/form')?>

<button style="margin-left: 20%; margin-top:1%" class="btn btn-primary">Save</button>
<a href="<?=site_url("/admin/users")?>">Cancel</a>

</form>

<?=$this->endSection()?>