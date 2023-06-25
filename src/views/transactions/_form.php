<div
  class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800"
  >
  <form
    method="post"
    action="http://localhost:3000/transactions/create"
    >
    <label class="block text-sm">
      <span class="text-gray-700 dark:text-gray-400">Valor Gasto</span>
      <input
        name="amount"
        type=text
        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
        placeholder="Valor gasto"
        />
    </label>
    <label class="block mt-4 text-sm">
      <span class="text-gray-700 dark:text-gray-400">Descrição</span>
      <textarea
        name="description"
        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-textarea focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
        rows="3"
        placeholder="Descrição da despesa"
        ></textarea>
    </label>
    <input type="hidden"  name="user_id" value="1" />
    <input type="hidden"  name="category_id" value="1" />
    <input type="hidden"  name="type" value="1" />
    <button
      class="mt-6 flex items-center justify-between w-full px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
      >
      Cadastrar
      <span class="ml-2" aria-hidden="true">+</span>
    </button>
  </form>
</div>
