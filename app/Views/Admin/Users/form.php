<div class="form-group" style="width: 60%; margin: auto;">
    <label for="name">Name</label>
    <input class="form-control" type="text" name="name" id="name" value="<?=old('name', esc($user->name))?>">
</div>

<div class="form-group" style="width: 60%; margin: auto;">
    <label for="email">email</label>
    <input class="form-control" type="text" name="email" id="email" value="<?=old('email', esc($user->email))?>">
</div>

<div class="form-group" style="width: 60%; margin: auto;">
    <label for="password">Password</label>
    <input class="form-control" type="password" name="password">
    <?php if ($user->id): ?>
    <p>Leave blank to keep existing password</p>
    <?php endif;?>
</div>

<div class="form-group" style="width: 60%; margin: auto;">
    <label for="password_confirmation">Repeat password</label>
    <input class="form-control" type="password" name="password_confirmation">
</div>