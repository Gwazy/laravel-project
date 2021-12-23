@component('mail::message')
# Hi!

You have recieved a comment on your post!

Press the button below to be taken to be taken to your post to see the comment!
@component('mail::button', ['url' => route('posts.show', ['id' => $post->id])])
View Post
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
