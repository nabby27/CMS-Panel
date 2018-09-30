<h1 class="page-header">
    <?php echo $category->id != null ? $category->id : 'New category'; ?>
</h1>

<form id="frm-category" action="?c=category&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $category->id; ?>" />

    <div class="form-group">
      <label for="inputCategoryFather">Category father:</label>
      <select id="inputCategoryFather" name="idCategoryFather" class="form-control" required>
        <option>Choose...</option>
        <?php foreach($this->getAll() as $r): ?>
            <option value="<?php echo $r->id; ?>" <?php if ($r->id == $category->idCategoryFather) echo 'selected'; ?> >
                <?php echo $r->name; ?> 
            </option>
        <?php endforeach; ?>
      </select>
    </div>
    
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $category->name; ?>" class="form-control" placeholder="Name" required>
    </div>
   
    <hr/>
    
    <div class="text-right">
        <button class="btn btn-primary">Save</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-category").submit(function(){
            return $(this).validate();
        });
    })
</script>
