<?=$this->extend('layouts/default')?>

<?=$this->section('title')?>Task<?=$this->endSection()?>

<?=$this->section('content')?>




<header class="margin-bottom">

    <div class="line">
        <nav>
            <div class="top-nav">
                <p class="nav-text"></p>
                <a class="logo" href="index.html">
                    Kewl<span>Blog</span>
                </a>
                <h1></h1>
                <ul class="top-ul right">

                    <li>

                        <a href="<?=site_url("/tasks")?>">&laquo; back to index</a>
                    </li>


                    <?php if ((current_user()) && ((current_user()->id == $task->user_id) || (current_user()->position == 'admin'))): ?>


                    <li>
                        <a>Logged in as " <?=esc(current_user()->name)?>"</a>

                    </li>
                    <li>

                        <a href="<?=site_url("/tasks/new")?>">New Article</a>
                    </li>
                    <li>

                        <a href="<?=site_url("/logout")?>">Log out</a>
                    </li>
                    <li> <a href="<?=site_url('/tasks/edit/' . $task->id)?>">Edit</a></li>
                    <li> <a href="<?=site_url('/tasks/delete/' . $task->id)?>">Delete</a></li>
                    <li> <a href="<?=site_url('/tasks/edit_image/' . $task->id)?>">Edit Picture</a></li>



                    <?php else: ?>


                    <li> <a href="<?=site_url("/login")?>">Log in as writer or admin to edit</a></li>
                    <li> <a href="<?=site_url("/signup")?>">Sign up</a> </li>

                    <?php endif;?>





                </ul>
            </div>
        </nav>
    </div>
</header>








<section id="article-section" class="line">
    <div class="margin">
        <!-- ARTICLES -->
        <div class="s-12 l-9">
            <!-- ARTICLE 1 -->
            <article class="margin-bottom">
                <div class="post-1 line">
                    <!-- image -->
                    <div class="s-12 l-11 post-image">
                        <?php $p = base_url('uploads/' . $task->id . '.jpg');?>



                        <img src="<?=$p?>" height=100 width=100 alt="profile image">

                    </div>
                    <!-- date -->
                    <div class="s-12 l-1 post-date">
                        <?php 
                    $time=strtotime($task->updated_at);
                    $month=date("M",$time);
                    $day=date("d",$time);

                    ?>

                    <p class="date"><?= $day?></p>
                    <p class="month"><?=$month?></p>
                    </div>
                </div>
                <!-- text -->
                <div class="post-text">
                    <h1><?=esc($task->title)?></h1>
                    <p>
                        <?=esc($task->content)?>
                    </p>
                    <br>


                    <p class="author"> <?php 
                   $nam=$task->user_id;

                   $db = db_connect();
                   


                    $query = $db->query("SELECT *
                    FROM user
                    INNER JOIN task ON ".$nam."= user.id;");
                    


                
                    foreach ($query->getResult() as $row){
                        $author =$row->name;

                    }
                    echo $author;
                    ?></p>
                </div>
            </article>
        </div>


        <div class="s-12 l-3">
            <aside>
                <div class="advertising margin-bottom">
                    <?php $p = base_url('uploads/banner.jpg');?>



                    <img src="<?=$p?>" height=100 width=100 alt="profile image">
                </div>
            </aside>
        </div>


    </div>
</section>












<?=$this->endSection()?>