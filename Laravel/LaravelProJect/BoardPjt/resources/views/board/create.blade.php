<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($data) ? '글 수정' : '글 쓰기' }}</title>
</head>
<body>
    <h1>(´･ω･`)</h1>
    <h1>{{ isset($data) ? '글 수정' : '글 쓰기' }}</h1>
    <form action="{{ isset($data) ? route('boards.update') : route('boards.store') }}" method="post">
        <input type="hidden" name="id" value="{{ isset($data) ? $data->id : 0 }}">
        <div><label>제목 : <input type="text" name="title" value="{{ isset($data) ? $data->title : '' }}"></label></div>
        <div><label>내용 : <textarea name="ctnt">{{ isset($data) ? $data->ctnt : '' }}</textarea></label></div> 
        <input type="submit" value="{{ isset($data) ? '네 마음 속에 다시 💖저장💖' : '네 마음 속에 💖저장💖'}}">
        @csrf   <!-- Cross-site request forgery : 사이트 간 요청 위조 -->
    </form>
</body>
</html>