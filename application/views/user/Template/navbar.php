<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
      <nav class="navbar navbar-secondary navbar-expand-lg">
        <div class="container">
          <ul class="navbar-nav">
            <!-- <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="<?php echo base_url(); ?>dist/index_0" class="nav-link">General Dashboard</a></li>
                <li class="nav-item"><a href="<?php echo base_url(); ?>dist/index" class="nav-link">Ecommerce Dashboard</a></li>
              </ul>
            </li> -->
            <li class="nav-item <?php if (current_url() == base_url() . "user") echo "active"; ?>">
              <a href="<?php echo base_url()."user";?>" class="nav-link"><i class="fas fa-fire"></i><span>Home</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'konten' || $this->uri->segment(2) == 'detail' ? 'active' : ''; ?>">
              <a href="<?php echo base_url()."user/konten";?>" class="nav-link"><i class="fas fa-book-open"></i><span>E-Knowledge</span></a>
            </li>
            
            <li class="nav-item <?php echo $this->uri->segment(2) == 'quiz'  ? 'active' : ''; ?>">
              <a href="<?php echo base_url()."user/quiz";?>" class="nav-link"><i class="fas fa-book-reader"></i><span>Quiz</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'berita' || $this->uri->segment(2) == 'details' ? 'active' : ''; ?>">
              <a href="<?php echo base_url()."user/berita";?>" class="nav-link"><i class="fas fa-newspaper"></i><span>Berita</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'persebaran' ? 'active' : ''; ?>">
              <a href="<?php echo base_url()."user/persebaran";?>" class="nav-link"><i class="fas fa-mountain"></i><span>Persebaran Informasi Bencana</span></a>
            </li>
            <li class="nav-item <?php echo $this->uri->segment(2) == 'komentar' ? 'active' : ''; ?>">
              <a href="<?php echo base_url()."user/komentar";?>" class="nav-link"><i class="fas fa-comment-alt"></i><span>Kolom Pendapat</span></a>
            </li>
            <!-- <li class="nav-item dropdown">
              <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i class="far fa-clone"></i><span>Multiple Dropdown</span></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover Me</a>
                  <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                      <ul class="dropdown-menu">
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                        <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                  </ul>
                </li>
              </ul>
            </li> -->
          </ul>
        </div>
      </nav>
