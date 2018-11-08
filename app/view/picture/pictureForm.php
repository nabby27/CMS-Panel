<h1 class="page-header">
    <?php echo $picture->getId() != null ? $picture->getId() : 'New picture'; ?>
</h1>

<form class="border border-info rounded p-4" action="<?php echo Settings::PATH['base'] ?>/picture/save" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $picture->getId(); ?>" />

    <fieldset class="border border-black px-3 pb-3 mb-4">
        <legend>Picture data</legend>
        <div class="form-group">
            <label>Picture:</label>
            <?php if ($picture->getId() != null) { ?>
                <img src="<?php echo Settings::PATH['img'].'/'.$picture->getPicture(); ?>" class="img-fluid" alt="image">
            <?php } ?>
            <div class="custom-file">
                <input type="file" name="picture" class="custom-file-input" <?php if ($picture->getId() == null) echo 'required' ?> >
                <label class="custom-file-label"><?php echo ($picture->getId() != null) ? $picture->getPicture() : 'Choose file'; ?></label>
            </div>
        </div>

        <div class="form-group">
            <label>Descriptión:</label>
            <textarea class="form-control" rows="6" name="description" placeholder="Describe the picture here..."><?php echo $picture->getDescription(); ?></textarea>
        </div>

        <div class="form-group">
            <label>Article:</label>
            <select name="idArticle" class="form-control custom-select" required>
                <option value="" disabled selected>Choose...</option>
                <?php foreach($this->articleModel->getAll() as $article): ?>
                    <option value="<?php echo $article->getId(); ?>" <?php if ($article->getId() == $picture->getIdArticle()) echo 'selected'; ?> >
                        <?php echo ucfirst($article->getName()); ?> 
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
    </fieldset>
   
    <hr/>

    <div class="text-right">
        <button class="btn btn-primary" type="submit">Save</button>
    </div>
</form>
