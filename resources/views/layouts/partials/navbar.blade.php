<nav class="main-header navbar navbar-expand navbar-white navbar-light sen tracking-tight">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
      <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                  class="fas fa-bars"></i></a>
      </li>

      <li class="nav-item">
          <p class="mb-0 mt-2 fw-bold d-xs-none">e-Raport MTs Tarbiyatul Banat</p>
      </li>
  </ul>

  <!-- Right navbar links -->
  <ul href="#" class="navbar-nav ml-auto" id="dropdownSubMenu1" href="#" data-toggle="dropdown"
      aria-haspopup="true" aria-expanded="false">
      <li class="nav-item">
          <span
              class="d-xs-none p-2 fw-bold mt-1">{{ $userLogin->name }}{{ $userLogin->gelar ? ', ' . $userLogin->gelar : '' }}</span>
          <span
              class="d-sm-none p-1 fw-bold mt-1">{{ Str::before($userLogin->name, ' ') }}</span>
          <img src="/img/{{ $userLogin->foto }}" style="width: 35px; height: 35px; object-fit: cover;" class="img-circle elevation-1"
              alt="User Image">
          <ul class="dropdown-menu dropdown-menu-right">
              <li>
                <a href="{{ '/' . auth()->user()->role . '/profil' }}" class="dropdown-item" >Profil</a>
              </li>
              <li>
                  <hr class="dropdown-divider">
              </li>
              <li><button class="dropdown-item" type="button" data-bs-toggle="modal"
                      data-bs-target="#modal-logout">Logout</button></li>
          </ul>
      </li>
  </ul>

</nav>
