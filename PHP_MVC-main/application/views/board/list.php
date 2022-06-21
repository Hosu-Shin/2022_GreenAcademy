<!DOCTYPE html>
<html lang="en">
<?php include_once "application/views/template/head.php"; ?>

<body>
    <h1>리스트</h1>
    <table>
        <thead>
            <tr>
                <th>번호</th>
                <th>제목</th>
                <th>작성일</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($this->list as $item) { ?>
                <!-- dataset 만들기 : data-이름=:가져올 값" -->
                <tr data-iboard="<?= $item->i_board ?>"> 
                    <td><?= $item->i_board ?></td>
                    <td><?= $item->title ?></td>
                    <td><?= $item->created_at ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>
