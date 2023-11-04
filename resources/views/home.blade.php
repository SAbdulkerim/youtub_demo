<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>testing</h1>

    @auth

        
    <h2>Congrats {{ auth()->user()->name }}, you are logged in</h2>

        <form action="/logout" method="POST">
        @csrf
        <BUTTOn>Log out</BUTTOn>
        </form>

        <div style="border: 3px solid black;">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
            @csrf
            <input type="text" name="title" id=""  placeholder="post title">
            <textarea name="body" id="" placeholder="body content ..."></textarea>
            <button>Save Post</button>

            </form>
        </div>

        <div style="border: 3px solid black;">
             <h2>All posts</h2>
             @foreach ($posts as $post)
                <div style ="background-color: grey; padding: 10px; margin: 10px;">
                    <h3>{{$post['title']}} by {{$post->user->name}} </h3>
                    {{$post['body']}}
                     
                    {{$post->id}}
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button>Delete</button>
                    </form>
                </div>
             @endforeach
        </div> 
    @else

    
        <div style="border: 3px solid black;">
            <h2>Register</h2>
            <form action="/register" method="POST">
                <!-- {{ csrf_field() }} -->
                <!-- csrf_field()  -->
                @csrf
                <input name="name" type="text" placeholder="name">
                <input name="email" type="text" placeholder="email">
                <input name="password" type="password" placeholder="password">
                <button>Register</button>
                    
            </form>
            </div>


        <div style="border: 3px solid black;">
            <h2>login</h2>
            <form action="/login" method="POST">
                <!-- {{ csrf_field() }} -->
                <!-- csrf_field()  -->
                @csrf
                <input name="loginname" type="text" placeholder="name">
                <input name="loginpassword" type="password" placeholder="password">
                <button>Log in</button>
                    
            </form>
            </div>
    @endauth
</body>
</html>