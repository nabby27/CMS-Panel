<h1 class="page-header">
    <?php echo $link->getId() != null ? $link->getId() : 'New link'; ?>
</h1>

<form id="frm-link" action="?c=link&a=save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $link->getId(); ?>" />
    
    <div class="form-group">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $link->getName(); ?>" class="form-control" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label>Link:</label>
        <input type="text" name="link" value="<?php echo $link->getLink(); ?>" class="form-control" placeholder="Link" required>
    </div>

    <div class="form-group">
      <label for="inputArticle">Article:</label>
      <select id="inputArticle" name="idArticle" class="form-control" required>
        <option>Choose...</option>
        <?php foreach($this->articleModel->getAll() as $article): ?>
            <option value="<?php echo $article->getId(); ?>" <?php if ($article->getId() == $link->getIdArticle()) echo 'selected'; ?> >
                <?php echo $article->getName(); ?> 
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
