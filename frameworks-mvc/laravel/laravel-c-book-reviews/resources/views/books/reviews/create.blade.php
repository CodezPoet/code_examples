@extends('layouts.app')

@section('content')
    <h1 class="mb-10 text-2x1">Add Review {{ $book->title }}</h1>

    <form method="POST" action="{{ route('books.reviews.store', $book) }}">
        @csrf
        <label for="review">Review</label>
        <textarea name="review" id="review" required class="input mb-4">{{ old('review') }}</textarea>
        @error('review')
            <p class="error-message">{{ $message }} </p>
        @enderror
        <label for="rating">Rating</label>
        <select name="rating" id="rating" class="input mb-4" required>
            <option value="">Select a Rating</option>
            @for ($i = 1; $i <= 5; $i++)
                <option value="{{ $i }}" {{ old('rating') == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>
        @error('rating')
            <p class="error-message">{{ $message }} </p>
        @enderror
        <button type="submit" class="btn">Add Review</button>
    </form>
