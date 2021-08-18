@foreach($pages as $page)
    <h1>Title: {{$page->title}}</h1>
    <p>custom field: {{$page->getMeta('field_1')}}</p>
    <p>person : {{ $page->getMeta('person')['first_name'] }}</p>
@endforeach
