<h3>Edit Product</h3>
<form method="post" action="<?= site_url('products/update/'.$product->id) ?>" enctype="multipart/form-data">
    <input type="text" name="name" value="<?= $product->name ?>"><br>
    <textarea name="description"><?= $product->description ?></textarea><br>
    <input type="number" step="0.01" name="price" value="<?= $product->price ?>"><br>
    <select name="category_id">
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat->id ?>" <?= $product->category_id == $cat->id ? 'selected' : '' ?>>
                <?= $cat->name ?>
            </option>
        <?php endforeach; ?>
    </select><br>
    <img src="<?= base_url('uploads/'.$product->image) ?>" width="80"><br>
    <input type="file" name="image"><br>
    <button type="submit">Update</button>
</form>
