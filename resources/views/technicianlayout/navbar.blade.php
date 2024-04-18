  <!-- Navbar -->

  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <!-- <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li> -->
      <li class="nav-item d-none d-sm-inline-block">
        <a class="nav-link">
            Hello, {{ auth()->user()->name }}
        </a>
    </li>

    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
          <a id="notificationsDropdown" class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge">{{ count($notifications) }}</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <div class="dropdown-header">{{ count($notifications) }} Notifications</div>
              <div class="dropdown-divider"></div>
              @forelse($notifications as $notification)
                  <div class="dropdown-item">
                      <i class="fas fa-envelope mr-2"></i> {{ $notification->userName }} has booked you
                      <small class="text-muted">
                          <br>
                          Scheduled for:
                          {{ \Carbon\Carbon::parse($notification->date)->format('Y-m-d') }},
                          {{ \Carbon\Carbon::parse($notification->start_time)->format('H:i') }} -
                          {{ \Carbon\Carbon::parse($notification->end_time)->format('H:i') }}
                      </small>
                  </div>
                  <div class="dropdown-divider"></div>
              @empty
                  <div class="dropdown-item">
                      No notifications
                  </div>
              @endforelse
          </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        var notificationsDropdown = document.getElementById('notificationsDropdown');
        var dropdownMenu = document.querySelector('.dropdown-menu');

        notificationsDropdown.addEventListener('click', function(event) {
            event.stopPropagation();
            dropdownMenu.classList.toggle('show');
        });

        document.addEventListener('click', function(event) {
            if (!dropdownMenu.contains(event.target)) {
                dropdownMenu.classList.remove('show');
            }
        });
    });
</script>
