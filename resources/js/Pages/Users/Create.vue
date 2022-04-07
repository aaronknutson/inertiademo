<template>
  <head>
    <title>Create User</title>
  </head>
  <div class="max-w-6xl mx-auto my-20">
    <div class="mb-6">
      <h1 class="text-3xl">Create New User</h1>
    </div>
    <div class="bg-slate-200 p-5 rounded-xl">
      <form @submit.prevent="submit" class="flex flex-col space-y-5">
        <div class="flex flex-col space-y-1">
          <label for="name" class="text-lg text-slate-700 font-semibold">
            Name:
          </label>
          <input
            v-model="form.name"
            name="name"
            id="name"
            class="rounded-lg text-lg p-2"
          />
          <div
            v-if="form.errors.name"
            v-text="form.errors.name"
            class="text-red-500 text-sm"
          ></div>
        </div>
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
        <div class="flex flex-col space-y-1">
          <label
            for="passwordConfirm"
            class="text-lg text-slate-700 font-semibold"
          >
            Confirm Password:
          </label>
          <input
            v-model="form.passwordConfirm"
            type="password"
            name="passwordConfirm"
            id="passwordConfirm"
            class="rounded-lg text-lg p-2"
          />
          <div
            v-if="form.errors.passwordConfirm"
            v-text="form.errors.passwordConfirm"
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
          Save
        </button>
      </form>
    </div>
  </div>
</template>

<script setup>
import { useForm } from "@inertiajs/inertia-vue3";

defineProps({
  errors: Object,
});

let form = useForm({
  name: "",
  email: "",
  password: "",
  passwordConfirm: "",
});

let submit = () => {
  form.post("/users");
};
</script>
