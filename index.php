<?php

require 'includes/init.php';

$conn = require 'includes/db.php';

// $page
// $records_per_page
// $total_articles
$paginator = new Paginator($_GET['page'] ?? 1, 6, Article::getTotal($conn));

// $paginator->limit = $records_per_page; 
// $paginator->offset = $records_per_page * ($page - 1);
$articles = Article::getPage($conn, $paginator->limit, $paginator->offset);

?>

<!-- header -->
<?php require 'includes/header.php'; ?>


<!-- main -->
<div class="container">
  <div class="sidebar">
    <main class="stack">
      <div class="box">
        <h2>latest news</h2>
      </div>
      <?php if (empty($articles)) : ?>
        <h3>No articles found.</h3>
      <?php else : ?>
        <ul role="list" class="[ grid ][ space-stack:composition ]">
          <?php foreach ($articles as $article) : ?>
            <li>
              <article class="flex:column">
                <div class="[ box ][ flex:column flow ]">
                  <h3><a href="article.php?id=<?= $article['id']; ?>"><?= htmlspecialchars($article['title']); ?></a></h3>
                  <!-- <time class="order:-1" datetime="<?= htmlspecialchars($datetime_array[0]); ?>"><?= htmlspecialchars($datetime_array[2]); ?></time> -->
                  <p><?= htmlspecialchars($article['content']); ?></p>
                </div>
                <div class="[ box frame ar-16:9 ][ order:-1 ]"></div>
              </article>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
      <?php require 'includes/pagination.php'; ?>
    </main>
    <aside class="stack">
      <div class="box">
        <h2>header aside</h2>
      </div>
      <div class="[ box ][ space-stack:composition ]">
        empty
      </div>
    </aside>
  </div>
</div>


<!-- footer -->
<?php require 'includes/footer.php'; ?>