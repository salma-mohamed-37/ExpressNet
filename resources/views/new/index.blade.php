<!DOCTYPE html>
<html lang="en">
<head>
    <title>Homepage</title>
    <style>
        .home
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80vh;
            text-align: center
        }
        body
        {
            background-color: #F1F1f1; ;
        }
    </style>
</head>
<body>

    @extends('new.navbar')
    @section('content')
        <section style="font-size:xx-large;" class="home">It is the suitable place for sharing your thoughts <br/>and opinions and read others’</section>
    @endsection

</body>
</html>
