<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>(╯‵□′)╯︵┻━┻</h1>
    <div id="ldata" data-id="{{ $data->id }}">ε=( o｀ω′)ノ</div>
        <div>
        <a href="{{ url('/boards') }}"><button type="button"> ᕦ(ò_óˇ)ᕤ </button></a>
        <a href="{{ route('boards.edit', ['id' => $data->id]) }}"><button type="button"> ( •̀ ω •́ )✧ </button></a>
        <button type="button" id="btnDel"> ┌( ಠ_ಠ)┘ </button>
    </div>
    <div>제목 {{ $data->title }} </div>
    <div>조회수 {{ $data->hits }} </div>
    <div>등록일 {{ $data->created_at }} </div>
    <div>수정일 {{ $data->updated_at }} </div>
    <div>내용</div>
    <div>{{ $data->ctnt }}</div>

    <script>
        const ldata = document.querySelector('#ldata');
        const btnDel = document.querySelector('#btnDel');
        if(btnDel) {
            btnDel.addEventListener('click', e => {
                if(!confirm('삭제하자')) { return; }
                location.href = `/boards/destroy?id=${ldata.dataset.id}`;
            });
        }
    </script>
</body>
</html>