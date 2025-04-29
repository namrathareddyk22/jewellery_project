<h3>Product List</h3>
<a href="<?= site_url('products/create') ?>">Add New Product</a>
<table border="1">
    <tr>
        <th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Image</th><th>Action</th>
    </tr>
    <?php foreach ($products as $product): ?>
    <tr>
        <td><?= $product->name ?></td>
        <td><?= $product->description ?></td>
        <td><?= $product->price ?></td>
        <td><?= $product->category ?></td>
        <td><img src="<?= base_url('uploads/'.$product->image) ?>" width="80"></td>
        <td>
            <a href="<?= site_url('products/edit/'.$product->id) ?>">Edit</a> |
            <a href="<?= site_url('products/delete/'.$product->id) ?>" onclick="return confirm('Delete?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
