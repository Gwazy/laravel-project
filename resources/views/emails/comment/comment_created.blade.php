@component('mail::message')
# Hi!

You have recieved a comment on your post!

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
