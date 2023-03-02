@extends('app')

@section('content')
    <h1>
        About</h1>
    @if (count($people))
        <h2>People I Like:</h2>
        <ul>
            @foreach ($people as $person)
                <li>{{ $person }}</li>
            @endforeach
        </ul>
    @endif
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, explicabo quasi nam officia fuga tenetur. Ducimus
        minus molestiae sit pariatur reprehenderit consectetur rerum earum, ad nam obcaecati esse sunt aliquid perspiciatis
        blanditiis fuga doloremque! Sequi corporis obcaecati molestiae vitae in facilis ea cum dolorum provident aut.
        Debitis, impedit aspernatur. Veritatis voluptatum ipsa ab accusamus, error laboriosam. Illum, nihil. Cum architecto
        fuga fugiat rerum ipsum impedit laborum nulla quia blanditiis tempora vero ipsa inventore, voluptatem veniam.
        Eligendi non laudantium, sed consequuntur quae vero soluta est dignissimos voluptatum, ad neque perspiciatis
        voluptatem illo debitis, officiis fuga assumenda aliquid odio ut quisquam adipisci.
    </p>
@endsection
