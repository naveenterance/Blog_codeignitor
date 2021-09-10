<?= $this->extend('layouts/default') ?>

<?= $this->section('title') ?>Login<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Login</h1>

<?= form_open("/login/create") ?>

    <div class="form-group" style="width: 60%; margin: auto;">
        <label for="email">email</label>
        <input class="form-control"  type="text" name="email" id="email" value="<?= old('email') ?>">
    </div>
    
    <div style="width: 60%; margin: auto;">
        <label for="password">Password</label>
        <input class="form-control" type="password" name="password">
    </div>
    
    <button style="margin-left: 20%; margin-top:1%" class="btn btn-primary">Log in</button>

</form>

<?= $this->endSection() ?>