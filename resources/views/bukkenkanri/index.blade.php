<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>物件管理</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body>
    <header>
        <h1>物件管理</h1>
    </header>

    <section class="container">
        <div class="balance">

            <div class="add-balance">
                <h3>物件登録</h3>
                <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="date">竣工日:</label>
                    <input type="date" id="date" name="date">
                    @if($errors->has('date')) <span class="error">{{$errors->first('date')}}</span> @endif

                    <label for="address">物件住所:</label>
                    <input type="text" id="address" name="address">
                    @if ($errors->has('address'))<span class="error">{{ $errors->first('address') }}</span>@endif

                    <label for="price">物件価格:</label>
                    <input type="text" id="price" name="price">
                    @if ($errors->has('price'))<span class="error">{{ $errors->first('price') }}</span>@endif

                    <label for="pic">物件画像1:</label>
                    <input type="file" name="pic" multiple/>
                    @if ($errors->has('pic'))<span class="error">{{ $errors->first('pic') }}</span>@endif

                    <label for="pic2">物件画像2:</label>
                    <input type="file" name="pic2" multiple/>
                    @if ($errors->has('pic2'))<span class="error">{{ $errors->first('pic2') }}</span>@endif

                    <button type="submit">追加</button>
                </form>
            </div>

            <h3>物件一覧</h3>
            @if(session('flash_message'))
                <div class="flash_message">
                    {{ session('flash_message') }}
                </div>
            @endif
            @if(session('flash_error_message'))


                <div class="flash_error_message">
                    {{ session('flash_error_message') }}
                </div>
            @endif
            <table>
                <thead>
                    <tr>
                        <th>竣工日</th>
                        <th>物件住所</th>
                        <th>物件価格</th>
                        <th>物件画像1</th>
                        <th>物件画像2</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bukkenkanris as $bukkenkanri)
                    <tr>
                        <td>{{$bukkenkanri->date}}</td>
                        <td>{{$bukkenkanri->address}}</td>
                        <td>{{$bukkenkanri->price}}</td>

                        @if (is_null($bukkenkanri->pic))
                        <td><img src="{{ asset('storage/images/nophoto.jpg') }}" ></td>
                        @else
                        <td><img src="{{ asset('storage/images/'.$bukkenkanri->pic) }}" ></td>
                        @endif

                        @if (is_null($bukkenkanri->pic2))
                        <td><img src="{{ asset('storage/images/nophoto.jpg') }}" ></td>
                        @else
                        <td><img src="{{ asset('storage/images/'.$bukkenkanri->pic2) }}" ></td>
                        @endif


                        <td class="button-td">
                            <form action="{{route('bukkenkanri.edit', ['id'=>$bukkenkanri->id])}}" method="">
                                <input type="submit" value="更新" class="edit-button">
                            </form>
                            <form action="{{route('bukkenkanri.destroy', ['id'=>$bukkenkanri->id])}}" method="POST">
                                @csrf
                                <input type="submit" value="削除" class="delete-button">
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

    </section>
</body>
</html>