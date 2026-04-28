@extends('layouts.main')

@section('title', 'Gallery - CLOTHIFY')

@section('content')
<div class="max-w-screen-xl mx-auto px-4 py-12">

    <!-- MAIN ITEM -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">

        <!-- GALLERY IMAGE -->
        @include('components.imgGallery', ['image' => 'https://images.unsplash.com/photo-1520975916090-3105956dac38?auto=format&fit=crop&w=800&q=80'])
        @include('components.imgGallery', ['image' => 'https://images.unsplash.com/photo-1490481651871-ab68de25d43d?auto=format&fit=crop&w=800&q=80'])
        @include('components.imgGallery', ['image' => 'https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=800&q=80'])
        @include('components.imgGallery', ['image' => 'https://images.unsplash.com/photo-1541099649105-f69ad21f3246?auto=format&fit=crop&w=800&q=80'])
        @include('components.imgGallery', ['image' => 'https://images.unsplash.com/photo-1503342217505-b0a15ec3261c?auto=format&fit=crop&w=800&q=80'])
        @include('components.imgGallery', ['image' => 'https://images.unsplash.com/photo-1523381210434-271e8be1f52b?auto=format&fit=crop&w=800&q=80'])     

    </div>

</div>
@endsection