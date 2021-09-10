<div class="form-group" style="width: 60%; margin: auto;">



    <label for="title">Title</label>
    <input  class="form-control" type="text" name="title" id="title" value="<?=old('title', esc($task->title))?>">

    <label for="description">Description</label>
    <input  class="form-control" type="text" name="description" id="description" value="<?=old('description', esc($task->description))?>">

    <label for="content">Content</label>
    <textarea  class="form-control" type="text" id="content" name="content" rows="15"
        cols="50"> <?=old('content', esc($task->content))?> </textarea>
    <label for="description">User_id</label>
    <input  class="form-control" type="number" name="user_id" id="user_id" value="<?=old('user_id', esc($task->user_id))?>">


</div>