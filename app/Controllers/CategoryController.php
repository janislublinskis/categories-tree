<?php

namespace App\Controllers;

use Carbon\Carbon;
use PHPMailer\PHPMailer\Exception;

class CategoryController
{
    public function index()
    {
        return view('categories/index');
    }

    public function store()
    {
        if ($_POST) {
            if (isset($_POST['pid'])) {
                $pid = htmlspecialchars(strip_tags($_POST['pid']));
            }

            if (isset($_POST['name'])) {
                $name = htmlspecialchars(strip_tags($_POST['name']));
            }

            if (isset($_POST['description'])) {
                $description = htmlspecialchars(strip_tags($_POST['description']));
            }

            try {
                database()->insert(
                    'categories', [
                        'pid' => $pid,
                        'name' => $name,
                        'description' => $description,
                        'created_at' => Carbon::now()->format(DATE_ATOM),
                        'updated_at' => Carbon::now()->format(DATE_ATOM),
                    ]
                );
                header("Location: /");

            } catch (Exception $e) {
                echo "<script>
                        alert('Unable to create category. Please try again later.');
                        window.location.href='/';
                      </script>";
            }
        }
    }

    public function edit()
    {
        return view('categories/edit');
    }

    public function update($section)
    {
        if ($_POST) {
            if (isset($_POST['pid'])) {
                $pid = empty($_POST['pid']) ? null : htmlspecialchars(strip_tags($_POST['pid']));
            }

            if (isset($_POST['name'])) {
                $name = htmlspecialchars(strip_tags($_POST['name']));
            }

            if (isset($_POST['description'])) {
                $description = htmlspecialchars(strip_tags($_POST['description']));
            }

            try {
                database()->update(
                    'categories',
                    [
                        'pid' => $pid,
                        'name' => $name,
                        'description' => $description,
                        'updated_at' => Carbon::now()->format(DATE_ATOM),
                    ],
                    ['id' => $section['id']]
                );

                echo "<script>
                        alert('Category updated successfully.');
                        window.location.href='/';
                      </script>";
            } catch (Exception $e) {
                echo "<script>
                        alert('Please try again later.');
                        window.location.href='/';
                      </script>";
            }
        }
    }

    public function delete($section)
    {
        $id = $section['id'] ?? 0;

        if ($id === 0) {
            header("Location: /");
            exit();
        }

        try {
            database()->delete('categories', ['id' => $id]);

            echo "<script>
                        alert('Category deleted successfully.');
                        window.location.href='/';
                      </script>";
        } catch (Exception $e) {
            echo "<script>
                        alert('Unable to delete category. Please try again later.');
                        window.location.href='/';
                      </script>";
        }
    }
}