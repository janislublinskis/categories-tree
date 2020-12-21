<?php view('layouts/header'); ?>

    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-5">
                <div class="page-header">
                    <h1>Update Category</h1>
                </div>

                <?php
                $id = $_GET['id'] ?? 0;

                $categories = database()->select('categories', ['id', 'pid', 'name', 'description']);

                $catsArray = [];
                foreach ($categories as $category) {
                    $catsArray [$category['id']] = $category;
                }

                $category = $catsArray[$id];

                if ($category == null) {
                    header("Location: /");
                    exit();
                }

                $parent = $category['pid'] ? $catsArray[$category['pid']] : null;
                $parentName = $parent ? $parent['name'] : 'Is parent';
                $name = $category['name'];
                $description = $category['description'];
                ?>

                <form action="/edit/<?php echo $id; ?>" method="POST">
                    <table class="table table-responsive">
                        <tr>
                            <td><label for="pid">Parent Category:</label></td>
                            <td>
                                <select name="pid" id="pid" class="form-control">
                                    <option value="<?php echo htmlspecialchars(strip_tags($parent['pid']), ENT_QUOTES); ?>"
                                            selected>
                                        <?php echo htmlspecialchars(strip_tags($parentName), ENT_QUOTES); ?>
                                    </option>
                                    <option value="<?php echo null; ?>"><?php echo 'Is parent'; ?></option>
                                    <?php foreach ($catsArray as $cat): ?>
                                        <?php if ($cat['pid'] !== $parent['pid']): ?>
                                            <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="name">Name:</label></td>
                            <td><input type="text" id="name" name="name"
                                       value="<?php echo htmlspecialchars(strip_tags($name), ENT_QUOTES); ?>"
                                       class="form-control"/>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="description">Description:</label></td>
                            <td><input type="text" id="description" name="description"
                                       value="<?php echo htmlspecialchars(strip_tags($description), ENT_QUOTES); ?>"
                                       class="form-control"/></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Update" class="btn btn-success"/>
                                <input type="reset" name="reset" value="Reset" class="btn btn-primary"/>
                                <a href="/" class="btn btn-danger">Back</a>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
<?php view('layouts/footer'); ?>