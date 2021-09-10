<?=$this->extend("layouts/default")?>

<?=$this->section("title")?>Tasks<?=$this->endSection()?>

<?=$this->section("content")?>



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
                        <a>
                            <div>

                                <!-- Search form -->
                            <div class="md-form mt-0">

                                <input style="background-color: #162b4d; color: white;" class="form-control" type="text" name="query" id="query" placeholder="Search" aria-label="Search">
                            </div>
                               
                              

                                <script src="<?=site_url('/js/auto-complete.min.js')?>"></script>

                                <script>
                                var searchUrl = "<?=site_url('/tasks/search?q=')?>";
                                var showUrl = "<?=site_url('/tasks/show/')?>";
                                var data;
                                var i;

                                var searchAutoComplete = new autoComplete({
                                    selector: 'input[name="query"]',
                                    cache: false,
                                    source: function(term, response) {

                                        var request = new XMLHttpRequest();

                                        request.open('GET', searchUrl + term, true);

                                        request.onload = function() {

                                            data = JSON.parse(this.response);

                                            i = 0;

                                            var suggestions = data.map(task => task.title);

                                            response(suggestions);
                                        };

                                        request.send();
                                    },
                                    renderItem: function(item, search) {

                                        var id = data[i].id;

                                        i++;

                                        return '<div style =" color: white; font-size: 20px; text-align: center; margin-left:50%; margin-bottom:2%; border-style:solid; border-color:white; " class="autocomplete-suggestion" data-id="' +
                                            id + '">' + item + '</div>';
                                    },
                                    onSelect: function(e, term, item) {

                                        window.location.href = showUrl + item.getAttribute('data-id');

                                    }
                                });
                                </script>
                            </div>
                        </a>
                    </li>


                    <?php if (current_user()): ?>


                    <li>
                        <a>Logged in as " <?=esc(current_user()->name)?>"</a>

                    </li>
                    <li>

                        <a href="<?=site_url("/tasks/new")?>">New Article</a>
                    </li>
                    <li>

                        <a href="<?=site_url("/logout")?>">Log out</a>
                    </li>

                    <?php else: ?>


                    <li> <a href="<?=site_url("/login")?>">Log in</a></li>
                    <!--<li> <a href="<?=site_url("/signup")?>">Sign up</a> </li>-->

                    <?php endif;?>




                    <div class="social right">
                        <a target="_blank" href="https://www.facebook.com/myresponsee">
                            <i class="icon-facebook_circle icon2x"></i>
                        </a>
                        <a target="_blank" href="https://twitter.com/MyResponsee">
                            <i class="icon-twitter_circle icon2x"></i>
                        </a>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</header>





<?php

$strings = array(
    ' ',
    'right-align',

);

?>












<section id="home-section" class="line" style=" width: 100%;">
    <div class="margin">
        <!-- ARTICLES -->
        <div class="s-12 l-9">



            <?php foreach ($tasks as $task): ?>



            <article class="post-<?=rand(1, 5)?> <?=$strings[array_rand($strings)]?> line">

                <div class="s-12 l-6 post-image">
                    <a href="<?=site_url("/tasks/show/" . $task->id)?>">

                        <?php $p = base_url('uploads/' . $task->id . '.jpg');?>



                        <img src="<?=$p?>" height=100 width=100 alt="profile image">
                    </a>
                </div>
                <!-- text -->
                <div class="s-12 l-5 post-text">
                    <a href="<?=site_url("/tasks/show/" . $task->id)?>">
                        <h2><?=esc($task->title)?></h2>
                    </a>
                    <p><?=esc($task->description)?>
                    </p>
                    <?php 
                   $nam=$task->user_id;

                   $db = db_connect();
                   


                    $query = $db->query("SELECT *
                    FROM user
                    INNER JOIN task ON ".$nam."= user.id;");
                    


                
                    foreach ($query->getResult() as $row){
                        $author =$row->name;

                    }
                    echo $author;
                    ?>
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
            </article>












            <?php endforeach;?>



        </div>

        <div class="s-12 l-3">
            <aside>
                <div class="advertising margin-bottom">
                    <?php $p = base_url('uploads/banner.jpg');?>



                    <img src="<?=$p?>" height=100 width=100 alt="profile image">
                </div>
            </aside>
        </div>
        <div class="s-12 l-3">
            <aside>
                <div class="advertising margin-bottom">
                    <?php $p = base_url('uploads/banner.jpg');?>



                    <img src="<?=$p?>" height=100 width=100 alt="profile image">
                </div>
            </aside>
        </div>

</section>
<?=$pager->links()?>















<?=$this->endSection()?>