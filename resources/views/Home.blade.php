<!-- resources/views/home.blade.php -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
   <p>Congrats, {{ auth()->user()->name }}!</p>
   <form action="/logout" method="POST">
       @csrf
       <button>Logout</button>
   </form>

   <div style="border: 3px solid black; padding:10px; margin-top:15px;">
       <h2>Create Post</h2>
       <form action="/create-post" method="POST">
           @csrf
           <input type="text" name="title" placeholder="Title">
           <textarea name="body" placeholder="Enter text..."></textarea>
           <button>Save Post</button>
       </form>
   </div>

   <div style="padding:10px; margin-top:15px;">
       <h1>All Posts</h1>
       @foreach ($postingss as $p)
       <div style="border: 3px solid black; background-color:grey; margin-bottom:15px; padding:10px;">
           <p>{{ $p['title'] }} by {{$p->user->name}}</p>
           <p>{{ $p['body'] }}</p>
           <p><a href="/edit-post/{{ $p->id }}">Edit</a></p>
           <form action="/delete-post/{{ $p->id }}" method="POST">
               @csrf
               @method('DELETE')
               <button>Delete</button>
           </form>
       </div>
       @endforeach
   </div>
</body>
</html>
