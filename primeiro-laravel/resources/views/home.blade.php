<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    @auth

    <p>Congrats, you are logged in</p>
    <form action="/logout" method="POST">
        @csrf
        <button>Log Out </button>
    </form>

    <div style= "border: 3px solid black;">
        <h2>Create A New Post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" placeholder="post title">
            <textarea name="body" placeholder="body content"></textarea>
            <button>Create Post</button>
        </form>

    </div>

    <div style= "border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach ($posts as $posts)
        <div style="background-color: gray; padding: 10px; margin: 10px">
            <h3>{{$posts['title']}} by {{$posts->user->name}}</h3>   
            {{$posts['body']}}
            <p><a href="/edit-post/{{$posts->id}}">Edit</a></p>
            <form action="/delete-post/{{$posts->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
            </form>
        </div>
        @endforeach
    </div>  

    @else

    <div style= "border: 3px solid black;">
        <h2>Register</h2>
        <form action ="/register" method="POST" >
            @csrf
            <input name="name" type="name" placeholder="name">
            <input name="email" type="email" placeholder="email">
            <input name="password" type="password" placeholder="password">
            <button>Register </button>
        </form>
    </div>

    <div style= "border: 3px solid black;">
        <h2>LogIn</h2>
        <form action ="/login" method="POST" >
            @csrf
            <input name="username" type="name" placeholder="name">
            <input name="userpassword" type="password" placeholder="password">
            <button>Log In</button>
        </form>
    
        </div>

    @endauth

    
</body>
</html>