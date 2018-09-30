<h1 class="page-header">
    <?php echo ($picture->id != null) ? $picture->id : 'New picture'; ?>
</h1>

<form id="frm-picture" action="?c=picture&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $picture->id; ?>" />
    
    <div class="custom-file">
        <label>Picture:</label>
        <input type="file" id="searhPicture" name="picture" class="custom-file-input">
        <label class="custom-file-label" for="searhPicture"><?php echo ($picture->id != null) ? $picture->picture : 'Choose file'; ?></label>
    </div>

    <div class="form-group">
        <label>Descriptión:</label>
        <textarea class="form-control" rows="6" name="description"><?php echo $picture->description; ?></textarea>
    </div>

    <div class="form-group">
      <label for="inputArticle">Article:</label>
      <select id="inputArticle" name="idArticle" class="form-control" required>
        <option>Choose...</option>
        <?php foreach($this->articleModel->getAll() as $r): ?>
            <option value="<?php echo $r->id; ?>" <?php if ($r->id == $picture->id) echo 'selected'; ?> >
                <?php echo $r->name; ?> 
            </option>
        <?php endforeach; ?>
      </select>
    </div>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-picture").submit(function(){
            return $(this).validate();
        });
    })
</script>
