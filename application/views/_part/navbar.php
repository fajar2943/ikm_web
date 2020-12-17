<?php $about = $this->db->from('about')->get()->result(); ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<?php foreach ($about as $about): ?>
  <img src="<?php echo base_url('upload/about/'.$about->gambar) ?>" width="50" />
  <a class="navbar-brand ml-2" href="<?php echo site_url('') ?>"><?php echo $about->judul ?></a>
  <?php endforeach; ?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav text-center">
      <a class="nav-link active" href="<?php echo site_url('') ?>">Home <span class="sr-only">(current)</span></a>
      <a class="nav-link" href="#">Features</a>
      <a class="nav-link" href="<?php echo site_url('welcome/about') ?>">About</a>
      <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
    </div>
  </div>
</nav>