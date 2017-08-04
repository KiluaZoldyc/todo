<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Delete</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
	</head>

    <body>

    <form action="save" method="post">
    	{{ csrf_field() }}
    	<div>
    		<label for="name">NOM</label>
    		<input type="text" name="name" id="name">
    	</div>
    		<button type="submit" name="button">Enregistrer</button>
	</form>
 	</body>
</html>