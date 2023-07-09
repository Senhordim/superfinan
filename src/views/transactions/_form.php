<?php
  $existsTransaction = array_key_exists('transaction', $this->data);
?>

<div
  class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
  <?php require VIEWS_PATH . '/includes/_flash_messages.php'; ?>
  <form
    method="post"
    action="<?php echo  $existsTransaction ? $_ENV['BASE_URL'] . 'transactions/update' : $_ENV['BASE_URL'] . 'transactions/create' ?>"
    id="transaction"
    >
    <div class="mt-4 text-sm">
        <span class="text-gray-700 dark:text-gray-400">
          Tipo de lançamento
        </span>
        <div class="mt-2">
          <label
            class="inline-flex items-center text-gray-600 dark:text-gray-400"
          >
            <input
              type="radio"
              class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
              name="type"
              value="1"
              <?php if( $existsTransaction &&  $this->transaction['type'] == 1): ?>
                checked
              <?php endif; ?>
            />
            <span class="ml-2">Receita</span>
          </label>
          <label
            class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400 "
          >
            <input
              type="radio"
              class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
              name="type"
              value="0"
              <?php if( $existsTransaction &&  $this->transaction['type'] == 0): ?>
                checked
              <?php endif; ?>
            />
            <span class="ml-2">Despesa</span>
          </label>
        </div>
      </div>
              <label class="block text-sm mt-4">
                <span class="text-gray-700 dark:text-gray-400">Valor</span>
                <input
                  name="amount"
                  type="text"

                  class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                  placeholder="Valor"
                  id="amount"
                  onKeyUp="mascaraMoeda(this, event)"
                  value="<?= $existsTransaction ? $this->transaction['amount']  : ''?>"
                  />
              </label>

              <label class="block mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                  Categoria
                </span>
                <select
                  class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                  name="category_id"
                >
                  <?php foreach ($this->categories as $category): ?>
                    <option value="<?= $category['id'] ?>"
                      <?php if( $existsTransaction && $category['id'] == $this->transaction['category_id']): ?>
                        selected
                      <?php endif; ?>>
                      <?= $category['name'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </label>

    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Descrição</span>
      <textarea
        id="description"
        name="description"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
        rows="3"
        placeholder="Descrição da despesa"

        ><?= $existsTransaction ? $this->transaction['description']  : ''?></textarea>
    </label>

    <?php if( $existsTransaction ): ?>
      <input type="hidden"  name="id" value="<?= $this->transaction['id'] ?>" />
    <?php endif; ?>

    <button
      class="mt-6 flex items-center justify-between  px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
      >
      <?= $existsTransaction ? 'Atualizar'  : 'Cadastrar' ?>
      <span class="ml-2" aria-hidden="true">+</span>
    </button>
  </form>
</div>

<script>

  document.getElementById('transaction').addEventListener('submit', function(event) {
    event.preventDefault();
    var amount = document.getElementById('amount');
    var amountUnmask = amount.value.replace(/[^0-9,]*/g, '').replace(',', '.');
    amount.value = parseFloat(amountUnmask);
    this.submit();
  });

  String.prototype.reverse = function(){
    return this.split('').reverse().join('');
  };

  function mascaraMoeda(campo,evento){
    var tecla = (!evento) ? window.event.keyCode : evento.which;
    var valor  =  campo.value.replace(/[^\d]+/gi,'').reverse();
    var resultado  = "";
    var mascara = "##.###.###,##".reverse();
    for (var x=0, y=0; x<mascara.length && y<valor.length;) {
      if (mascara.charAt(x) != '#') {
        resultado += mascara.charAt(x);
        x++;
      } else {
        resultado += valor.charAt(y);
        y++;
        x++;
      }
    }
    campo.value = resultado.reverse();
  }
</script>
