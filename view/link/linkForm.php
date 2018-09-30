<h1 class="page-header">
    <?php echo $link->id != null ? $link->name : 'New link'; ?>
</h1>

<form id="frm-link" action="?c=link&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $link->id; ?>" />
    
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $link->name; ?>" class="form-control" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label>Link:</label>
        <input type="text" name="link" value="<?php echo $link->link; ?>" class="form-control" placeholder="Link" required>
    </div>

    <div class="form-group">
      <label for="inputArticle">Article:</label>
      <select id="inputArticle" name="idArticle" class="form-control" required>
        <option>Choose...</option>
        <?php foreach($this->articleModel->getAll() as $r): ?>
            <option value="<?php echo $r->id; ?>" <?php if ($r->id == $link->idArticle) echo 'selected'; ?> >
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
        $("#frm-link").submit(function(){
            return $(this).validate();
        });
    })
</script>
