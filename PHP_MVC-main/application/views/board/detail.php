<!DOCTYPE html>
<html lang="en">
<?php include_once "application/views/template/head.php"; ?>
<body>
    <h1>Detail</h1>
    <div>
        <button id="btnDel" data-iboard="<?=$this->data->i_board?>">삭제</button>
    </div>
    <div><a href="mod?i_board=<?=$this->data->i_board?>"><button>수정</button></a></div>
    <div>글 번호 : <?=$this->data->i_board?></div>
    <div>제목 : <?=$this->data->title?></div>
    <div>내용 : <?=$this->data->ctnt?></div>
    <div>글쓴이 : <?=$this->data->nm?></div>
    <div>작성일시 : <?=$this->data->created_at?></div>
</body>
</html>
<!-- this memberfield에 data가 들어가고 거기의 memberfiled에 obj, title, ctct등이 있음
그래서 this->data->title 이런 식으로 들어가야 됨 -->
