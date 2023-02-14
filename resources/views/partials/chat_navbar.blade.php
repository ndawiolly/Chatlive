<nav class="nav flex-column shadow">
    <a class="nav-link active icn" aria-current="page" href="#">HOME <i class="fas fa-home"></i></a>
    <a class="nav-link icn" href="#"><i class="fab fa-wpexplorer"></i></a>
    <a class="nav-link icn" href="#"> <i class="fas fa-bell"></i></a>
    <a class="nav-link icn" href="#"> <i class="far fa-envelope"></i></a>
    <a class="nav-link icn" href="#"> <i class="far fa-user"></i></a>
    <a class="nav-link icn" href="#"> <i class="fas fa-chevron-circle-down"></i></a>

    <a  class="nav-link " href="#" role="button" >
        {{ Auth::user()->name }} <img src="images/profile.svg" alt="profile" height="50" width="50">
    </a>
  </nav>
