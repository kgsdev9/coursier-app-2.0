<div>
    <h1>Gestion utilisateurs </h1>

    <div>
        <input wire:model="search" type="search" placeholder="Search posts by title...">

        <h1>Search Results:</h1>

        <ul>


                @foreach ($posts as $post)
                    <div wire:key="{{ $post->id }}">
                        <li>{{$post->nom}}</li>
                    </div>
                @endforeach



        </ul>
    </div>
</div>
