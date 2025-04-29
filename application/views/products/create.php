<h3>Add Product</h3>
<form method="post" action="<?= site_url('products/store') ?>" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="Name"><br>
    <textarea name="description" placeholder="Description"></textarea><br>
    <input type="number" step="0.01" name="price" placeholder="Price"><br>
    <select name="category_id">
        <?php foreach ($categories as $cat): ?>
            <option value="<?= $cat->id ?>"><?= $cat->name ?></option>
        <?php endforeach; ?>
    </select><br>
    <input type="file" name="image"><br>
    <button type="submit">Save</button>
</form>
