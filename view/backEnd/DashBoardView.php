<?php 
if(!isset($_SESSION)) 
{ 
  session_start(); 
}

$title = "Administration" ?>

<?php ob_start(); ?>
  <!---------------- Messages de réussites ----------------->
  <div class="container-fluid">
    <div class="row">
      <div class="col-4 mt-3" id="report_msg">
        <?php if (isset($_GET['new-post']) &&  $_GET['new-post'] == 'success') {
                echo "<p class='green'> Votre post a bien été publié <p>";
              } elseif (isset($_GET['remove-post']) &&  $_GET['remove-post'] == 'success') {
                  echo "<p class='green'> Votre post a bien été supprimé <p>";
              } elseif (isset($_GET['update-post']) &&  $_GET['update-post'] == 'success') {
                  echo "<p class='green'> Votre post a bien été modifié <p>";
              } elseif (isset($_GET['admin-delete-comment']) &&  $_GET['admin-delete-comment'] == 'success') {
                  echo "<p class='green'> Le commentaire a bien été supprimé <p>";
              } 
        ?>
      </div>
    </div>
  </div>

  <!--------------------------- SIDEBAR ------------------------------->
  <div class="row mt-3 mr-2">
    <div class="col-lg-2 col-md-12">
      <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab"
          aria-controls="v-pills-home" aria-selected="true">Admin Home</a>
        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab"
          aria-controls="v-pills-profile" aria-selected="false">Nouveau Post</a>
        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab"
          aria-controls="v-pills-messages" aria-selected="false">Posts</a>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab"
          aria-controls="v-pills-settings" aria-selected="false">Commentaires signalés</a>
      </div>
    </div>

    <!------------------------ CONTENU (à droite de la SIDEBAR) ------------------------------------>
    <div class="col-lg-10 col-md-12 mt-3">
      <div class="tab-content" id="v-pills-tabContent">
        <div class="tab-pane fade show active admin_home" id="v-pills-home" role="tabpanel"
          aria-labelledby="v-pills-home-tab"> <span class="h3"> Accueil & Statistiques </span> <br>
            <div class="row mt-5 ml-2">
              <div class="col-lg-3 col-md-6 text-center">
                  <div class="panel panel-1">
                    <p class="panel-txt">Nombre de posts :</p> <span class="panel-numbers"> <?php echo $countPost; ?></span> 
                  </div>
              </div>

              <div class="col-lg-3 col-md-6 text-center">
                <div class="panel panel-2">
                  <p class="panel-txt">Nombre d'utilisateurs : </p> <span class="panel-numbers"> <?php echo $countUser; ?></span>
                </div>
              </div>
            </div>
                      
            <div class="mt-5 ml-3">
              <div id="admin_presentation">
                <p> Bienvenue sur l'espace d'administration, </p>
                <p> Dans les différents onglets sur votre gauche vous pourrez retrouvez les sections : <br><br>
                  - "Nouveau Post" qui vous permettra directement de rédiger un nouveau chapitre<br>
                  - "Posts" qui vous donne la liste des chapitres que vous avez déjà rédigé avec la possiblité d'aller directement les consulter en cliquant sur leurs titres puis vous pourrez les modifier<br>
                  - "Commentaires signalés" dans lequel vous retrouverez les commentaires ayant été signalés 2 fois ou plus par les utilisateurs avec la possibilité de les supprimer! <br>
                </p>
              </div>
            </div>
        </div>
        <!------------------------ NOUVEAU POST ------------------------------------>
        <div class="tab-pane fade mt-3 ml-2 admin_newpost" id="v-pills-profile" role="tabpanel"
          aria-labelledby="v-pills-profile-tab">
            <h3><span class="h3"> Nouveau Post </span></h3><br>
              <div id="formbg">
                <form method="post" action="index.php?action=submitPost">
                  <p> <label for="title" id="posttitle"> Titre : </label><br>
                  <input type="text" name="title" id="title" placeholder="Titre de votre post" size="30" maxlength="50" /> </br></br>
                  </p>
                  <label for="title" id="posttitle"> Contenu : </label><br>
                  <textarea class="tinymce" name="content"></textarea><br>
                  <input type="submit" value="Publier">
                </form>
              </div>
        </div>
        <!------------------------ AFFICHAGE POSTS ------------------------------------>
        <div class="tab-pane fade admin_post" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
          <?php 
          $listTitles = $_SESSION["dropdown"];
          foreach ($listTitles as $listTitle) { ?>
            <a class="dropdown-item" href="index.php?action=show&amp;id=<?= $listTitle['id']; ?>">
            <?= nl2br(htmlspecialchars($listTitle['title'])) ?></a>
            <?php } ?>
        </div>
        <!------------------------ COMMENTAIRES SIGNALES ------------------------------------>
        <div class="tab-pane fade admin_signaled mt-3 ml-2" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
          <span class="h3">Commentaires signalés</span>
            <div class="mt-3 ml-3">
              <?php	foreach ($reports as $report) : ?>
                <p>Commentaire de <em>
                  <?= $report['author']; ?></em> le <em>
                  <?= $report['date_c']; ?></em>
                </p>
                <p>
                  <?= $report['comment']; ?>
                </p>
                <p id="nbReports"> Ce commentaire a été signalé
                  <?= $report['nb_reports']; ?> fois !
                </p>
                <form method="post" action="index.php?action=deleteComment&amp;id=<?= $report['comment_id']; ?>&post_id=admin">
                  <button type="submit" class="btn btn-danger btn-sm"> Supprimer <i class="fas fa-trash"></i>
                  </button>
                </form>
              <?php endforeach; ?>
            </div>
        </div>
      </div>
    </div>
  </div>

<?php $content = ob_get_clean(); ?>

<?php require("view/backEnd/AdminTemplate.php"); ?>
