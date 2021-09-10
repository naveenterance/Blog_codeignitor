<?=$this->extend('layouts/default')?>

<?=$this->section('title')?>Edit profile image<?=$this->endSection()?>

<?=$this->section('content')?>

<h1>Edit profile image</h1>


<?=form_open_multipart("/tasks/update_image/" . $task->id)?>

<div>
    <label for="image">File</label>
    <input type="file" name="image" id="image" />
</div>

<button >Upload</button>


</form>

<?=$this->endSection()?>