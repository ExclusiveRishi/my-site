

<form method="post" class="form-container">
  <h2>Blog By Rishi</h2>
  <div class="form-group">
    <lable for="title">Title</lable>
    <input type="text" name="title" autocomplete="off" id="title">
  </div>
  <div class="form-group">
    <label for="content">Content</label>
    <textarea name="content"></textarea>
    
  </div>
  <button type="submit" class="btn-block">Preview and Post</button>
</form>
<div id="preview-panel">
  <?php
    for($i = 0; $i < sizeof($previewData); $i++) print_r($previewData[$i]);
    echo PHP_EOL;
    echo $date;
  ?>
</div>