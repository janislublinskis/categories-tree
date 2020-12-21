<?php

use App\Models\CategoriesTree;

view('layouts/header');
include('create.php');
?>

<?php if (auth()->check()): ?>
    <div class="page-header-categories">
        <div class="categories-header">
            <h2 class="app-name"><?php echo config('app.name') ?></h2>
            <div class="welcome-user d-flex">
                <div class="p-2">
                    Welcome, <?php echo auth()->user()->username() ?>!
                </div>
                <form action="/auth/logout" method="post">
                    <button class='btn btn-info m-b-1em ' type="submit">Logout</button>
                </form>
            </div>
        </div>
    </div>

    <div class="categories-container">
        <div class="categories-tree">
            <div class="categories-tree-top">
                <!-- Trigger/Open The Modal -->
                <button class='btn btn-success m-b-1em category-add-btn' onclick="openModal('createCategory')">
                    Add New Category
                </button>
            </div>
            <div class="categories-tree-body">
                <?php echo (new CategoriesTree())->getCategoriesTree(); ?>
            </div>
        </div>
    </div>

<?php else: ?>
    <?php header('Location: /'); ?>
<?php endif; ?>

<?php view('layouts/footer'); ?>

<script src="/public/main.js"></script>
