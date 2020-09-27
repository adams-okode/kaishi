@extends('blog.default.layout.master')
@section('title', ucwords(request()->account))
  <livewire:blog.default-template.nav-bar>
  @section('content')
  <main id="main">
    <section class="breadcrumbs">
      <div class="container">
      </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-8 entries">
            @foreach($posts as $post)
            <article class="entry">
              <div class="entry-img">
                <img src="{{ Voyager::image($post->cover_image) }}" alt="" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="{{ route('blog.front.view', [ 'slug'=> $post->slug ] )}}">{{ ucwords($post->title) }}</a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li aria-hidden="true" class="d-flex align-items-center"><i aria-hidden="true" class="icofont-user"></i> <a
                    >{{ @$post->author->name }}</a></li>
                  <li aria-hidden="true" class="d-flex align-items-center"><i aria-hidden="true" class="icofont-wall-clock"></i> <a
                          ><time datetime="2020-01-01">{{ $post->created_at }}</time></a>
                  </li>
                </ul>
              </div>

              <div class="entry-content">
                <p>
                  {{ $post->description }}
                </p>
                <div class="read-more">
                  <a href="{{ route('blog.front.view', [ 'slug'=> $post->slug ] )}}">Read More</a>
                </div>
              </div>
            </article>
            @endforeach

            <div class="blog-pagination">
              {{ $posts->links() }}
            </div>

          </div><!-- End blog entries list -->

          <div class="col-lg-4">
            <div class="sidebar">
              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i aria-hidden='true' class="icofont-search"></i></button>
                </form>
              </div><!-- End sidebar search formn-->

              <h3 class="sidebar-title">Categories</h3>
              <div class="sidebar-item categories">
                <ul>
                  <li><a href="#">General <span>(25)</span></a></li>
                  <li><a href="#">Lifestyle <span>(12)</span></a></li>
                  <li><a href="#">Travel <span>(5)</span></a></li>
                  <li><a href="#">Design <span>(22)</span></a></li>
                  <li><a href="#">Creative <span>(8)</span></a></li>
                  <li><a href="#">Educaion <span>(14)</span></a></li>
                </ul>
              </div><!-- End sidebar categories-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>
              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->
  @endsection