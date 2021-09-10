<?= $this->extend("layouts/default") ?>

<?= $this->section("title") ?>Home<?= $this->endSection() ?>

<?= $this->section("content") ?>

    <h1>Welcome</h1>

    <!--<a href="<?= site_url("/signup") ?>">Sign up</a>-->
    
    <?php if (current_user()): ?>
        
        <p>Hello <?= esc(current_user()->name) ?></p>
        
        <!--<a href="<?= site_url("/profile/show") ?>">Profile</a>-->
   
            
            <a href="<?= site_url("/admin/users") ?>"><h2>Users</h2></a>
            
    
        
        <a href="<?= site_url("/tasks") ?>"><h2>Articles</h2></a>
        
        <a href="<?= site_url("/logout") ?>"><h2>Log out</h2></a>
        
    <?php else: ?>
        
        <a href="<?= site_url("/signup") ?>"><h2>Sign up</h2></a>    
        <a href="<?= site_url("/tasks") ?>"><h2>Skip</h2></a>
        <a href="<?= site_url("/login") ?>"><h2>Log in</h2></a>
        
    <?php endif; ?>

   

    <?= $this->renderSection("content") ?>
    

<?= $this->endSection() ?>