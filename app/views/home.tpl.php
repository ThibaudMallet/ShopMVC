<section>
    <div class="container-fluid">
      <div class="row mx-0">
        <?php
          for ($i=0; $i < 2; $i++) {
            ?>
            <div class="col-md-6">
              <div class="card border-0 text-white text-center"><img src="<?= $viewData[$i]->getPicture()?>"
                  alt="Card image" class="card-img">
                <div class="card-img-overlay d-flex align-items-center">
                  <div class="w-100 py-3">
                    <h2 class="display-3 font-weight-bold mb-4"><?= $viewData[$i]->getName() ?></h2><a href="<?= $router->generate('catalog-category', ['id' => $viewData[$i]->getId()]) ?>" class="btn btn-light"><?= $viewData[$i]->getSubtitle() ?></a>
                  </div>
                </div>
              </div>
            </div>
            <?php
            //dump($viewData[$i]);
          }
        ?>
      </div>
      <div class="row mx-0">
      <?php
          for ($i=2; $i < 5; $i++) {
            ?>
            <div class="col-lg-4">
              <div class="card border-0 text-white text-center"><img src="<?= $viewData[$i]->getPicture()?>"
                  alt="Card image" class="card-img">
                <div class="card-img-overlay d-flex align-items-center">
                  <div class="w-100 py-3">
                    <h2 class="display-4 mb-4"><?= $viewData[$i]->getName() ?></h2><a href="<?= $router->generate('catalog-category', ['id' => $viewData[$i]->getId()]) ?>" class="btn btn-light"><?= $viewData[$i]->getSubtitle() ?></a>
                  </div>
                </div>
              </div>
            </div>
            <?php
            //dump($viewData[$i]);
          }
          ?>
      </div>
    </div>
  </section>