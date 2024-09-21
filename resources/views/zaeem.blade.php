<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .areeb {
            background-color: chocolate;
            color: white;
        }
    </style>
    <link rel="stylesheet" href="akti.css">
</head>

<body>
    <h1 class='areeb'>Plain PHP Syntax</h1>
    <?php
    $students = ['ahmed', 'areeb', 'zaeem', 'abdullah'];
    echo '<ul>';
    foreach ($students as $student) {
        echo "<li> $student</li>";
    }
    echo '</ul>';
    ?>

    <h1 class='ahmed'>Blade Templating Engine Syntax</h1>
    <ul>
        @foreach ($students as $student)
            <li>{{ $student }}</li>
        @endforeach
    </ul>

    {{-- @php @endphp --}}
    {{-- @if (false)
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eos consectetur fugit illum laudantium, numquam
            voluptatibus, quod laboriosam culpa neque voluptatum, eum officiis ipsam rerum? Sequi doloribus odio
            molestias aut repudiandae?</p>
    @endif --}}
    {{-- <h1>Hello Welcome to Zaeem's Page</h1> --}}
    <script>
        // alert('Hello Javascript')
    </script>
    <script src="abdullah.js"></script>
</body>

</html>
