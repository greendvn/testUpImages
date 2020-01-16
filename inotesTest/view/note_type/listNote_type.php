<h2>Note type List</h2>
<a href="index.php?page=addNote_type">Add new note type</a>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">image</th>
        <th scope="col">Description</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($note_types as $key => $note_type): ?>
    <tr>
        <th scope="row"><?php echo ++$key ?></th>
        <td><?php echo $note_type->getName() ?></td>
        <td><img src="images/<?php echo  $note_type->getImage() ?>"></td>
        <td><?php echo  $note_type->getDescription() ?></td>
    </tr>
    <?php endforeach;?>
    </tbody>
</table>