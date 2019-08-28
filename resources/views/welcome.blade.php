<!doctype html>
<html>
    <head>
        <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">

        <title>Ampizzella To-Do</title>
    </head>
    <body class="bg-blue-100">
        <div class="w-full max-w-lg m-auto mt-6">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-4 mb-4" method="POST" action="{{ action('TodoController@store') }}">
                @csrf
                <div class="mb-4">
                <label class="block text-lg text-gray-600 text-sm font-bold mb-3 ml-24" for="title">
                    Write a title for your to-do!
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="title" type="text" placeholder="Title">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded focus:outline-none focus:shadow-outline mt-6" type="submit">
                    Add
                </button>
                </div>
            </form>

            <div class="w-full max-w-lg m-auto mt-6">
                <ul>
                    @foreach ($todos as $todo)
                    <div class="relative bg-blue-200 px-3 py-4 rounded shadow-md my-3 text-gray-700 font-semibold text-lg pl-6">
                        <li class="inline-block">{{ $todo->title }}</li>
                        <form method="POST" action="/{{$todo->id}}">
                            @csrf
                            @method('DELETE')

                            <button class="absolute top-0 right-0 inline-block bg-red-500 hover:bg-red-700 rounded py-1 px-3 mt-4 mr-6 text-white text-sm font-semibold" type="submit">Delete</button>
                        </form>
                    </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
