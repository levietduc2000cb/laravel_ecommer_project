@extends('user/layout.app')

@section('title')
About
@endsection

@section('header')
{{-- Header --}}
@include('user/layout/header')
@endsection

@section('footer')
{{-- Footer --}}
@include('user/layout/footer')
@endsection

@section('content')
{{-- Title --}}
<x-page-title-background img="https://preview.colorlib.com/theme/abcbook/assets/img/hero/h2_hero2.jpg.webp"
    titleName="About" />
<div class="max-w-[1200px] w-full mx-auto py-10 md:py-[6.25rem] px-3">
    <div class="mb-12 content">
        <h2 class="mb-6 text-3xl font-semibold font-playfair">Our Story</h2>
        <p class="text-base font-light leading-7 font-roboto text-gray_custom_3">Cat bookstore (original name is "Little
            Pine") is one of the first independent bookstores in Vietnam, established in 2000. Cat bookstore has become
            a familiar and favorite place for readers. writers and book lovers in Hanoi.<br />

            Cat Bookstore was founded by Mr. Nguyen Phan Que Mai, a famous Vietnamese writer and poet. Initially, the
            bookstore was just a small bookstore on Hang Bun Street, Hanoi, with the aim of providing readers with
            unique and little-known books in Vietnam.<br />

            However, with the interest and requests of readers, Cat bookstore quickly grew and expanded. Currently, the
            bookstore has two branches in Hanoi, each branch has thousands of books in the fields of literature, art,
            social sciences, comics, children's books and many other books.<br />

            Cat bookstore has become a familiar and beloved cultural address of readers in Hanoi. This place is not only
            a destination to buy books, but also a cultural space, where reading sessions, exhibitions, exchanges with
            authors, writers and artists take place. Cat Bookstore has contributed a lot to the cultural and academic
            development in Vietnam.</p>
    </div>
    <div class="content">
        <h2 class="mb-6 text-3xl font-semibold font-playfair">Our Goal</h2>
        <p class="text-base font-light leading-7 font-roboto text-gray_custom_3">Cat bookstore's main goal is to provide
            readers with unique and quality books, and to create a cultural and interactive space among readers, authors
            and writers and artists.<br />

            Cat Bookstore hopes to inspire readers, ignite their passion for reading, and help readers have diverse
            cultural experiences through cultural activities held at the bookstore.<br />

            In addition, Cat bookstore also wants to help readers better understand the authors, works and cultures of
            different countries around the world through providing quality books and organizing activities. exchanges,
            exhibitions, reading books, talks with authors and artists.<br />

            In short, Cat bookstore's goal is not only to provide books but also to create a cultural, educational and
            interactive environment between readers and authors and artists. Cat Bookstore wishes to become a familiar
            and favorite address of readers, contributing to the cultural and academic development in Vietnam.</p>
    </div>
</div>
{{-- Footer --}}
@endsection