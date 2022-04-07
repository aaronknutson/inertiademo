<template>
  <header><title>Login Page</title></header>
  <section class="grid place-items-center min-h-screen">
    <div class="max-w-6xl mx-auto my-20">
      <div class="mb-6">
        <h1 class="text-3xl">Login</h1>
      </div>
      <div class="bg-slate-200 p-5 rounded-xl">
        <form @submit.prevent="submit" class="flex flex-col space-y-5">
          <div class="flex flex-col space-y-1">
            <label for="email" class="text-lg text-slate-700 font-semibold">
              Email:
            </label>
            <input
              v-model="form.email"
              type="email"
              name="email"
              id="email"
              class="rounded-lg text-lg p-2"
            />
            <div
              v-if="form.errors.email"
              v-text="form.errors.email"
              class="text-red-500 text-sm"
            ></div>
          </div>
          <div class="flex flex-col space-y-1">
            <label for="password" class="text-lg text-slate-700 font-semibold">
              Password:
            </label>
            <input
              v-model="form.password"
              type="password"
              name="password"
              id="password"
              class="rounded-lg text-lg p-2"
            />
            <div
              v-if="form.errors.password"
              v-text="form.errors.password"
              class="text-red-500 text-sm"
            ></div>
          </div>
          <button
            :disabled="form.processing"
            class="
              p-2
              bg-sky-400
              text-slate-700 text-lg
              font-semibold
              rounded-xl
              disabled:opacity-50 disabled:cursor-not-allowed
            "
          >
            Login
          </button>
        </form>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  layout: null,
  props: {},
};
</script>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
  errors: Object,
});

let form = useForm({
  email: "",
  password: "",
});

let submit = () => {
  form.post("/login");
};
</script>
