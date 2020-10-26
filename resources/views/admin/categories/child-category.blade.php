<li>
    {{ Form::radio('category_id', $child_category->id, null, ['class'=>'flat']) }} 
    {{ $child_category->name }}
    @if ($child_category->categories)
    <ul>
        @foreach ($child_category->categories as $child_category)
        @include('admin.categories.child-category', ['child_category' => $child_category])
        @endforeach
    </ul>
    @endif
</li>
