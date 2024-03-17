<html>
<head>
    <meta charset="UTF-8">
    <title>物件管理</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header>
        <h1>物件登録内容編集</h1>
    </header>

    <div class="edit-page">
        <div class="form-balance edit-balance">
            <form action="{{ url('update/'.$bukkenkanri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <input type="hidden"  id="id" name="id" value={{$bukkenkanri->id}} enctype="multipart/form-data">

                <label for="number">物件番号:</label>
                <input type="text" id="number" name="number" value={{$bukkenkanri->number}}>
                @if ($errors->has('number'))<span class="error">{{ $errors->first('number') }}</span>@endif

                <label for="date">竣工日:</label>
                <input type="date" id="date" name="date" value={{$bukkenkanri->date}}>
                @if($errors->has('date'))<span class="error">{{ $errors->first('date') }}</span>@endif

                <label for="address">物件住所:</label>
                <input type="text" id="address" name="address" value={{$bukkenkanri->address}}>
                @if($errors->has('address'))<span class="error">{{ $errors->first('address') }}</span>@endif

                <label for="price">物件価格:</label>
                <input type="text" id="price" name="price"  value={{$bukkenkanri->price}}>
                @if($errors->has('price'))<span class="error">{{ $errors->first('price') }}</span>@endif


                <label for="pic">物件画像1:</label>
                <input type="file" id="pic" name="pic" value="{{$bukkenkanri->pic}}" multiple/>
                @if (is_null($bukkenkanri->pic))
                        <td><img src="{{ asset('storage/images/nophoto.jpg') }}" ></td>
                        @else
                        <td><img src="{{ asset('storage/images/'.$bukkenkanri->pic) }}" ></td>
                        @endif
                @if($errors->has('pic'))<span class="error">{{ $errors->first('pic') }}</span>@endif

                <label for="pic2">物件画像2:</label>
                <input type="file" id="pic2" name="pic2" value="{{$bukkenkanri->pic2}}" multiple/>
                @if (is_null($bukkenkanri->pic2))
                        <td><img src="{{ asset('storage/images/nophoto.jpg') }}" ></td>
                        @else
                        <td><img src="{{ asset('storage/images/'.$bukkenkanri->pic2) }}" ></td>
                        @endif
                @if($errors->has('pic2'))<span class="error">{{ $errors->first('pic2') }}</span>@endif



                <div class="button-container">
                    <button type="submit" class="edit-button">編集</button>
                    <input type="button"  class="back-button" value="戻る" onclick="window.location.href='{{ url('/') }}'">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
