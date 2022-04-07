<template>
  <Head>
    <title>Users</title>
  </Head>
  <div class="max-w-6xl mx-auto my-20">
    <div class="flex items-center justify-between mb-6">
      <h1 class="text-4xl font-semibold">Users</h1>

      <div class="flex flex-col">
        <Link
          v-if="can.createUser"
          href="/users/create"
          class="
            p-1
            bg-sky-400
            text-slate-700 text-lg
            font-semibold
            text-center
            mb-2
            rounded-xl
            shadow-lg
          "
          >Create New</Link
        >
        <input
          v-model="search"
          type="text"
          placeholder="Search..."
          class="border px-2 rounded-lg"
        />
      </div>
    </div>

    <div class="flex flex-col">
      <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
          <div
            class="
              shadow
              overflow-hidden
              border-b border-gray-200
              sm:rounded-lg
            "
          >
            <table class="min-w-full divide-y divide-gray-200">
              <tbody class="bg-white divide-y divide-gray-200">
                <tr v-for="user in users.data" :key="user.id">
                  <td class="px-6 py-4 whitespace-nowrap">
                    <div class="flex items-center">
                      <div>
                        <div class="text-sm font-medium text-gray-900">
                          <Link :href="`/users/${user.id}`">{{
                            user.name
                          }}</Link>
                        </div>
                      </div>
                    </div>
                  </td>

                  <td
                    v-if="user.can.edit"
                    class="
                      px-6
                      py-4
                      whitespace-nowrap
                      text-right text-sm
                      font-medium
                    "
                  >
                    <Link
                      :href="`/users/${user.id}/edit`"
                      class="
                        p-1
                        bg-sky-400
                        text-slate-700 text-xs
                        font-semibold
                        text-center
                        mb-2
                        rounded
                        shadow-lg
                      "
                    >
                      Edit
                    </Link>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <Pagination :links="users.meta.links" class="mt-6" />
  </div>
</template>

<script setup>
import { ref, watch, defineAsyncComponent, onMounted } from "vue";
import { Inertia } from "@inertiajs/inertia";
import debounce from "lodash/debounce";
import User from "@/Models/User";

let Pagination = defineAsyncComponent(() => import("@/Components/Pagination"));

let props = defineProps({
  users: Object,
  filters: Object,
  can: Object,
});

let search = ref(props.filters.search);

watch(
  search,
  debounce(function (value) {
    Inertia.get(
      "/users",
      { search: value },
      { preserveState: true, replace: true }
    );
  }, 300)
);

onMounted(() => {
  console.log(new User(Inertia.page.props.auth.user));
});
</script>
