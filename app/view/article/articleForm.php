<div class="container">
    <h1 class="page-header">
        <?php echo $article->getId() != null ? $article->getId() : 'New article'; ?>
    </h1>

    <form class="border border-info rounded p-4" action="<?php echo Settings::PATH['base'] ?>/article/save" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $article->getId(); ?>" />

        <fieldset class="border border-black px-3 pb-3 mb-4">
            <legend>Article data</legend>
            <div class="form-group py-2">
                <label class="d-none d-lg-block" for="name">Name:</label>
                <input type="text" name="name" value="<?php echo ucfirst($article->getName()); ?>" class="form-control" placeholder="Name" required>
            </div>
            
            <div class="form-group py-2">
                <label class="d-none d-lg-block" for="description">Descriptión:</label>
                <textarea class="form-control" rows="6" name="description" placeholder="Describe the article here..."><?php echo $article->getDescription(); ?></textarea>
            </div>

            <div class="form-group py-2">
                <label class="d-none d-lg-block" for="picture">Picture:</label>
                <?php if ($article->getId() != null) { ?>
                    <img src="<?php echo Settings::PATH['img'].'/'.$article->getPicture(); ?>" class="img-fluid" alt="image">
                <?php } ?>
                <div class="custom-file">
                    <input type="file" name="picture" class="custom-file-input" <?php if ($article->getId() == null) echo 'required' ?> >
                    <label class="custom-file-label"><?php echo ($article->getId() != null) ? $article->getPicture() : 'Choose file'; ?></label>
                </div>
            </div>

            <div class="form-group py-2">
            <label class="d-none d-lg-block" for="idCategory">Category:</label>
            <select name="idCategory" class="form-control custom-select" required>
                <option value="" disabled selected>Choose...</option>
                <?php foreach($this->categoryModel->getAll() as $category): ?>
                    <option value="<?php echo $category->getId(); ?>" <?php if ($category->getId() == $article->getIdCategory()) echo 'selected'; ?> >
                        <?php echo ucfirst($category->getName()); ?> 
                    </option>
                <?php endforeach; ?>
            </select>
            </div>
        </fieldset>
        
        <div class="text-right pt-3">
            <button class="btn btn-primary" type="submit">Save</button>
        </div>
    </form>
</div>