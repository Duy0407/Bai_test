<?
require_once 'function/conver_time.php';
?>

<?
if (isset($_SESSION['duyet_ok'])) {?>
    <h3 style="color: green;"><?= $_SESSION['duyet_ok']?></h3>
    <?unset($_SESSION['duyet_ok']);
}

if (isset($_SESSION['duyet_no'])) {?>
    <h3 style="color: red;"><?= $_SESSION['duyet_no']?></h3>
    <?unset($_SESSION['duyet_no']);
}

?>
<table border="1" cellspacing="0" cellpadding="8">
    <tr>
        <th>ID</th>
        <th>User</th>
        <th>Title</th>
        <th>Content</th>
        <th>Image</th>
        <th>Thời gian</th>
        <th colspan="2"></th>
    </tr>
    <?foreach ($news as $new) {?>
        <tr>
            <td><?= $new['id']?></td>
            <td><?= $new['ho_ten']?></td>
            <td><?= $new['title']?></td>
            <td><?= $new['content']?></td>
            <td>
                <img src="assets/uploads/<?= $new['id_user']?>/<?= $new['image']?>" alt="" width="200px" height="100px">
            </td>
            <td><?= time_elapsed_string($new['update_new'])?></td>
            <td>
                <a href="index.php?controller=admin&action=duyet&id=<?=$new['id']?>">Duyệt</a>
            </td><td>
                <a href="index.php?controller=admin&action=tuchoi&id=<?=$new['id']?>">Từ chối</a>
            </td>
        </tr>
    <?}?>

</table>