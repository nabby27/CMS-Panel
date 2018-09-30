<h1 class="page-header">
    <?php echo $article->id != null ? $article->name : 'New article'; ?>
</h1>

<form id="frm-article" action="?c=article&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $article->id; ?>" />
      
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $article->name; ?>" class="form-control" placeholder="Name" required>
    </div>
    
    <div class="form-group">
        <label>Descriptión:</label>
        <textarea class="form-control" rows="6" name="description"><?php echo $article->description; ?></textarea>
    </div>

    <div class="form-group">
        <label>Picture:</label>
        <input type="text" name="picture" value="<?php echo $article->picture; ?>" class="form-control" placeholder="Picture" required>
    </div>

    <div class="form-group">
      <label for="inputCategory">Category:</label>
      <select id="inputCategory" name="idCategory" class="form-control" required>
        <option>Choose...</option>
        <?php foreach($this->categoryModel->getAll() as $r): ?>
            <option  value="<?php echo $r->id; ?>" <?php if ($r->id == $article->id) echo 'selected'; ?> >
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
        $("#frm-article").submit(function(){
            return $(this).validate();
        });
    })
</script>
