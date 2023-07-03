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

            <?php require VIEWS_PATH . '/includes/_flash_messages.php'; ?>

            <h2
              class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200"
            >
              Dashboard
            </h2>


            <!-- Cards -->
            <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

            <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total de Receitas
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    <?= FCurrency::toBRL($this->amountCreditTransactions) ?>
                  </p>
                </div>
              </div>
              <!-- Card -->
              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-orange-500 bg-orange-100 rounded-full dark:text-orange-100 dark:bg-orange-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                  <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total de Despesas
                  </p>
                  <p
                    class="text-lg font-semibold text-gray-700 dark:text-gray-200"
                  >
                    <?= FCurrency::toBRL($this->amountDebitTransactions) ?>
                  </p>
                </div>
              </div>
              <!-- Card -->

            </div>

            <!-- New Table -->
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
              <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                  <thead>
                    <tr
                      class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                    >
                      <th class="px-4 py-3">Descrição</th>
                      <th class="px-4 py-3">Valor</th>
                      <th class="px-4 py-3">Tipo</th>
                      <th class="px-4 py-3">Data</th>
                      <th class="px-4 py-3">Ações</th>
                    </tr>
                  </thead>
                  <tbody
                    class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800"
                  >
                  <?php foreach ($this->allTransactions as $transaction): ?>
                    <tr class="text-gray-700 dark:text-gray-400">
                      <td class="px-4 py-3">
                        <div class="flex items-center text-sm">
                          <!-- Avatar with inset shadow -->
                          <div
                            class="relative hidden w-8 h-8 mr-3 rounded-full md:block"
                          >
                            <img
                              class="object-cover w-full h-full rounded-full"
                              src="https://avatars.githubusercontent.com/u/212854?s=400&u=5a6a599476df16f3e6a28a936411ea2c9e3fe11a&v=4"
                              alt=""
                              loading="lazy"
                            />
                            <div
                              class="absolute inset-0 rounded-full shadow-inner"
                              aria-hidden="true"
                            ></div>
                          </div>
                          <div>
                            <p class="font-semibold">Diego Collares</p>
                            <p class="text-xs text-gray-600 dark:text-gray-400">
                              <?= $transaction['description'] ?>
                            </p>
                          </div>
                        </div>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?= FCurrency::toBRL($transaction['amount']) ?>
                      </td>

                      <td class="px-4 py-3 text-xs">
                        <span
                          class="px-2 py-1 font-semibold leading-tight <?=  $transaction['type'] == 1 ? 'bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100' : 'bg-red-100 text-red-700 rounded-full dark:bg-red-700 dark:text-red-100' ?>"
                        >
                          <?= $transaction['type'] == 1 ? 'Receita' : 'Despesa' ?>
                        </span>
                      </td>
                      <td class="px-4 py-3 text-sm">
                        <?= FDate::toBR($transaction['created_at']); ?>
                      </td>
                      <td class="px-4 py-3 text-xs">
                      <a
                          class="mr-2 px-4 py-2 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-700 hover:bg-purple-700 focus:outline-none focus:shadow-outline-green"
                          href="<?= $_ENV['BASE_URL'] ?>transactions/edit/<?= $transaction['id'] ?>"
                        >
                          Editar
                        </a>

                        <a
                          href="<?php echo  $_ENV['BASE_URL'] . 'transactions/delete/' . $transaction['id'] ?>"
                          class="px-4 py-2 text-xs font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-lg active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-purple"
                        >
                          Excluir
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

<?php require VIEWS_PATH . '/includes/_footer.php'; ?>


