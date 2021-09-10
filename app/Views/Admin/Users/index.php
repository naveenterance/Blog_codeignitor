 <?php if (current_user()) {?>


 <?=$this->extend("layouts/default")?>

 <?=$this->section("title")?>Users<?=$this->endSection()?>

 <?=$this->section("content")?>

 <h1>Users</h1>

 <a style="font-size: 50px;" href="<?=site_url("/admin/users/new")?>">New user +</a>

 <?php if ($users): ?>

 <table style="margin-top: 60px;">
     <thead>
         <tr style=" color: black;">
             <th>Name</th>
             <th>Email</th>
             <th>Position</th>
             <th>Created at</th>
             <th>Updated at</th>
         </tr>
     </thead>
     <tbody>
         <?php foreach ($users as $user): ?>

         <tr>
             <td>
                 <a href="<?=site_url("/admin/users/show/" . $user->id)?>">
                     <?=esc($user->name)?>
                 </a>
             </td>
             <td><a  href="<?=site_url("/admin/users/show/" . $user->id)?>"><?=esc($user->email)?></a></td>
                <td><a  href="<?=site_url("/admin/users/show/" . $user->id)?>"><?=esc($user->position)?></a></td>
             <td><a  href="<?=site_url("/admin/users/show/" . $user->id)?>"><?=$user->created_at?></a></td>
             <td><a  href="<?=site_url("/admin/users/show/" . $user->id)?>"><?=$user->updated_at?></a></td>
         </tr>

         <?php endforeach;?>
     </tbody>
 </table>

 <?=$pager->Links()?>

 <?php else: ?>

 <p>No users found.</p>

 <?php endif;?>

 <?=$this->endSection()?>

 <?php } else {echo "Forbidden";}?>