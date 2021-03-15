@component('mail::message')
<h2> مرحبًا</h2>

{{ $data['name'] }} :المستخدم 
<br>
{{ $data['place_url'] }}  :أبلغ عن الرابط   

@component('mail::button', ['url' => ''])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
