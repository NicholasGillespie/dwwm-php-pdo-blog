<footer class="[ cluster ][ justify:space-between ]">
  <nav>
    <ul role="list" class="cluster">
      <li><a href="/">home</a></li>
      <li><a href="/contact">contact</a></li>
      <?php if (Auth::isLoggedIn()) : ?>
        <li><a href="/admin/">admin</a></li>
        <li><a class="btn" href="/logout">logout</a></li>
      <?php else : ?>
        <li><a class="btn" href="/login">login</a></li>
      <?php endif; ?>
    </ul>
  </nav>
  <a href="#">top</a>
</footer>

</body>

</html>