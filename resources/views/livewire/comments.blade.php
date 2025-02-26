<div>

    @if (count($comments) == 0)
        <div class="bg-white shadow rounded-lg p-6 mb-8">
            <p class="text-center text-gray-600">No hay comentarios aún</p>
        </div>
    @else
        <div class="bg-white shadow rounded-lg p-6 mb-8">

            @foreach ($comments as $comment)
                <li class="list-disc">
                    {{ $comment }}
                </li>
            @endforeach

        </div>

    @endif

</div>
