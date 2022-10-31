
     <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand simple-text logo-normal" href="javascript:void(0)" style=" font-family: 'Archivo Black'; margin-left: -5px;">
            <img src="../System Icons/white.png" alt="" width="70" height="50">Zero O'clock</a>

          </div>
          <div class="nav-item pull-right <?= ($activePage == '') ? 'active':''; ?>" style="cursor: pointer;"">
            <a class="nav-link  "   onclick="window.location.href='../index.php'" >
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i style="color:#d22824;"class="material-icons">logout</i>
              <p style="font-family: 'Archivo Black'; color:#d22824;">Logout</p>
            </a>
          </div>
      </nav>
      