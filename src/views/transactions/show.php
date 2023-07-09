<?php
    use SFinan\Utils\FCurrency;
    use SFinan\Utils\FDate;
?>

<?php require VIEWS_PATH . '/includes/_head.php'; ?>


<div
      class="flex h-screen bg-gray-50 dark:bg-gray-900"
      :class="{ 'overflow-hidden': isSideMenuOpen }"
    >
      <!-- Desktop sidebar -->
      <?php require VIEWS_PATH . '/includes/_aside_desktop.php'; ?>
      <!-- Mobile sidebar -->
      <!-- Backdrop -->
      <?php require VIEWS_PATH . '/includes/_aside_mobile.php'; ?>
      <div class="flex flex-col flex-1 w-full">
        <header class="z-10 py-4 bg-white shadow-md dark:bg-gray-800">
          <div
            class="container flex items-center justify-between h-full px-6 mx-auto text-purple-600 dark:text-purple-300"
          >
             <!-- Mobile hamburger -->
             <?php require VIEWS_PATH . '/includes/_hamburger_mobile.php'; ?>
            <!-- Search input -->
            <?php require VIEWS_PATH . '/includes/_search_input.php'; ?>

            <ul class="flex items-center flex-shrink-0 space-x-6">
              <!-- Theme toggler -->
              <?php require VIEWS_PATH . '/includes/_theme_toggler.php'; ?>
              <!-- Notifications menu -->
              <?php require VIEWS_PATH . '/includes/_notification_menu.php'; ?>
              <!-- Profile menu -->
              <?php require VIEWS_PATH . '/includes/_profile_menu.php'; ?>
            </ul>
          </div>
        </header>
        <main class="h-full overflow-y-auto">
          <div class="container px-6 mx-auto grid">
            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Lançamento -  <?= FCurrency::toBRL($this->transaction['amount']) ?>
            </h2>

            <h2
              class="text-1xl font-normal text-gray-600 dark:text-gray-200"
            >
              Data -  <?= FDate::toBR($this->transaction['created_at']); ?>
            </h2>



          </div>
        </main>
      </div>
    </div>

<?php require VIEWS_PATH . '/includes/_footer.php'; ?>




