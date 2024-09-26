<table class="wood-form">
    <tbody>
        <tr>
            <td>Name:</td>
            <td colspan="2">
                <input class="form-control" type="name" name="n[]" value="<?= $name ?? '' ?>">
            </td>
        </tr>
        <tr>
            <td>Width: <input class="form-control" type="number" name="w[]" min="0" value="<?= $width ?? '' ?>"></td>
            <td>Height: <input class="form-control" type="number" name="h[]" min="0" value="<?= $height ?? '' ?>"></td>
            <td>Thickness: <input class="form-control" type="number" name="t[]" min="0" value="<?= $thickness ?? '' ?>"></td>
        </tr>
        <tr>
            <td>
                Amount:
                <input class="form-control" type="number" name="a[]" min="0" step="1" value="<?= $amount ?? 1 ?>">
            </td>
            <td></td>
            <td>
                &nbsp;<br>
                <button class="btn btn-danger" onclick="this.parentNode.parentNode.parentNode.parentNode.remove()" href="#">&cross;</button>
            </td>
        </tr>
    </tbody>
</table>
