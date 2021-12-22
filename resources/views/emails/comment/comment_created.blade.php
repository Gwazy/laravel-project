@component('mail::message')
# Hi!

You have recieved a comment on your post!

@component('mail::button', ['url' => route('posts.show', ['id' => $post->id])])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
