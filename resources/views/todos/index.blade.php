<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Index</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Bowlby+One+SC" rel="stylesheet"> 

    <link rel="stylesheet" type="text/css" href="/css/app.css">
</head>

<body>
    <div class="row">
        <div class="col-sm-4">
            <span id="container"></span>
            <h1 class="titre">Tâches :</h1>
            <form action="/todos/save" id="form_save" method="post">
                {{ csrf_field() }}
                <label for="name">Créer une Tâche:</label>
                <input type="text" name="name" id="name"> 
                <label for="category"></label>
                <select id="category" name="category_id">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach                   
                </select>

                <button class="btn btn-info btn-md" role="button" type="submit">Save<span class="glyphicon glyphicon glyphicon-hand-right"></span></button>
            </form>
            <!-- affichage react -->
            <div id="app"></div>
            <div id="app2"></div>
            <div id="app3"></div>
            <div>   
                <h1 class="titre">Liste en Ajax :</h1>
                <div id="ajax_result">surface resultat</div>
            </div>
        </div>

        <div class="col-sm-4">
            <h1 class="titre">A faire :</h1>
            <div class="cat_white"> 
                @foreach($todos as $todo)
                @if ($todo->do==0)

                <h3> {{ $todo->name}}</h3>
                <h3 class="titre">Deadline :</h3>
                <h3> {{ $todo->category->name}}</h3>

                <div class="bouton">
                    <form action="/todos/delete" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{$todo ->id}}">
                        <button type="submit" class="btn-md btn-danger">Delete <span class="glyphicon glyphicon glyphicon-trash"></span></button>
                    </form>
                    <div>
                        <a href="todos/edit/{{$todo ->id}}"><button type="button">Update <span class="glyphicon glyphicon glyphicon-refresh"></span></button></button></a></br>
                    </div>
                    <div>
                        <a href="todos/checked/{{$todo ->id}}"><button type="submit">Done <span class="glyphicon glyphicon glyphicon-thumbs-up"></span></button> </a>
                    </div>
                </div>
                @endif  
                @endforeach
            </div>
        </div>

        <div class="col-sm-4">
            <h1 class="titre">Fait :</h1>
            <div class="cat_white">
                @foreach($todos as $todo)
                @if ($todo->do==1)

                <h3 class="cat_white">{{ $todo->name}}</h3>
                <h3 class="titre">Deadline :</h3>
                <h3> {{ $todo->category->name}}</h3>
                <div class="bouton">
                    <form action="/todos/delete" method="post">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" id="id" value="{{$todo ->id}}">
                        <button type="submit" class="btn-md btn-danger">Delete <span class="glyphicon glyphicon glyphicon-trash"></span></button>
                    </form>
                    <div>
                        <a href="todos/edit/{{$todo ->id}}"><button type="button">Update <span class="glyphicon glyphicon glyphicon-refresh"></span></button></button></a></br>
                    </div>
                </div>

                @endif        
                @endforeach
            </div>
        </div>
    </div>
    
    
    <script type="text/javascript" src="/js/app.js"></script>

</body>

</html>