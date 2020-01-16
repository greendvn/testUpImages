<h2>Delete Note Type</h2>
<h5>Bạn có chăc chắn muốn xóa  <?php echo $product->getName()  ?>?</h5>
<?php
if($_SERVER["REQUEST_METHOD"]=="POST") {
    $id = $_POST["id"];
    $this->noteTypeDB->delete($id);
    header("Location:index.php");
}
?>
<form method="post">
    <input type="text" class="form-control" name="id" value="<?php echo $noteType->getId()?> " hidden>
    <a  href="index.php" class="btn btn-primary">Thoát</a>
    <button type="submit" class="btn btn-primary">Xóa </button>
</form>