<!DOCTYPE html>
<body>
<div class="container bg-dark p-5">
    <h2 class="text-primary mb-4">Add New Menu Item</h2>
    <form action="/submit-menu" method="post" enctype="multipart/form-data">
        <div class="form-group mb-3">
            <label for="title" class="text-light">Title:</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group mb-3">
            <label for="description" class="text-light">Description:</label>
            <textarea class="form-control" id="description" name="description" required></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image" class="text-light">Image:</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group mb-3">
            <label for="nutritional_info" class="text-light">Nutritional Information:</label>
            <textarea class="form-control" id="nutritional_info" name="nutritional_info"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="ingredients" class="text-light">Ingredients:</label>
            <textarea class="form-control" id="ingredients" name="ingredients"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="price" class="text-light">Price ($):</label>
            <input type="number" step="0.01" class="form-control" id="price" name="price" required>
        </div>
        <div class="form-group mb-3">
            <label for="discount" class="text-light">Discount (%):</label>
            <input type="number" step="0.01" class="form-control" id="discount" name="discount">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/main.js"></script>
</body>
</html>
