<h1>
    The list of tasks.
</h1>
<br>
{{--@isset($name)--}}
{{--The name is: {{$name}}. --}}{{--this code will only be displayed if $name is defined--}}
{{--@endisset--}}
<div>
    {{--    @if(count($tasks)>0)--}}
    {{--        @foreach($tasks as $task)--}}
    {{--            <div>--}}
    {{--            {{$task->title}} and {{$task->description}};--}}
    {{--            </div>--}}
    {{--        @endforeach--}}
    {{--    @else--}}
    {{--        <div>There are no tasks!</div>--}}
    {{--    @endif--}}
    @forelse($tasks as $task)
        <div>
             <a href="{{route('tasks.show', ['id'=>$task->id])}}"> {{$task->title}} </a>
        </div>
    @empty
        No tasks
    @endforelse
</div>
