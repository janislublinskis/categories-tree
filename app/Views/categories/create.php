<link rel="stylesheet" type="text/css" href="/public/modal.css">
<!-- The Modal -->
<div id="createCategory" class="modal">
    <!-- Modal content -->
    <div class="modal-content">

        <div class="page-header">
            <h1>Add Category</h1>
            <span class="close">&times;</span>
        </div>

        <form action="/store" method="POST">
            <table class='table table-responsive'>
                <tr>
                    <td><label for="pid">Parent Category:</label></td>
                    <td><input type='text' id='pid' name='pid' class='form-control'/></td>
                </tr>
                <tr>
                    <td><label for="name">Name:</label></td>
                    <td><input type='text' id="name" name='name' class='form-control'/></td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td><input type='text' id='description' name='description' class='form-control'/></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type='submit' name='submit' value='Add' class='btn btn-success'/>
                        <input type='reset' name='reset' value='Reset' class='btn btn-warning'/>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>
