<?php


namespace App\Models;


class CategoriesTree
{
    public function getCategoriesTree(): string
    {
        return $this->showCategory($this->getTree());
    }

    private function showCategory(array $data): string
    {
        $string = '';
        foreach ($data as $category) {
            $string .= $this->tplMenu($category);
        }

        return $string;
    }

    private function tplMenu($category): string
    {
        $menu = '<li>
                    <div class="category" id="' . $category['id'] . '">
                        <div class="category-info">
                            <div class="category-name">' . $category['name'] . '</div>
                            <div class="category-description">' . $category['description'] . '</div>
                        </div>
                        <div class="category-buttons">
                            <a href=/edit?id=' . $category['id'] . ' class="btn btn-primary m-r-1em">Update</a>                            
                            <form action=/delete/' . $category['id'] . ' method="POST" id="form" style="height: auto">
                                <input type="hidden" name="action" value="delete" />
                                <input type="hidden" name="id" value=' . $category['id'] . '/>
                                <input type="submit" name="submit" value="Delete" class="btn btn-danger"/>
                            </form>
                            <button class="btn btn-warning m-r-1em" id="drop-down" onclick="myFunction(' . $category['id'] . ')">Drop down</button>
                        </div>
                    </div>';

        if (isset($category['childs'])) {
            $menu .= '<ul>' . $this->showCategory($category['childs']) . '</ul>';
        }

        return $menu . '</li>';
    }

    private function getTree(): array
    {
        $tree = [];
        $dataset = $this->prepareCategoriesArray();

        foreach ($dataset as $id => &$node) {
            if (!$node['pid']) {
                $tree[$id] = &$node;
            } else {
                $dataset[$node['pid']]['childs'][$id] = &$node;
            }
        }

        return $tree;
    }

    private function prepareCategoriesArray(): ?array
    {
        $categories = [];

        foreach ($this->getCategories() as $row) {
            $categories[$row['id']] = $row;
        }

        return $categories;
    }

    private function getCategories(): ?array
    {
        $categories = database()->select('categories', ['id', 'pid', 'name', 'description']);

        if (empty($categories)) {
            echo "<div class='alert alert-danger'>No categories found.</div>";
            exit();
        }

        return $categories;
    }
}