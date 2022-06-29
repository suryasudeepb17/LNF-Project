<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
        (function($) { // Begin jQuery
    $(function() { // DOM ready
      // If a link has a dropdown, add sub menu toggle.
      $('nav ul li a:not(:only-child)').click(function(e) {
        $(this).siblings('.nav-dropdown').toggle();
        // Close one dropdown when selecting another
        $('.nav-dropdown').not($(this).siblings()).hide();
        e.stopPropagation();
      });
      // Clicking away from dropdown will remove the dropdown class
      $('html').click(function() {
        $('.nav-dropdown').hide();
      });
      // Toggle open and close nav styles on click
      $('#nav-toggle').click(function() {
        $('nav ul').slideToggle();
      });
      // Hamburger to X toggle
      $('#nav-toggle').on('click', function() {
        this.classList.toggle('active');
      });
    }); // end DOM ready
  })(jQuery); // end jQuery
</script>
</head>

<body>
    

   <section class="navigation">
  <div class="nav-container">
    <div class="brand">
      <a href="index.php">Lost N Found</a>
    </div>
    <nav>
      <div class="nav-mobile">
        <a id="nav-toggle" href="#!"><span></span></a>
      </div>
      <ul class="nav-list">
        <!-- Setting the links to #! will ensure that no action takes place on click. -->
        
        <li><a href="#!">Lost</a>
          <ul class="nav-dropdown">
            <li><a href="lost.php">Lost Items</a></li>
            <li><a href="lost_c.php">Lost and Taken</a></li>
            <li><a href="lost_order.php">Newest First</a></li>
          </ul>
        </li>
        <li><a href="#!">Found</a>
            <ul class="nav-dropdown">
              <li><a href="found.php">Found Items</a></li>
              <li><a href="found_c.php">Found and Given</a></li>
              <li><a href="found_order.php">Newest First</a></li>
            </ul>
          </li>
        <li><a href="google.php">Your Profile</a></li>
        <li><a href="team.php">Team</a></li>
      </ul>
    </nav>
  </div>
</section>