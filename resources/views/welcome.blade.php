@extends('layouts.app')

@section('content')

<main>

	<section class="pt-5 pb-5">
		<div class="container">

            @include('statistique')

            @livewire('candidature')
		</div>
	</section>
</main>


@endsection
