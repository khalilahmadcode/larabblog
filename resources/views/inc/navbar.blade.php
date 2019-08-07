<nav class="navbar navbar-expand-lg navbar-inverse navbar-dark bg-dark">
    <div class="container">
      {{-- title --}}
      <a class="navbar-brand" href="/">{{ config('app.name', 'LaraBlog1') }}</a>

      {{-- button --}}
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      {{-- item --}}
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <a class="nav-item nav-link" href="/">Home</span></a>
          <a class="nav-item nav-link" href="/about">About</a>
          <a class="nav-item nav-link" href="/services">Serices</a>
          <a class="nav-item nav-link" href="/posts">Blog</a>
          <a href="/contactus" class="nav-item nav-link">Contact Us</a>
        </div>
      </div>
    </div>
  </nav>