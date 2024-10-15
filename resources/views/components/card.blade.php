<div class="card mb-4 shadow-sm bg-secondary">
    <img src="{{ $image }}" class="card-img-top" alt="{{ $name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $name }}</h5>
        <p class="card-text">
            <strong>Price:</strong> ${{ number_format($price, 2) }}<br>
            <strong>Stock:</strong> {{ $stock }} available<br>
            <strong>Description:</strong> {{ $description }}<br>
        </p>
        <div class="tags">
            @foreach($tags as $tag)
                <span class="badge bg-secondary">{{ $tag }}</span>
            @endforeach
        </div>
    </div>
</div>
